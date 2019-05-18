<?php

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

Route::get('/', ['uses' => 'Controller@homepage']);
Route::get('/cadastro', ['uses' => 'Controller@cadastrar']);
Route::get('/curl', ['uses' => 'Controller@curl']);
Route::get('/login', ['uses' => 'Controller@fazerlogin']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'DashboardController@logout']);
Route::post('/login', ['as' => 'login', 'uses' => 'DashboardController@auth']);
Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);


Route::get('getback', ['as' => 'moviments.getback','uses' => 'MovimentsController@getback']);
Route::post('getback', ['as' => 'moviments.getback.store', 'uses' => 'MovimentsController@storeGetBack']);
Route::get('moviment', ['as' => 'moviment.application','uses' => 'MovimentsController@application']);
Route::post('moviment', ['as' => 'moviment.application.store', 'uses' => 'MovimentsController@store']);
Route::get('user/moviment', ['as' => 'moviment.index', 'uses' => 'MovimentsController@index'] );
Route::get('moviments/all', ['as' => 'moviments.all', 'uses' => 'MovimentsController@all']);
Route::resource('user', 'UsersController');
Route::resource('institution', 'InstitutionsController');
Route::resource('group', 'GroupsController');
Route::resource('institution.product', 'ProductsController');
Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'GroupsController@userStore']);

});
// Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
