<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\UseCases\UserUseCases\FindUserByIdUseCase;
use Illuminate\Http\JsonResponse;

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
            return response()->json($user);
        else:
            return response()->json("No user with id=$id here!", 404);
        endif;
    }
}
