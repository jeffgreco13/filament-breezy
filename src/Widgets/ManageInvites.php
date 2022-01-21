<?php

namespace JeffGreco13\FilamentBreezy\Widgets;

use Filament\Widgets\Widget;
use JeffGreco13\FilamentBreezy\FilamentBreezy;
use JeffGreco13\FilamentBreezy\Models\TeamInvite;

class ManageInvites extends Widget
{
    protected static string $view = "filament-breezy::filament.widgets.manage-invites";

    public $currentTeamInvites = [];

    public static function canView(): bool
    {
        return count(auth()->user()->invites);
    }

    protected function refreshInvites()
    {
        $this->currentTeamInvites = TeamInvite::whereEmail(
            auth()->user()->email
        )->get();
    }

    public function mount()
    {
        $this->refreshInvites();
    }

    public function acceptInvite(TeamInvite $invite)
    {
        FilamentBreezy::acceptInvite($invite);
        $this->refreshInvites();
    }

    public function cancelInvite(TeamInvite $invite)
    {
        FilamentBreezy::denyInvite($invite);
        $this->refreshInvites();
    }
}
