<?php
use Illuminate\Support\Facades\Route;
use JeffGreco13\FilamentBreezy\Http\Controllers\EmailVerificationController;
use Filament\Http\Middleware\Authenticate;

Route::domain(config("filament.domain"))
    ->middleware(config("filament.middleware.base"))
    ->prefix(config("filament.path"))
    ->group(function () {
        // Login will be replaced in the Filament config.
        if (config("filament-breezy.enable_registration")) {
            Route::get("/register", config('filament-breezy.registration_component_path'))->name("filament.register");
        }
        Route::get("/password/reset", config('filament-breezy.password_reset_component_path'))->name(
            "filament.password.request"
        );

        Route::get("/password/reset/{token}", config('filament-breezy.password_reset_component_path'))->name(
            "filament.password.reset"
        );

        Route::get("email/verify", config('filament-breezy.email_verification_component_path'))
            ->middleware(["throttle:6,1","auth"])
            ->name("filament.verification.notice");

        Route::get("email/verify/{id}/{hash}", [
            EmailVerificationController::class,
            "__invoke",
        ])
            ->middleware([Authenticate::class,"signed"])
            ->name("filament.verification.verify");

        Route::middleware(config("filament.middleware.auth"))->group(
            function (): void {
                //
                // TODO: Route::get('password/confirm', Confirm::class)
                //
            }
        );
    });
