<?php

namespace JeffGreco13\FilamentBreezy\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureValidTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $currentTeam = $user->currentTeam;

        if (! $currentTeam || ! $user->teams->contains($currentTeam)) {
            // If the currentTeam is invalid OR currentTeam isn't in their list of teams, take action...
            if (! ($team = $user->teams()->first())) {
                $user->current_team_id = null;
            // User doesn't have any teams. Abort.
                // abort(
                //     403,
                //     "You are not assigned to a team. Please contact support."
                // );
            } else {
                $user->current_team_id = $team->id;
            }
            $user->save();
        }

        return $next($request);
    }
}
