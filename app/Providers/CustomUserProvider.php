<?php

declare(strict_types=1);

namespace App\Providers;

use App\Auth\CustomUser;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Providers\Contracts\CustomUserProvider as CustomUserProviderContract;

class CustomUserProvider implements CustomUserProviderContract
{
    /**
     * Retrieve user from Cookie
     * @param string $name
     * @return Authenticatable|null
     */
    public function retrieveByCookie(string $name)
    {
        //For now, just return a dummy user
        $attributes = array(
            'id' => 'test',
            'custom_id' => 'custom_value',
            'password' => 'password',
        );
        return new CustomUser($attributes);
    }
    
    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        throw new \Exception('Not Implemented.');
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        throw new \Exception('Not Implemented.');
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        throw new \Exception('Not Implemented.');
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        throw new \Exception('Not Implemented.');
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        throw new \Exception('Not Implemented.');
    }
}
