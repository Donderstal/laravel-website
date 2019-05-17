<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class Administration
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

        $user = Auth::user();

        // Update last login field
        $user->timestamps = false;
        $user->last_activity = Carbon::now()->toDateTimeString();
        $user->save();

        // Log last user activity
        activity('users')
            ->causedBy($user->id)
            ->withProperties(['url' => URL::full()])
            ->log('activity');

        return $next($request);
    }
}
