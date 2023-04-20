<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

//TODO: Implement and use Custom Guard
class CustomGuard implements Guard
{

    /**
     * The user provider implementation.
     *
     * @var UserProvider
     */
    protected $provider;

    public function __construct(UserProvider $provider)
    {
        $this->provider = $provider;
    }
    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check()
    {
        throw new \Exception('Not Implemented.');
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest()
    {
        throw new \Exception('Not Implemented.');
    }
    /**
     * Get the currently authenticated user.
     *
     * @return Authenticatable|null
     */
    public function user()
    {
        throw new \Exception('Not Implemented.');
    }

    /**
     * Get the ID for the currently authenticated user.
     *
     * @return int|string|null
     */
    public function id()
    {
        throw new \Exception('Not Implemented.');
    }

    /**
     * The default 'auth' middleware calls default 'SessionGuard'(Illuminate\Auth\SessionGuard)
     * Since 'SessionGuard' implements 'StatefulGuard', it has 'attempt' method.
     * Since we are implementing 'Guard', we do not have 'attempt' method.
     * We can either add 'attmpt' method or use this 'validate' method.
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        throw new \Exception('Not Implemented.');
    }

    /**
     * Determine if the guard has a user instance.
     *
     * @return bool
     */
    public function hasUser()
    {
        throw new \Exception('Not Implemented.');
    }

    /**
     * Set the current user.
     *
     * @param  Authenticatable  $user
     * @return void
     */
    public function setUser(Authenticatable $user)
    {
        throw new \Exception('Not Implemented.');
    }
}