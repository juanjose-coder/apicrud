<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;

Route::apiResource('/nota', NotaController::class);
