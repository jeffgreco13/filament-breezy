<?php

return [
    "login" => [
        "username_or_email" => "Gebruikersnaam of wachtwoord",
        "forgot_password_link" => "Wachtwoord vergeten?",
        "create_an_account" => "account aanmaken",
    ],
    "registration" => [
        "title" => "Registreren",
        "heading" => "Nieuwe account aanmaken",
        "submit" => [
            "label" => "Inloggen",
        ],
        "notification_unique" => "Een account met dit e-mailaddres bestaat al. Graag inloggen.",
    ],
    "reset_password" => [
        "title" => "Wachtwoord vergeten",
        "heading" => "Wachtwoord opnieuw instellen",
        "submit" => [
            "label" => "Verzenden",
        ],
        "notification_error" => "Error: probeer het later nogmaals.",
        "notification_success" => "Controleer je e-mail voor instructies!",
    ],
    "verification" => [
        "title" => "E-mail bevestigen",
        "heading" => "Email bevestiging verplicht",
        "submit" => [
            "label" => "Uitloggen",
        ],
        "notification_success" => "Er is een e-mail verstuurd met instructies om een nieuw wachtwoord in te stellen.",
        "notification_resend" => "Verificatie email opnieuw verstuurd.",
        "before_proceeding" => "Voordat je verder gaat, controleer je e-mail voor een verificatie link.",
        "not_receive" => "Indien je geen e-mail ontvangen hebt,",
        "request_another" => "klik hier om een nieuwe aan te vragen",
    ],
    "profile" => [
        "account" => "Account",
        "profile" => "Profiel",
        "my_profile" => "Mijn profiel",
        "personal_info" => [
            "heading" => "Persoonlijke informatie",
            "subheading" => "Beheer je persoonlijke informatie.",
            "submit" => [
                "label" => "Opslaan",
            ],
            "notify" => "Profiel succesvol bijgewerkt!",
        ],
        "password" => [
            "heading" => "Wachtwoord",
            "subheading" => "Minimale lengte is 8 karakters",
            "submit" => [
                "label" => "Opslaan",
            ],
            "notify" => "Wachtwoord succesvol bijgewerkt!",
        ],
        "sanctum" => [
            "title" => "API Tokens",
            "description" => "Beheer API tokens voor externe-toegang tot je account. BELANGRIJK: je token is eenmalig zichbaar na aanmaken. Indien je je token vergeet zul je deze moeten verwijderen en een nieuwe aanmaken.",
            "create" => [
                "notify" => "Token succesvol aangemaakt!",
                "submit" => [
                    "label" => "Aanmaken",
                ],
            ],
            "update" => [
                "notify" => "Token succesvol bijgewerkt!",
            ],
        ],
    ],
    "fields" => [
        "name" => "Naam",
        "email" => "E-mailadres",
        "password" => "Wachtwoord",
        "password_confirm" => "Wachtwoord bevestigen",
        "new_password" => "Nieuw wachtwoord",
        "new_password_confirmation" => "Nieuw wachtwoord bevestigen",
        "token_name" => "Token naam",
        "abilities" => "Mogelijkheden",
    ],
    "or" => "Of",
];
