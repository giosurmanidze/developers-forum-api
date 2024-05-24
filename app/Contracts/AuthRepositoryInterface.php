<?php

namespace App\Contracts;

use App\Models\User;

interface AuthRepositoryInterface
{
    public function register($data): ?User;
}