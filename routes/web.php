<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OdemeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CariController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'search']);
Route::get('/odemeler/{odeme:kod}', [OdemeController::class, 'show'])->missing(
    function (Request $req) {
        return redirect('/')->withErrors(['kod' => 'Hatalı kod.']);
    }
);
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->middleware('guest');
    Route::post('/', [AdminController::class, 'login'])->middleware('guest');
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/odemeler', [OdemeController::class, 'index']);

    Route::get('/cariler',[CariController::class,'index']);
    Route::get('/cariler/create',[CariController::class,'create']);
    Route::post('/cariler',[CariController::class,'store']);

    Route::get('/cariler/{cari:slug}/odemeler/create',[OdemeController::class,'create']);
    Route::post('/cariler/{cari:slug}/odemeler',[OdemeController::class,'store']);
});
