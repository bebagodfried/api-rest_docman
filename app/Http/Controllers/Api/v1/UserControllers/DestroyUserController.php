<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\UseCases\UserUseCases\DestroyUserUseCase;
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
            return response()->json("User with id=$id deleted successfully");
        else:
            return response()->json("Bad request on user resources, please check and try again!", 400);
        endif;
    }
}
