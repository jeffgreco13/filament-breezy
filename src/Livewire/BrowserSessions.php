<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HigherOrderTapProxy;
use Jenssegers\Agent\Agent;

class BrowserSessions extends MyProfileComponent
{
    protected string $view = 'filament-breezy::livewire.browser-sessions';

    protected string $listView = 'filament-breezy::components.browser-sessions-list';

    public array $data;

    public static $sort = 50;

    public function mount()
    {
        //
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                ViewField::make('browserSessions')
                    ->label(__('filament-breezy::default.profile.browser_sessions.label'))
                    ->hiddenLabel()
                    ->view($this->listView)
                    ->viewData(['data' => self::getSessions()]),

                Actions::make([
                    Action::make('deleteBrowserSessions')
                        ->label(__('filament-breezy::default.profile.browser_sessions.logout_other_sessions'))
                        ->requiresConfirmation()
                        ->modalHeading(__('filament-breezy::default.profile.browser_sessions.logout_heading'))
                        ->modalDescription(__('filament-breezy::default.profile.browser_sessions.logout_description'))
                        ->modalSubmitActionLabel(__('filament-breezy::default.profile.browser_sessions.logout_action'))
                        ->schema([
                            TextInput::make('password')
                                ->password()
                                ->revealable()
                                ->label(__('filament-breezy::default.fields.password'))
                                ->required(),
                        ])
                        ->action(function (array $data) {
                            self::logoutOtherBrowserSessions($data['password']);
                        })
                        ->modalWidth('xl'),
                ]),
            ]);
    }

    public static function getSessions(): array
    {
        if (config('session.driver') !== 'database') {
            return [];
        }

        $sessions = DB::connection(config('session.connection'))->table(config('session.table'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->latest('last_activity')
            ->get();

        return $sessions->map(function (object $session): object {
            $agent = self::createAgent($session);

            return (object) [
                'device' => [
                    'browser' => $agent->browser(),
                    'desktop' => $agent->isDesktop(),
                    'mobile' => $agent->isMobile(),
                    'tablet' => $agent->isTablet(),
                    'platform' => $agent->platform(),
                ],
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === request()->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        })->toArray();
    }

    protected static function createAgent(mixed $session): Agent|HigherOrderTapProxy
    {
        return tap(new Agent, fn ($agent) => $agent->setUserAgent($session->user_agent));
    }

    public static function logoutOtherBrowserSessions($password): void
    {
        if (! Hash::check($password, Auth::user()->password)) {
            Notification::make()
                ->danger()
                ->title(__('filament-breezy::default.profile.browser_sessions.incorrect_password'))
                ->send();

            return;
        }

        Auth::guard()->logoutOtherDevices($password);

        request()->session()->put([
            'password_hash_'.Auth::getDefaultDriver() => Auth::user()->getAuthPassword(),
        ]);

        self::deleteOtherSessionRecords();

        Notification::make()
            ->success()
            ->title(__('filament-breezy::default.profile.browser_sessions.logout_success'))
            ->send();
    }

    protected static function deleteOtherSessionRecords(): void
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        DB::connection(config('session.connection'))
            ->table(config('session.table'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->where('id', '!=', request()->session()->getId())
            ->delete();
    }
}
