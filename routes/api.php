<?php

use App\Http\Controllers\Api\FixturesController;
use App\Http\Controllers\Api\TopScorersController;
use Illuminate\Support\Facades\Route;

Route::get('/fixtures', FixturesController::class);
Route::get('/topscorers', TopScorersController::class);
