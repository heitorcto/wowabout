<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClasseController;

use App\Models\Classe;

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

Route::view('/master', 'masterLogin')->name('site.login');
Route::post('/master', [AdminController::class, 'efetuarLogin']);

Route::group(['middleware' => 'admin.session', 'prefix' => 'master'], function () {
    Route::view('/principal', 'masterPrincipal')->name('master.principal');

    Route::prefix('classes')->group(function () {
        Route::view('/', 'masterClasses', ['tituloFerramenta' => 'Classes', 'classes' => Classe::all()])->name('master.classes');
        Route::view('/cadastrar', 'masterClassesCadastrar', ['tituloFerramenta' => 'Classes'])->name('master.classes.cadastrar');
        Route::post('/cadastrar', [ClasseController::class, 'cadastrarClasse'])->name('efetuar.cadastro.classe');
        Route::get('/deletar/{codigo?}', [ClasseController::class, 'deletarClasse'])->name('deletar.classe');
        Route::get('/redirectEditar/{codigo?}', [ClasseController::class, 'redirecionarEditar'])->name('editar.classe');
        Route::post('/editar/{codigo?}', [ClasseController::class, 'efetuarEdicao'])->name('efetuar.edicao.classe');
    });

    Route::get('/sair', [AdminController::class, 'destruirLogin']);
});