<?php

use App\Http\Controllers\AccessController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('setpresence');
});*/

Route::get('/', function () {
    return view('setpresence');
});

Route::post('/enregistrer-presence',  [AccessController::class, 'setAccess'])->name('enregistrer-presence');


Route::get('/connexion', function () {
    return view('adminlogin');
});

Route::post('/connexion',  [AccessController::class, 'connexion'])->name('connexion-admin');

Route::get('/administration',  [AccessController::class, 'admin'])->name('administration');
;
