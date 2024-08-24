<?php

namespace App\Http\Controllers\Api\v1\UserControllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\Auth\LoginRequest;
use App\UseCases\UserUseCases\Auth\AuthUserUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AuthUserUseCase $auth;
    public function __construct(AuthUserUseCase $auth)
    {
        $this->auth = $auth;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        $token       = $this->auth->execute($credentials);

        if($token && $token->activated):
            $token = $token->createToken('API Token');
            return response()->json(['token' => $token->plainTextToken ]);
        elseif ($token && !$token->activated):
            return response()->json('User forbidden.', 403);
        else:
            return response()->json('The provided credentials are incorrect.', 401);
        endif;
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json('Successfully logged out');
    }
}
