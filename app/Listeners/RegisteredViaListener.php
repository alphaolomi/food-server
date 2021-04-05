<?php

namespace App\Listeners;

use App\Events\Auth\RegisteredViaProvider;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisteredViaListener
{
    /**
     * Handle the event.
     *
     * @param  RegisteredViaProvider  $event
     * @return void
     */
    public function handle(RegisteredViaProvider $event)
    {
        // Notification::route('mail', $event->user->email)->notify(new SendWelcomelNotification($user));

        activity('auth')
            ->withProperties(['ip' => request()->ip(), 'agent' => request()->header('user-agent')])
            ->causedBy($event->user)->log('registeredVia' . $event->provider);
    }
}
