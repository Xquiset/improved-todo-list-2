<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Create home route
Route::middleware('auth:sanctum')->get('/', [ItemController::class, 'index'])->name('dashboard');

// Items routes
Route::resources([
    'items' => ItemController::class
], ['middleware' => 'auth:sanctum']);
