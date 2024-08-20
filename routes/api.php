<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\UserControllers\DestroyUserController;
use App\Http\Controllers\Api\v1\UserControllers\DisableUserByIdController;
use App\Http\Controllers\Api\v1\UserControllers\EnableUserByIdController;
use App\Http\Controllers\Api\v1\UserControllers\FindUserByIdController;
use App\Http\Controllers\Api\v1\UserControllers\GetUsersController;
use App\Http\Controllers\Api\v1\UserControllers\StoreUserController;
use App\Http\Controllers\Api\v1\UserControllers\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function ()
{
    Route::post('user/login',               [AuthController::class, 'login'])->name('login');
    Route::post('user/logout',              [AuthController::class, 'logout'])
        ->middleware('auth:sanctum')->name('logout');

    Route::middleware('auth:sanctum')->group(function (){
        Route::get('users',                 [GetUsersController::class, 'index']);
        Route::post('users',                [StoreUserController::class, 'store']);

        Route::get('user/{id}',             [FindUserByIdController::class, 'show']);
        Route::put('user/{id}',             [UpdateUserController::class, 'update']);

        Route::delete('user/{id}',          [DestroyUserController::class, 'destroy']);

        Route::get('user/{id}/activate',    [EnableUserByIdController::class, 'activate']);
        Route::get('user/{id}/deactivate',  [DisableUserByIdController::class, 'deactivate']);
    });
});
