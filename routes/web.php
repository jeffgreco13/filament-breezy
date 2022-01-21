<?php
use Illuminate\Support\Facades\Route;
use JeffGreco13\FilamentBreezy\Http\Livewire\Auth\Register;
use JeffGreco13\FilamentBreezy\Http\Livewire\Auth\ResetPassword;
use JeffGreco13\FilamentBreezy\Http\Livewire\Auth\Verify;
use JeffGreco13\FilamentBreezy\Http\Controllers\EmailVerificationController;

Route::domain(config("filament.domain"))
    ->middleware(config("filament.middleware.base"))
    ->prefix(config("filament.path"))
    ->group(function () {
        // Login will be replaced in the Filament config.
        Route::get("/register", Register::class)->name("register");
        Route::get("/password/reset", ResetPassword::class)->name(
            "password.request"
        );

        Route::get("/password/reset/{token}", ResetPassword::class)->name(
            "password.reset"
        );

        Route::get("email/verify", Verify::class)
            ->middleware("throttle:6,1")
            ->name("verification.notice");

        Route::get("email/verify/{id}/{hash}", [
            EmailVerificationController::class,
            "__invoke",
        ])
            ->middleware("signed")
            ->name("verification.verify");

        Route::middleware(config("filament.middleware.auth"))->group(
            function (): void {
                //
                // Route::get('password/confirm', Confirm::class)
                //     ->name('password.confirm');
                //
            }
        );
    });
