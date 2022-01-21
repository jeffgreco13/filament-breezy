<div>
    <x-filament::card>

        <x-slot name="heading">
            Team Invites
        </x-slot>

        <div class="divide-y">
            @forelse ($currentTeamInvites as $invite)
                <div class="flex justify-between py-3 px-5">
                    <div>
                        <p>{{$invite->team->name}}</p>
                        <p class="text-sm text-gray-500">sent {{$invite->updated_at->diffForHumans()}}</p>
                    </div>
                    <div class="flex space-x-2">
                        <button type="button" wire:click="acceptInvite({{$invite->id}})">
                            <x-heroicon-o-check class="w-4 text-success-500" />
                        </button>
                        <button type="button" wire:click="cancelInvite({{$invite->id}})">
                            <x-heroicon-o-x class="w-4 text-danger-500" />
                        </button>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

    </x-filament::card>
</div>
