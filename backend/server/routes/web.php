<?php
//use Symfony\Component\Routing\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginGtdController@login');
});


Route::post('/add', 'TestController@add');
Route::get('/conceptos', 'TramiteController@index');

Route::group(['prefix' => 'monitoring', 'namespace' => 'Monitoring'], function () {
    Route::get('data', 'PendingController@C_listTipoDocumento');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
