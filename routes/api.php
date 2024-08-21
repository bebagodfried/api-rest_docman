<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ProjectControllers\ArchiveProjectByIdController;
use App\Http\Controllers\Api\v1\ProjectControllers\DestroyProjectController;
use App\Http\Controllers\Api\v1\ProjectControllers\FindProjectByIdController;
use App\Http\Controllers\Api\v1\ProjectControllers\GetProjectsController;
use App\Http\Controllers\Api\v1\ProjectControllers\StoreProjectController;
use App\Http\Controllers\Api\v1\ProjectControllers\UnarchivedProjectByIdController;
use App\Http\Controllers\Api\v1\ProjectControllers\UpdateProjectController;
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
    Route::post('user/register',            [StoreUserController::class, 'store'])->name('register');
    Route::post('user/login',               [AuthController::class, 'login'])->name('login');
    Route::post('user/logout',              [AuthController::class, 'logout'])
        ->middleware('auth:sanctum')->name('logout');

    Route::middleware('auth:sanctum')->group(function (){
        // projects
        Route::get('projects',                  [GetProjectsController::class, 'index']);
        Route::post('projects',                 [StoreProjectController::class, 'store']);

        Route::get('project/{id}',              [FindProjectByIdController::class, 'show']);
        Route::put('project/{id}',              [UpdateProjectController::class, 'update']);

        Route::delete('project/{id}',           [DestroyProjectController::class, 'destroy']);

        Route::get('project/{id}/archive',      [ArchiveProjectByIdController::class, 'archive']);
        Route::get('project/{id}/unarchived',   [UnarchivedProjectByIdController::class, 'unarchived']);

        // users
        Route::get('users',                 [GetUsersController::class, 'index']);

        Route::get('user/{id}',             [FindUserByIdController::class, 'show']);
        Route::put('user/{id}',             [UpdateUserController::class, 'update']);

        Route::delete('user/{id}',          [DestroyUserController::class, 'destroy']);

        Route::get('user/{id}/activate',    [EnableUserByIdController::class, 'activate']);
        Route::get('user/{id}/deactivate',  [DisableUserByIdController::class, 'deactivate']);
    });
});
