<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\Auth\RegisterRequest;
use App\Http\Resources\UserResources\StoreUserResource;
use App\UseCases\UserUseCases\StoreUserUseCase;
use Illuminate\Http\JsonResponse;

class StoreUserController extends Controller
{
    protected StoreUserUseCase $userService;
    public function __construct(StoreUserUseCase $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $request= $request->validated();
        $user   = $this->userService->execute($request);

        if($user):
            $user = new StoreUserResource($user);
            return response()->json($user,201);
        else:
            return response()->json('Something went wrong!', 500);
        endif;
    }
}
