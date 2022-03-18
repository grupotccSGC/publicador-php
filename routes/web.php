<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\MidiaBOController;
use App\Http\Controllers\FaleConoscoController;
use App\Http\Controllers\HistoriasBOController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

/*
|--------------------------------------------------------------------------
| Web routes dashboard get 
|--------------------------------------------------------------------------
*/

Route::get('/', [LoginController::class, 'login'])->name('/');
Route::get('/logout', [LoginController::class, 'logout'])->name('/logout');
Route::get('/redefinir-senha/{token}', [LoginController::class, 'esqueciSenha'])->middleware('guest')->name('password.reset');
//Route::get('/gerarsenha', [LoginController::class, 'senha'])->name('/gerarsenha');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('auth')->name('/dashboard');
Route::get('/depoimento', [HistoriasBOController::class, 'depoimento'])->middleware('auth')->name('/depoimento');
Route::get('/tableHistorias', [HistoriasBOController::class, 'tableHistorias'])->middleware('auth')->name('/tableHistorias');
Route::get('/editarDepoimento/{id}', [HistoriasBOController::class, 'editarDepoimento'])->middleware('auth')->name('/editarDepoimento');
Route::get('/fale-conosco', [FaleConoscoController::class, 'faleConosco'])->middleware('auth')->name('/fale-conosco');
Route::get('/tableContato', [FaleConoscoController::class, 'tableContato'])->middleware('auth')->name('/tableContato');
Route::get('/fale-conosco/enviar-email/{id}', [FaleConoscoController::class, 'AdminContatoCliente'])->middleware('auth')->name('/fale-conosco/enviar-email/{id}');
Route::get('/perfil', [PerfilController::class, 'perfil'])->middleware('auth')->name('/perfil');
Route::get('/usuario', [UserController::class, 'usuario'])->middleware('auth')->name('/usuario');
Route::get('/tableUsuario', [UserController::class, 'tableUsuario'])->middleware('auth')->name('/tableUsuario');
Route::get('/usuario/editar/{id}', [UserController::class, 'editar'])->middleware('auth')->name('/editar');
Route::get('/usuario/remover/{id}', [UserController::class, 'tableRemoverRow'])->middleware('auth')->name('/usuario/remover/{id}');
Route::get('/usuario/cadastrar-usuario', [UserController::class, 'cadastrarUsuario'])->middleware('auth')->name('/cadastrar-usuario');
Route::get('/configurações', [AdminController::class, 'config'])->middleware('auth')->name('/configurações');;
Route::get('/midia', [MidiaBOController::class, 'midia'])->middleware('auth')->name('/midia');
Route::get('/tableMidia', [MidiaBOController::class, 'tableMidia'])->middleware('auth')->name('/tableMidia');
Route::get('/midia/remover/{id}', [MidiaBOController::class, 'tableRemoverRow'])->middleware('auth')->name('/midia/remover/{id}');
Route::get('/exportar', [MidiaBOController::class, 'exportar']); 
Route::get('/album', [AlbumController::class, 'album'])->middleware('auth')->name('/album');
Route::get('/cadastrar-album', [AlbumController::class, 'cadastrarAlbum'])->middleware('auth')->name('/novo-album');
Route::get('/album/tableAlbum', [AlbumController::class, 'tableAlbum'])->middleware('auth')->name('/album/tableAlbum');
Route::get('/album/remover/{id}', [AlbumController::class, 'tableRemoverRow'])->middleware('auth')->name('/midia/remover/{id}');
Route::get('/album/editar/{id}', [AlbumController::class, 'editarAlbum'])->middleware('auth')->name('/album/editar/{id}');

/*
|--------------------------------------------------------------------------
| Web routes dashboard post 
|--------------------------------------------------------------------------
*/

Route::post('/requestLogin', [LoginController::class, 'requestLogin']);
Route::post('/reset-password', [LoginController::class, 'resetPassword'])->middleware('guest')->name('password.update');
Route::post('/updateDepoimento', [HistoriasBOController::class, 'update']);
Route::post('/enviarEmail', [FaleConoscoController::class, 'enviarEmail']);
Route::post('/updateUsuario', [PerfilController::class, 'atualizar']);
Route::post('/updateSenha', [PerfilController::class, 'atualizarSenha']);
Route::post('/editarUsuario', [UserController::class, 'editarUsuario']);
Route::post('/cadastrarNovoUsuario', [UserController::class, 'cadastrarNovoUsuario']);
Route::post('/dropzoneUpload', [MidiaBOController::class, 'dropzoneUpload']);
Route::post('/cadastrarNovoAlbum', [AlbumController::class, 'cadastrarNovoAlbum']);

