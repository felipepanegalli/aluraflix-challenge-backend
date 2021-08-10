<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [AuthController::class, 'default'])->name('login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/free', [VideoController::class, 'free'])->name('videos.free');

// Authenticated Routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    // Auth Routes
    Route::get('/me', [AuthController::class, 'me'])->name('auth.me');
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // Videos Routes
    Route::prefix('videos')->group(function () {
        Route::get('', [VideoController::class, 'index'])->name('videos.index');
        Route::post('', [VideoController::class, 'store'])->name('videos.store');
        Route::get('{id}', [VideoController::class, 'show'])->name('videos.show');
        Route::put('{id}', [VideoController::class, 'update'])->name('videos.update');
        Route::delete('{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
    });

    // Categorias Routes
    Route::prefix('categorias')->group(function () {
        Route::get('', [CategoriaController::class, 'index'])->name('categorias.index');
        Route::post('', [CategoriaController::class, 'store'])->name('categorias.store');
        Route::get('{id}', [CategoriaController::class, 'show'])->name('categorias.show');
        Route::put('{id}', [CategoriaController::class, 'update'])->name('categorias.update');
        Route::delete('{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
        Route::get('{id}/videos', [VideoController::class, 'getVideosByCategoriaId'])->name('categorias.videos');
    });
});
