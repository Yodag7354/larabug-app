<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ExceptionController;

Route::post('/feedback', [ApiController::class, 'feedback'])->name('api.feedback');

Route::middleware('auth:api')->group(function () {
    Route::post('/log', [ApiController::class, 'log'])->name('exceptions.log');
});

Route::post('auth/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:passport')->group(function () {
    Route::get('projects', [ProjectController::class, 'list']);
    Route::get('projects/{id}', [ProjectController::class, 'show']);
    Route::get('exceptions', [ExceptionController::class, 'recentExceptions']);
});