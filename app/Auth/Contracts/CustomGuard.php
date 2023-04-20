<?php

declare (strict_types=1);

namespace App\Auth\Contracts;
use Illuminate\Contracts\Auth\Guard;

interface CustomGuard extends Guard
{
    /**
     * Attempt to authenticate a user
     *
     * @return bool
     */
    public function attempt();
}