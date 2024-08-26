<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\UseCases\UserUseCases\EnableUserByIdUseCase;
use Illuminate\Http\JsonResponse;

class EnableUserByIdController extends Controller
{
    protected EnableUserByIdUseCase $userService;
    public function __construct(EnableUserByIdUseCase $userService)
    {
        $this->userService = $userService;
    }
    public function activate($id): JsonResponse
    {
        $user = $this->userService->execute($id);

        if($user):
            return response()->json("User with id=$id activated successfully");
        else:
            return response()->json("Bad request on user resources, please check and try again!", 400);
        endif;
    }
}
