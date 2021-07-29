<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('videos')->group(function () {
    Route::get('', [VideoController::class, 'index'])->name('videos.index');
    Route::post('', [VideoController::class, 'store'])->name('videos.store');
    Route::get('{id}', [VideoController::class, 'show'])->name('videos.show');
    Route::put('{id}', [VideoController::class, 'update'])->name('videos.update');
    Route::delete('{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
});
