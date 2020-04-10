<?php

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

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/page/{pagina}','WelcomeController@showPage')->name('show-pagina');

Route::get('/login','LoginController@login')->name('login');

Route::post('/entrar','LoginController@entrar')->name('entrar');


Route::middleware(['auth'])->group(function(){
	Route::get('/logout','LoginController@logout')->name('logout');

	Route::get('/home','HomeController@index')->name('home');

	Route::get('/perfil','PerfilController@index')->name('show-perfil-page');

	Route::post('/perfil/update', 'PerfilController@update')->name('perfil.update');

});

Route::middleware(['auth','verifyIsAdmin'])->group(function(){
	Route::resource('menus','MenuController');
	Route::resource('submenus','SubmenuController');
	Route::resource('paginas','PaginaController');
	Route::resource('users','UserController');
});

Route::middleware(['auth','verifyIsEscritor'])->group(function(){
	Route::resource('categorias','CategoriaController');
	Route::resource('tags','TagController');
	Route::resource('postagens','PostagemController');
});



