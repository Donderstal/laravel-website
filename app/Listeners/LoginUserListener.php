<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Carbon;

class LoginUserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object $event
     * @return void
     */
    public function handle(Login $event)
    {
        // Update last login field
        $event->user->timestamps = false;
        $event->user->last_login = Carbon::now()->toDateTimeString();
        $event->user->save();

        // Log user ip
        activity('users')
            ->causedBy($event->user)
            ->withProperties(['ip' => request()->ip()])
            ->log('login');
    }
}
