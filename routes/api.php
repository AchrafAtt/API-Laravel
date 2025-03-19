<?php

use App\Http\Controllers\Api\Autcontroller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [Autcontroller::class,'login']);
Route::post('/register', [Autcontroller::class,'register']);
Route::get ('/tickets', function() {
    return Ticket::all();
}
);

Route::middleware('auth:sanctum')-> post('/logout', [Autcontroller::class,'logout']);


