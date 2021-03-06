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
use App\Http\Requests\Test;

if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}

Route::post('/form-post', 'StudiesController@radios');

Route::get('/', 'SiteController@index');
Route::resource('/studies', 'StudiesController');
