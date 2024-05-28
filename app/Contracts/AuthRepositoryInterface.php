<?php

namespace App\Contracts;

use App\Models\User;

interface AuthRepositoryInterface
{
    public function register($data): ?User;
    public function login(array $credentials): ?User;
    public function logout(): bool;

}