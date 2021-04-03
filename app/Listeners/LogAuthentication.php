<?php

namespace App\Listeners;

class LogAuthentication
{

    /**
     * Handle user login events.
     * @param $event
     */
    public function onUserLogin($event)
    {
        activity('auth')
            ->withProperties(['ip' => request()->ip(), 'agent' => request()->header('user-agent')])
            ->causedBy($event->user)->log('Logged In');
    }

    /**
     * Handle user logout events.
     * @param $event
     */
    public function onUserLogout($event)
    {
        activity('auth')
            ->withProperties(['ip' => request()->ip(), 'agent' => request()->header('user-agent')])
            ->causedBy($event->user)->log('Logged Out');
    }

    /**
     * Handle user logout events.
     * @param $event
     */
    public function onChangePassword($event)
    {
        activity('auth')
            ->withProperties(['ip' => request()->ip(), 'agent' => request()->header('user-agent')])
            ->causedBy($event->user)->log('Password Changed');
    }

    /**
     * Handle user onPasswordReset events.
     * @param $event
     */
    public function onPasswordReset($event)
    {
        activity('auth')
            ->withProperties(['ip' => request()->ip(), 'agent' => request()->header('user-agent')])
            ->causedBy($event->user)->log('Password Reset');
    }
}
