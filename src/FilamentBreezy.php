<?php

namespace JeffGreco13\FilamentBreezy;

use JeffGreco13\FilamentBreezy\Events\UserInvitedToTeam;
use JeffGreco13\FilamentBreezy\Models\TeamInvite;

class FilamentBreezy
{
    public static function inviteToTeam(
        $user,
        $team = null,
        callable $success = null
    ) {
        if (is_null($team)) {
            $team = auth()->user()->current_team_id;
        } elseif (is_object($team)) {
            $team = $team->getKey();
        } elseif (is_array($team)) {
            $team = $team["id"];
        }

        if (is_object($user) && isset($user->email)) {
            $email = $user->email;
        } elseif (is_string($user)) {
            $email = $user;
        } else {
            throw new \Exception(
                'The provided object has no "email" attribute and is not a string.'
            );
        }

        $invite = app()->make(config("filament-breezy.invite_model"));
        $invite->user_id = auth()
            ->user()
            ->getKey();
        $invite->team_id = $team;
        $invite->type = "invite";
        $invite->email = $email;
        $invite->accept_token = md5(uniqid(microtime()));
        $invite->deny_token = md5(uniqid(microtime()));
        $invite->save();

        if (!is_null($success)) {
            event(new UserInvitedToTeam($invite));
            $success($invite);
        }

        return $invite;
    }

    /**
     * Checks if the given email address has a pending invite for the
     * provided Team.
     * @param $email
     * @param Team|array|int $team
     * @return bool
     */
    public static function hasPendingInvite($email, $team)
    {
        if (is_object($team)) {
            $team = $team->getKey();
        }
        if (is_array($team)) {
            $team = $team["id"];
        }

        return app()
            ->make(config("filament-breezy.invite_model"))
            ->where("email", "=", $email)
            ->where("team_id", "=", $team)
            ->first()
            ? true
            : false;
    }

    /**
     * @param $token
     * @return mixed
     */
    public static function getInviteFromAcceptToken($token)
    {
        return app()
            ->make(config("filament-breezy.invite_model"))
            ->where("accept_token", "=", $token)
            ->first();
    }

    /**
     * @param TeamInvite $invite
     */
    public static function acceptInvite(TeamInvite $invite)
    {
        auth()
            ->user()
            ->attachTeam($invite->team);
        $invite->delete();
    }

    /**
     * @param $token
     * @return mixed
     */
    public static function getInviteFromDenyToken($token)
    {
        return app()
            ->make(config("filament-breezy.invite_model"))
            ->where("deny_token", "=", $token)
            ->first();
    }

    /**
     * @param TeamInvite $invite
     */
    public static function denyInvite(TeamInvite $invite)
    {
        $invite->delete();
    }
}
