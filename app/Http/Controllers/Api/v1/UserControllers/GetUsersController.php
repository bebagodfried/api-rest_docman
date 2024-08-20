<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\UseCases\UserUseCases\GetUsersUseCase;
use Illuminate\Http\JsonResponse;

class GetUsersController extends Controller
{
    protected GetUsersUseCase $userService;
    public function __construct(GetUsersUseCase $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        $users = $this->userService->execute();

        if($users):
            return response()->json($users);
        else:
            return response()->json('Nothing here!');
        endif;
    }
}
