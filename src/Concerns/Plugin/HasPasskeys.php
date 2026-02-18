<?php

namespace Jeffgreco13\FilamentBreezy\Concerns\Plugin;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Str;
use Jeffgreco13\FilamentBreezy\Models\Passkey;
use Symfony\Component\Serializer\Serializer;
use Throwable;
use Webauthn\AttestationStatement\AttestationStatementSupportManager;
use Webauthn\AuthenticatorAssertionResponse;
use Webauthn\AuthenticatorAssertionResponseValidator;
use Webauthn\AuthenticatorAttestationResponse;
use Webauthn\AuthenticatorAttestationResponseValidator;
use Webauthn\CeremonyStep\CeremonyStepManagerFactory;
use Webauthn\Denormalizer\WebauthnSerializerFactory;
use Webauthn\PublicKeyCredential;
use Webauthn\PublicKeyCredentialCreationOptions;
use Webauthn\PublicKeyCredentialRequestOptions;
use Webauthn\PublicKeyCredentialRpEntity;
use Webauthn\PublicKeyCredentialSource;
use Webauthn\PublicKeyCredentialUserEntity;

trait HasPasskeys
{
    protected bool $passkeys = false;

    protected bool $scopePasskeysToPanel = true;

    protected string $passkeyRelyingPartyName = '';

    protected string $passkeyRelyingPartyId = '';

    protected ?string $passkeyRelyingPartyIcon = null;

    public function enablePasskeys(bool $condition = true, ?string $relyingPartyName = null, ?string $relyingPartyId = null, ?string $relyingPartyIcon = null, bool $scopeToPanel = true): static
    {
        $this->passkeys = $condition;
        $this->scopePasskeysToPanel = $scopeToPanel;
        $this->passkeyRelyingPartyName = $relyingPartyName ?? config('app.name');
        $this->passkeyRelyingPartyId = $relyingPartyId ?? parse_url(config('app.url'), PHP_URL_HOST);
        $this->passkeyRelyingPartyIcon = $relyingPartyIcon;

        return $this;
    }

    public function scopePasskeysToPanel(): bool
    {
        return $this->scopePasskeysToPanel;
    }

    public function passkeyRelyingPartyName(): string
    {
        return $this->passkeyRelyingPartyName;
    }

    public function passkeyRelyingPartyId(): string
    {
        return $this->passkeyRelyingPartyId;
    }

    public function passkeyRelyingPartyIcon(): ?string
    {
        return $this->passkeyRelyingPartyIcon;
    }

    public function passkeySerializer(): Serializer
    {
        $attestationStatementSupportManager = AttestationStatementSupportManager::create();

        /** @var Serializer $serializer */
        $serializer = (new WebauthnSerializerFactory($attestationStatementSupportManager))->create();

        return $serializer;
    }

    public function passkeyRelatedPartyEntity(): PublicKeyCredentialRpEntity
    {
        return new PublicKeyCredentialRpEntity(
            name: $this->passkeyRelyingPartyName(),
            id: $this->passkeyRelyingPartyId(),
            icon: $this->passkeyRelyingPartyIcon(),
        );
    }

    public function passkeyGenerateUserEntity(): PublicKeyCredentialUserEntity
    {
        return new PublicKeyCredentialUserEntity(
            name: $this->auth()->user()?->email,
            id: $this->auth()->user()?->id,
            displayName: $this->auth()->user()?->name,
        );
    }

    public function generatePasskeyRegisterOptions(): string
    {
        $options = new PublicKeyCredentialCreationOptions(
            rp: $this->passkeyRelatedPartyEntity(),
            user: $this->passkeyGenerateUserEntity(),
            challenge: Str::random(),
        );

        return $this->passkeySerializer()->serialize($options, 'json');
    }

    public function generatePasskeyAuthenticationOptions(): string
    {
        $options = new PublicKeyCredentialRequestOptions(
            challenge: Str::random(),
            rpId: $this->passkeyRelyingPartyId(),
            allowCredentials: [],
        );

        return $this->passkeySerializer()->serialize($options, 'json');
    }

    public function storePasskey(Authenticatable $authenticatable, string $passkeyJson, string $passkeyOptionsJson, string $hostName, array $additionalProperties = []): Passkey
    {
        $publicKeyCredentialSource = $this->passkeyDeterminePublicKeyCredentialSource(
            $passkeyJson,
            $passkeyOptionsJson,
            $hostName
        );

        /** @var Passkey $passkey */
        $passkey = Passkey::create([
            ...$additionalProperties,
            'authenticatable_id' => $this->auth()->id(),
            'authenticatable_type' => $this->auth()->user()->getMorphClass(),
            'data' => $publicKeyCredentialSource,
        ]);

        return $passkey;
    }

    public function passkeyDeterminePublicKeyCredentialSource(string $passkeyJson, string $passkeyOptionsJson, string $hostName)
    {
        $passkeyOptions = $this->getPasskeyOptions($passkeyOptionsJson);

        $publicKeyCredential = $this->getPasskey($passkeyJson);

        if (! $publicKeyCredential->response instanceof AuthenticatorAttestationResponse) {
            throw new \Exception('The given passkey is not a valid public key credential.');
        }

        $csmFactory = new CeremonyStepManagerFactory;
        $creationCsm = $csmFactory->creationCeremony();

        try {
            $publicKeyCredentialSource = AuthenticatorAttestationResponseValidator::create($creationCsm)->check(
                authenticatorAttestationResponse: $publicKeyCredential->response,
                publicKeyCredentialCreationOptions: $passkeyOptions,
                host: $hostName,
            );
        } catch (Throwable $exception) {
            throw new \Exception('The given passkey could not be validated.');
        }

        return $publicKeyCredentialSource;
    }

    protected function getPasskeyOptions(string $passkeyOptionsJson): PublicKeyCredentialCreationOptions
    {
        if (! json_validate($passkeyOptionsJson)) {
            throw new \Exception('The given passkey should be formatted as json.');
        }

        /** @var PublicKeyCredentialCreationOptions $passkeyOptions */
        $passkeyOptions = $this->passkeySerializer()->deserialize(
            $passkeyOptionsJson,
            PublicKeyCredentialCreationOptions::class,
            'json',
        );

        return $passkeyOptions;
    }

    protected function getPasskey(string $passkeyJson): PublicKeyCredential
    {
        if (! json_validate($passkeyJson)) {
            throw new \Exception('The given passkey should be formatted as json.');
        }

        /** @var PublicKeyCredential $publicKeyCredential */
        $publicKeyCredential = $this->passkeySerializer()->deserialize(
            $passkeyJson,
            PublicKeyCredential::class,
            'json',
        );

        return $publicKeyCredential;
    }

    public function findPasskeyToAuthenticate(string $publicKeyCredentialJson, string $passkeyOptionsJson): ?Passkey
    {
        $publicKeyCredential = $this->determinePublicKeyCredential($publicKeyCredentialJson);

        if (! $publicKeyCredential) {
            return null;
        }

        $passkey = $this->findPasskey($publicKeyCredential);

        if (! $passkey) {
            return null;
        }

        /** @var PublicKeyCredentialRequestOptions $passkeyOptions */
        $passkeyOptions = $this->passkeySerializer()->deserialize(
            $passkeyOptionsJson,
            PublicKeyCredentialRequestOptions::class,
            'json',
        );

        $publicKeyCredentialSource = $this->determinePublicKeyCredentialSource(
            $publicKeyCredential,
            $passkeyOptions,
            $passkey,
        );

        if (! $publicKeyCredentialSource) {
            return null;
        }

        $this->updatePasskey($passkey, $publicKeyCredentialSource);

        return $passkey;
    }

    public function determinePublicKeyCredential(string $publicKeyCredentialJson): ?PublicKeyCredential
    {
        $publicKeyCredential = $this->passkeySerializer()->deserialize(
            $publicKeyCredentialJson,
            PublicKeyCredential::class,
            'json',
        );

        if (! $publicKeyCredential->response instanceof AuthenticatorAssertionResponse) {
            return null;
        }

        return $publicKeyCredential;
    }

    protected function findPasskey(PublicKeyCredential $publicKeyCredential): ?Passkey
    {
        return Passkey::firstWhere('credential_id', mb_convert_encoding($publicKeyCredential->rawId, 'UTF-8'));
    }

    protected function determinePublicKeyCredentialSource(PublicKeyCredential $publicKeyCredential, PublicKeyCredentialRequestOptions $passkeyOptions, Passkey $passkey): ?PublicKeyCredentialSource
    {
        $csmFactory = new CeremonyStepManagerFactory;
        $requestCsm = $csmFactory->requestCeremony();

        try {
            $validator = AuthenticatorAssertionResponseValidator::create($requestCsm);

            $publicKeyCredentialSource = $validator->check(
                publicKeyCredentialSource: $passkey->data,
                authenticatorAssertionResponse: $publicKeyCredential->response,
                publicKeyCredentialRequestOptions: $passkeyOptions,
                host: parse_url(config('app.url'), PHP_URL_HOST),
                userHandle: null,
            );
        } catch (Throwable) {
            return null;
        }

        return $publicKeyCredentialSource;
    }

    protected function updatePasskey(Passkey $passkey, PublicKeyCredentialSource $publicKeyCredentialSource): self
    {
        $passkey->update([
            'data' => $publicKeyCredentialSource,
            'last_used_at' => now(),
        ]);

        return $this;
    }
}
