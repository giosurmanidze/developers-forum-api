<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Contracts\AuthRepositoryInterface;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(RegisterUserRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->authRepository->register($validatedData);

        return ApiResponseClass::sendResponse(
            new UserResource($user), "User registered successfully", 201
        );
    }
}
