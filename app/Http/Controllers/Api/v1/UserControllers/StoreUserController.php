<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\StoreUserRequest;
use App\Http\Resources\StoreUserRessource;
use App\UseCases\UserUseCases\StoreUserUseCase;
use Illuminate\Http\JsonResponse;

class StoreUserController extends Controller
{
    protected StoreUserUseCase $userService;
    public function __construct(StoreUserUseCase $userService)
    {
        $this->userService = $userService;
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $request= $request->validated();
        $user   = $this->userService->execute($request);

        if($user):
            $user = new StoreUserRessource($user);
            return response()->json($user, 200);
        else:
            return response()->json('Something went wrong!', 500);
        endif;
    }
}
