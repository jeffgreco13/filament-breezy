<?php

namespace JeffGreco13\FilamentBreezy\Models;

use Illuminate\Database\Eloquent\Model;
use JeffGreco13\FilamentBreezy\Traits\FilamentTeamInviteTrait;

class TeamInvite extends Model
{
    use FilamentTeamInviteTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config("filament-breezy.team_invites_table");
    }
}
