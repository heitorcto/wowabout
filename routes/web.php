<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

Route::view('/', 'principal', ['menuAtivo' => 'principal'])->name('site.principal');
Route::view('/cadastro', 'cadastro', ['menuAtivo' => 'cadastro'])->name('site.cadastro');

Route::post('cadastros', [UsuarioController::class, 'getCadastro']);