<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserRessource;
use App\UseCases\UserUseCases\DisableUserByIdUseCase;
use App\UseCases\UserUseCases\EnableUserByIdUseCase;
use App\UseCases\UserUseCases\FindUserByIdUseCase;
use App\UseCases\UserUseCases\GetUsersUseCase;
use Illuminate\Http\JsonResponse;
use function PHPUnit\Framework\isEmpty;

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
            return response()->json("User with id=$id deactivated successfully", 200);
        else:
            return response()->json("No user with id=$id here!");
        endif;
    }
}
