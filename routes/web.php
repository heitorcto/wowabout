<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::view('/', 'principal')->name('site.principal');

Route::view('/master', 'masterLogin', ['erro' => ''])->name('site.login');
Route::post('/master', [AdminController::class, 'efetuarLogin']);

Route::group(['middleware' => 'admin.session', 'prefix' => 'master'], function () {
    Route::view('/principal', 'masterPrincipal')->name('master.principal');

    Route::prefix('classes')->group(function () {
        Route::view('/', 'masterClasses', ['tituloFerramenta' => 'Classes'])->name('master.classes');
        Route::view('/cadastrar', 'masterClassesCadastrar', ['tituloFerramenta' => 'Classes'])->name('master.classes.cadastrar');
    });

    Route::get('/sair', [AdminController::class, 'destruirLogin']);
});