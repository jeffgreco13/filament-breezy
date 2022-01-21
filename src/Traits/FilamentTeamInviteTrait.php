<?php

namespace JeffGreco13\FilamentBreezy\Traits;

use Illuminate\Support\Facades\Config;

trait FilamentTeamInviteTrait
{
    /**
     * Has-One relations with the team model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function team()
    {
        return $this->hasOne(
            config("filament-breezy.team_model"),
            "id",
            "team_id"
        );
    }

    /**
     * Has-One relations with the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->hasOne(
            config("filament-breezy.user_model"),
            "email",
            "email"
        );
    }

    /**
     * Has-One relations with the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function inviter()
    {
        return $this->hasOne(
            config("filament-breezy.user_model"),
            "id",
            "user_id"
        );
    }
}
