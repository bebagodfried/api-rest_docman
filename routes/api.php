<?php

use App\Http\Controllers\Api\v1\DocumentControllers\ArchiveDocumentByIdController;
use App\Http\Controllers\Api\v1\DocumentControllers\DestroyDocumentController;
use App\Http\Controllers\Api\v1\DocumentControllers\FindDocumentByIdController;
use App\Http\Controllers\Api\v1\DocumentControllers\GetArchivedDocumentsController;
use App\Http\Controllers\Api\v1\DocumentControllers\GetAuthorByDocumentIdController;
use App\Http\Controllers\Api\v1\DocumentControllers\GetDocumentsController;
use App\Http\Controllers\Api\v1\DocumentControllers\GetHistoryByDocumentIdController;
use App\Http\Controllers\Api\v1\DocumentControllers\StoreDocumentController;
use App\Http\Controllers\Api\v1\DocumentControllers\UnArchivedDocumentByIdController;
use App\Http\Controllers\Api\v1\DocumentControllers\UpdateDocumentController;
use App\Http\Controllers\Api\v1\HistoryControllers\FindHistoryByIdController;
use App\Http\Controllers\Api\v1\HistoryControllers\GetHistoriesController;
use App\Http\Controllers\Api\v1\ProjectControllers\ArchiveProjectByIdController;
use App\Http\Controllers\Api\v1\ProjectControllers\DestroyProjectController;
use App\Http\Controllers\Api\v1\ProjectControllers\FindProjectByIdController;
use App\Http\Controllers\Api\v1\ProjectControllers\GetArchivedProjectsController;
use App\Http\Controllers\Api\v1\ProjectControllers\GetAuthorByProjectIdController;
use App\Http\Controllers\Api\v1\ProjectControllers\GetProjectsController;
use App\Http\Controllers\Api\v1\ProjectControllers\StoreProjectController;
use App\Http\Controllers\Api\v1\ProjectControllers\UnArchivedProjectByIdController;
use App\Http\Controllers\Api\v1\ProjectControllers\UpdateProjectController;
use App\Http\Controllers\Api\v1\UserControllers\Auth\AuthController;
use App\Http\Controllers\Api\v1\UserControllers\DestroyUserController;
use App\Http\Controllers\Api\v1\UserControllers\DisableUserByIdController;
use App\Http\Controllers\Api\v1\UserControllers\EnableUserByIdController;
use App\Http\Controllers\Api\v1\UserControllers\FindUserByIdController;
use App\Http\Controllers\Api\v1\UserControllers\GetProjectsByUserIdController;
use App\Http\Controllers\Api\v1\UserControllers\GetUsersController;
use App\Http\Controllers\Api\v1\UserControllers\StoreUserController;
use App\Http\Controllers\Api\v1\UserControllers\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function ()
{
    // auth
    Route::middleware('guest')->group(function (){
        Route::post('/register',               [StoreUserController::class, 'register'])->name('register');
        Route::post('/login',                  [AuthController::class, 'login'])->name('login');
    });

    Route::middleware('auth:sanctum')->group(function (){
        // documents
        Route::prefix('documents')->group(function () {
            Route::get('/',                     [GetDocumentsController::class, 'index'])->name('documents.index');
            Route::post('/',                    [StoreDocumentController::class, 'store'])->name('documents.store');
            Route::get('/archived',             [GetArchivedDocumentsController::class, 'getArchived'])->name('documents.archived');

            Route::get('/{id}',                 [FindDocumentByIdController::class, 'show'])->name('document.show');
            Route::put('/{id}',                 [UpdateDocumentController::class, 'update'])->name('document.update');
            Route::delete('/{id}',              [DestroyDocumentController::class, 'destroy'])->name('document.destroy');

            Route::get('/{id}/author',          [GetAuthorByDocumentIdController::class, 'getAuthor'])->name('document.author');
            Route::patch('/{id}/archive',       [ArchiveDocumentByIdController::class, 'archive'])->name('document.archive');
            Route::patch('/{id}/unarchived',    [UnarchivedDocumentByIdController::class, 'unarchived'])->name('document.unarchived');

            Route::get('/{id}/history',         [GetHistoryByDocumentIdController::class, 'getHistories'])->name('document.histories');
        });

        // histories
        Route::prefix('history')->group(function () {
            Route::get('/',                     [GetHistoriesController::class, 'index'])->name('history');
            Route::get('/{id}',                 [FindHistoryByIdController::class, 'show'])->name('history.show');
        });

        // projects
        Route::prefix('projects')->group(function () {
            Route::get('/',                     [GetProjectsController::class, 'index'])->name('projects.index');
            Route::post('/',                    [StoreProjectController::class, 'store'])->name('projects.store');
            Route::get('/archived',             [GetArchivedProjectsController::class, 'getArchived'])->name('projects.archived');

            Route::get('/{id}',                 [FindProjectByIdController::class, 'show'])->name('project.show');
            Route::put('/{id}',                 [UpdateProjectController::class, 'update'])->name('project.update');
            Route::delete('/{id}',              [DestroyProjectController::class, 'destroy'])->name('project.destroy');

            Route::get('/{id}/author',          [GetAuthorByProjectIdController::class, 'getAuthor'])->name('project.author');
            Route::patch('/{id}/archive',       [ArchiveProjectByIdController::class, 'archive'])->name('project.archive');
            Route::patch('/{id}/unarchived',    [UnarchivedProjectByIdController::class, 'unarchived'])->name('project.unarchived');
        });

        // users
        Route::prefix('users')->group(function (){
            Route::get('/',                     [GetUsersController::class, 'index'])->name('users.index');
            Route::post('/',                    [StoreUserController::class, 'register'])->name('users.store');

            Route::get('/{id}',                 [FindUserByIdController::class, 'show'])->name('author.show');
            Route::put('/{id}',                 [UpdateUserController::class, 'update'])->name('author.update');
            Route::delete('/{id}',              [DestroyUserController::class, 'destroy'])->name('author.destroy');

            Route::get('/{id}/projects',        [GetProjectsByUserIdController::class, 'getProjects'])->name('author.projects');
            Route::patch('/{id}/grant',         [EnableUserByIdController::class, 'activate'])->name('author.granted');
            Route::patch('/{id}/revoke',        [DisableUserByIdController::class, 'deactivate'])->name('author.revoked');
        });

        // logout
        Route::delete('/logout',                    [AuthController::class, 'logout'])->name('logout');
    });
});
