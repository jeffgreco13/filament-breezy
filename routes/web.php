<?php

use Filament\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use JeffGreco13\FilamentBreezy\Http\Controllers\EmailVerificationController;

Route::domain(config("filament.domain"))
    ->middleware(config("filament.middleware.base"))
    ->name(config('filament-breezy.route_group_prefix'))
    ->prefix(config("filament.path"))
    ->group(function () {
        // Login will be replaced in the Filament config.
        if (config("filament-breezy.enable_registration")) {
            Route::get("/register", config('filament-breezy.registration_component_path'))->name("register");
        }
        Route::get("/password/reset", config('filament-breezy.password_reset_component_path'))->name(
            "password.request"
        );

        Route::get("/password/reset/{token}", config('filament-breezy.password_reset_component_path'))->name(
            "password.reset"
        );

        Route::get("email/verify", config('filament-breezy.email_verification_component_path'))
            ->middleware(["throttle:6,1", "auth:" . config('filament.auth.guard')])
            ->name("verification.notice");

        Route::get("email/verify/{id}/{hash}", [
            config('filament-breezy.email_verification_controller_path') ?? EmailVerificationController::class,
            "__invoke",
        ])
            ->middleware(["signed"])
            ->name("verification.verify");

        Route::middleware(config("filament.middleware.auth"))->group(
            function (): void {
                //
                // TODO: Route::get('password/confirm', Confirm::class)
                //
            }
        );
    });
