<?php

use App\Http\Controllers\Api\FlutterApiGet;
use App\Http\Controllers\Api\TextsController;
use App\Http\Middleware\VerifyToken;
use Illuminate\Support\Facades\Route;

Route::get('/flutter', [FlutterApiGet::class, 'index']);
Route::post('/create-user', [FlutterApiGet::class, 'store']);

Route::post('/auth', [FlutterApiGet::class, 'auth']);

Route::middleware([VerifyToken::class])->group(function () {
    Route::get('/texts', [TextsController::class, 'index']);
    Route::post('/text-create', [TextsController::class, 'create']);
});
