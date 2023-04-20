<?php

declare (strict_types=1);

namespace App\Providers\Contracts;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

interface CustomUserProvider extends UserProvider
{
    /**
     * Retrieve user from Cookie
     * @param string $name
     * @return Authenticatable|null
     */
    public function retrieveByCookie(string $name);
}