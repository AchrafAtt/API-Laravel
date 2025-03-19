<?php

use App\Http\Controllers\Api\V1\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//?apiResource is a method that creates multiple routes for a resource controller and give us ability to specify which methods we want to include in the controller

Route::apiResource('tickets', TicketController::class);