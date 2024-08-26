<?php

use App\Http\Controllers\Api\v1\DocumentControllers\ArchiveDocumentByIdController;
use App\Http\Controllers\Api\v1\DocumentControllers\DestroyDocumentController;
use App\Http\Controllers\Api\v1\DocumentControllers\FindDocumentByIdController;
use App\Http\Controllers\Api\v1\DocumentControllers\GetArchivedDocumentsController;
use App\Http\Controllers\Api\v1\DocumentControllers\GetAuthorByDocumentIdController;
use App\Http\Controllers\Api\v1\DocumentControllers\GetDocumentsController;
use App\Http\Controllers\Api\v1\DocumentControllers\StoreDocumentController;
use App\Http\Controllers\Api\v1\DocumentControllers\UnArchivedDocumentByIdController;
use App\Http\Controllers\Api\v1\DocumentControllers\UpdateDocumentController;
use App\Http\Controllers\Api\v1\HistoryControllers\FindHistoryByIdController;
use App\Http\Controllers\Api\v1\HistoryControllers\GetHistoriesController;
use App\Http\Controllers\Api\v1\HistoryControllers\GetHistoryByDocumentIdController;
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
        Route::post('/register',                [StoreUserController::class, 'register'])->name('register');
        Route::post('/login',                   [AuthController::class, 'login'])->name('login');
    });

    Route::middleware('auth:sanctum')->group(function (){
        // archived
        Route::prefix('archived')->name('archived.')->group(function (){
            Route::get('/documents',            [GetArchivedDocumentsController::class, 'getArchived'])->name('documents');
            Route::get('/projects',             [GetArchivedProjectsController::class, 'getArchived'])->name('projects');
        });

        // documents
        Route::prefix('documents')->name('documents.')->group(function () {
            Route::get('/',                     [GetDocumentsController::class, 'index'])->name('index');
            Route::post('/',                    [StoreDocumentController::class, 'store'])->name('store');
        });

        Route::prefix('document')->name('document.')->group(function () {
            Route::get('/{id}',                 [FindDocumentByIdController::class, 'show'])->name('show');
            Route::put('/{id}',                 [UpdateDocumentController::class, 'update'])->name('update');
            Route::delete('/{id}',              [DestroyDocumentController::class, 'destroy'])->name('destroy');

            Route::get('/{id}/author',          [GetAuthorByDocumentIdController::class, 'getAuthor'])->name('author');
            Route::patch('/{id}/archive',       [ArchiveDocumentByIdController::class, 'archive'])->name('archive');
            Route::patch('/{id}/unarchived',    [UnarchivedDocumentByIdController::class, 'unarchived'])->name('unarchived');

            Route::get('/{id}/history',         [GetHistoryByDocumentIdController::class, 'getHistories'])->name('histories');
        });

        // histories
        Route::prefix('history')->name('history.')->group(function () {
            Route::get('/',                     [GetHistoriesController::class, 'index'])->name('index');
            Route::get('/{id}',                 [FindHistoryByIdController::class, 'show'])->name('show');
        });

        // projects
        Route::prefix('projects')->name('projects.')->group(function () {
            Route::get('/',                     [GetProjectsController::class, 'index'])->name('index');
            Route::post('/',                    [StoreProjectController::class, 'store'])->name('store');
        });

        Route::prefix('project')->name('project.')->group(function () {
            Route::get('/{id}',                 [FindProjectByIdController::class, 'show'])->name('show');
            Route::put('/{id}',                 [UpdateProjectController::class, 'update'])->name('update');
            Route::delete('/{id}',              [DestroyProjectController::class, 'destroy'])->name('destroy');

            Route::get('/{id}/author',          [GetAuthorByProjectIdController::class, 'getAuthor'])->name('author');
            Route::patch('/{id}/archive',       [ArchiveProjectByIdController::class, 'archive'])->name('archive');
            Route::patch('/{id}/unarchived',    [UnarchivedProjectByIdController::class, 'unarchived'])->name('unarchived');
        });

        // users
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/',                     [GetUsersController::class, 'index'])->name('index');
            Route::post('/',                    [StoreUserController::class, 'register'])->name('store');
        });

        Route::prefix('user')->group(function (){
            Route::name('profile.')->group(function () {
                Route::get('/{id}',             [FindUserByIdController::class, 'show'])->name('show');
                Route::put('/{id}',             [UpdateUserController::class, 'update'])->name('update');
                Route::delete('/{id}',          [DestroyUserController::class, 'destroy'])->name('destroy');
            });

            Route::name('author.')->group(function () {
                Route::get('/{id}/projects',    [GetProjectsByUserIdController::class, 'getProjects'])->name('projects');
                Route::patch('/{id}/grant',     [EnableUserByIdController::class, 'activate'])->name('granted');
                Route::patch('/{id}/revoke',    [DisableUserByIdController::class, 'deactivate'])->name('revoked');
            });
        });

        // logout
        Route::delete('/logout',                [AuthController::class, 'logout'])->name('logout');
    });
});
