<?php

namespace App\Repositories;

use App\Contracts\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function register($data): User
    {
        $user = User::create($data);
        return $user;
    }

    public function login(array $credentials): ?User
    {
        if (!Auth::attempt($credentials)) {
            return null;
        }

        return Auth::user();
    }

    public function logout(): bool
    {
        auth()->logout();
        return true;
    }
}