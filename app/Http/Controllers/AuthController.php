<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Contracts\AuthRepositoryInterface;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

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

    public function login(LoginUserRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $user = $this->authRepository->login($validatedData);

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = auth()->attempt($validatedData);

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }

}
