<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserRessource;
use App\UseCases\UserUseCases\FindUserByIdUseCase;
use App\UseCases\UserUseCases\GetUsersUseCase;
use Illuminate\Http\JsonResponse;
use function PHPUnit\Framework\isEmpty;

class FindUserByIdController extends Controller
{
    protected FindUserByIdUseCase $userService;
    public function __construct(FindUserByIdUseCase $userService)
    {
        $this->userService = $userService;
    }

    public function show($id): JsonResponse
    {
        $user = $this->userService->execute($id);

        if($user):
            return response()->json($user, 200);
        else:
            return response()->json("No user with id=$id here!");
        endif;
    }
}
