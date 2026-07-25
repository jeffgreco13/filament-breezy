<?php

use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;
use Livewire\Livewire;
use Orchestra\Testbench\Factories\UserFactory;

beforeEach(function () {
    $this->loadLaravelMigrations();

    $this->user = UserFactory::new()->create([
        'name' => 'Original Name',
        'email' => 'original@example.com',
    ]);

    $this->actingAs($this->user);
});

it('does not require the current password when only the name changes', function () {
    Livewire::test(PersonalInfo::class)
        ->fillForm(['name' => 'New Name', 'email' => 'original@example.com'])
        ->call('submit')
        ->assertHasNoFormErrors();

    expect($this->user->refresh()->name)->toBe('New Name');
});

it('rejects an email change without the current password', function () {
    Livewire::test(PersonalInfo::class)
        ->fillForm(['name' => 'Original Name', 'email' => 'attacker@example.com'])
        ->call('submit')
        ->assertHasFormErrors(['current_password' => 'required']);

    expect($this->user->refresh()->email)->toBe('original@example.com');
});

it('rejects an email change with an incorrect current password', function () {
    Livewire::test(PersonalInfo::class)
        ->fillForm([
            'name' => 'Original Name',
            'email' => 'attacker@example.com',
            'current_password' => 'not-the-password',
        ])
        ->call('submit')
        ->assertHasFormErrors(['current_password']);

    expect($this->user->refresh()->email)->toBe('original@example.com');
});

it('allows an email change with the correct current password', function () {
    Livewire::test(PersonalInfo::class)
        ->fillForm([
            'name' => 'Original Name',
            'email' => 'new@example.com',
            'current_password' => 'password',
        ])
        ->call('submit')
        ->assertHasNoFormErrors();

    expect($this->user->refresh()->email)->toBe('new@example.com');
});
