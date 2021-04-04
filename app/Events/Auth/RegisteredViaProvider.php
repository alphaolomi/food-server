<?php

namespace App\Events\Auth;

use \Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Queue\SerializesModels;

class RegisteredViaProvider
{
    use SerializesModels;

    /**
     *
     * @var Authenticatable
     */
    public $user;

    /**
     * @var $provider
     */
    public $provider;

    /**
     * Create a new event instance.
     * @param Authenticatable $user
     * @param  $provider
     */
    public function __construct(Authenticatable $user, $provider)
    {
        $this->user = $user;
        $this->provider = $provider;
    }
}
