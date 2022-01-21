@props(['action'])
<div class="flex items-center justify-center min-h-screen bg-gray-100 text-gray-900">

    @if(session()->has('notify'))
    <x-filament::notification :status="session('notify.status')" :message="session('notify.message')" />
    @endif

    <div class="p-2 max-w-md space-y-8 w-screen">
        <form wire:submit.prevent="{{$action}}" class="bg-white space-y-8 shadow border border-gray-300 rounded-2xl p-8">
            {{$slot}}
        </form>
        <x-filament::footer />
    </div>
</div>
