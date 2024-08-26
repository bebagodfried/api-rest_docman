<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\UpdateUserRequest;
use App\Http\Resources\UserResources\UpdateUserResource;
use App\UseCases\UserUseCases\UpdateUserUseCase;
use Illuminate\Http\JsonResponse;

class UpdateUserController extends Controller
{
    protected UpdateUserUseCase $userService;
    public function __construct(UpdateUserUseCase $userService)
    {
        $this->userService = $userService;
    }

    public function update($id, UpdateUserRequest $request): JsonResponse
    {
        $update = $request->validated();
        $user   = $this->userService->execute($id, $update);

        if($user):
            $user = new UpdateUserResource($user);
            return response()->json($user);
        else:
            return response()->json("Bad request on user resources, please check and try again!", 400);
        endif;
    }
}
