<?php

namespace App\Auth;

use App\Auth\Contracts\CustomGuard as CustomGuardContract;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Providers\Contracts\CustomUserProvider;

//TODO: Implement and use Custom Guard
class CustomGuard implements CustomGuardContract
{
    /**
     * The user provider implementation.
     *
     * @var CustomUserProvider
     */
    protected $provider;

    public function __construct(CustomUserProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Attempt to authenticate a user
     *
     * @return bool
     */
    public function attempt()
    {
        $user = $this->provider->retrieveByCookie('');
        if ($user != null)
            return true;
        return false;
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