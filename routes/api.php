<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/events/last', [EventController::class, 'last'])->name('events.last');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/events', [EventController::class, 'store']);
});
