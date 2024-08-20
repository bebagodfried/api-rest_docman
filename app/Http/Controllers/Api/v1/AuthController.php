<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\LoginUserRequest;
use App\UseCases\UserUseCases\LoginUserUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected LoginUserUseCase $auth;
    public function __construct(LoginUserUseCase $auth)
    {
        $this->auth = $auth;
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        $token       = $this->auth->execute($credentials);

        if($token):
            $token = $token->createToken('API Token');
            return response()->json(['token' => $token->plainTextToken ], 200);
        else:
            return response()->json('The provided credentials are incorrect.', 200);
        endif;
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json('Successfully logged out', 200);
    }
}
