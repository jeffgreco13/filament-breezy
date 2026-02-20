# Upgrade Guide

Below are instructions for upgrading between major versions of Breezy.

---

## From v2.x to v3.0

### Breaking changes
- PHP 8.2 or higher is now required
- Filament V4 is now required

### Upgrade steps

1. Update the composer package in your `composer.json`:
```json
"jeffgreco13/filament-breezy": "^3.0",
```

2. Integrate Tailwind classes

Filament V4 recommends developers to [create a custom theme](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) to better support a plugin's additional Tailwind classes.
After you have created your custom theme, add Breezy's views to your theme's `theme.css` file usually located in `resources/css/filament/admin/theme.css`:
```css
@source '../../../../vendor/jeffgreco13/filament-breezy/resources/**/*';
```

3. If you have published views or added custom profile components, update them to match the new syntax:
```bladehtml
<x-filament::section :aside="true" heading="Your title" description="This is the description">
    <form wire:submit.prevent="submit" class="space-y-6">

        {{ $this->form }}

        <div class="text-right">
            <x-filament::button type="submit" form="submit" class="align-right">
                Submit!
            </x-filament::button>
        </div>
    </form>
</x-filament::section>
```
