<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\StoreUserRequest;
use App\Http\Requests\UserRequests\UpdateUserRequest;
use App\Http\Resources\StoreUserRessource;
use App\Http\Resources\UpdateUserRessource;
use App\UseCases\UserUseCases\DestroyUserUseCase;
use App\UseCases\UserUseCases\StoreUserUseCase;
use App\UseCases\UserUseCases\UpdateUserUseCase;
use Illuminate\Http\JsonResponse;

class DestroyUserController extends Controller
{
    protected DestroyUserUseCase $userService;
    public function __construct(DestroyUserUseCase $userService)
    {
        $this->userService = $userService;
    }

    public function destroy($id): JsonResponse
    {
        $delete = $this->userService->execute($id);

        if($delete):
            return response()->json("User with id=$id deleted successfully", 200);
        else:
            return response()->json("Bad request no user with id=$id!", 400);
        endif;
    }
}
