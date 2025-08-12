<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div>
        <div>
            <div class="text-sm text-gray-600">
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('filament-breezy::default.profile.browser_sessions.content') }}
                </div>
                @if (count($data) > 0)
                    <div class="mt-5 space-y-6">
                        @foreach ($data as $session)
                            <div class="flex items-center">
                                <div>
                                    @if ($session->device['desktop'])
                                        <x-filament::icon
                                            icon="heroicon-o-computer-desktop"
                                            class="w-8 h-8 text-gray-500 dark:text-gray-400"
                                        />
                                    @else
                                        <x-filament::icon
                                            icon="heroicon-o-device-phone-mobile"
                                            class="w-8 h-8 text-gray-500 dark:text-gray-400"
                                        />
                                    @endif
                                </div>

                                <div class="ms-3">
                                    <div class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $session->device['platform'] ? $session->device['platform'] : __('Unknown') }} - {{ $session->device['browser'] ? $session->device['browser'] : __('Unknown') }}
                                    </div>

                                    <div>
                                        <div class="text-xs text-gray-500">
                                            {{ $session->ip_address }},

                                            @if ($session->is_current_device)
                                                <span class="font-semibold text-primary-500">{{ __('filament-breezy::default.profile.browser_sessions.device') }}</span>
                                            @else
                                                {{ __('filament-breezy::default.profile.browser_sessions.last_active') }} {{ $session->last_active }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-dynamic-component>
