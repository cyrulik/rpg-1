<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class UserOwnsCharacter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();
        $character = $request->route('character');

        if ($user && $user->character->id !== $character->id) {
            return redirect()->back();
        }

        return $next($request);
    }
}
