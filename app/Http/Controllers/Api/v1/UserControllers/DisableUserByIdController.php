<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\UseCases\UserUseCases\DisableUserByIdUseCase;
use Illuminate\Http\JsonResponse;

class DisableUserByIdController extends Controller
{
    protected DisableUserByIdUseCase $userService;
    public function __construct(DisableUserByIdUseCase $userService)
    {
        $this->userService = $userService;
    }

    public function deactivate($id): JsonResponse
    {
        $user = $this->userService->execute($id);

        if($user):
            return response()->json("User with id=$id deactivated successfully");
        else:
            return response()->json("No user with id=$id here!", 404);
        endif;
    }
}
