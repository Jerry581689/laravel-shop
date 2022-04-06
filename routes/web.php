<?php
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('shop');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'ProductController@index');
Route::post('/addproduct', 'ProductController@create');
Route::post('/editproduct', 'ProductController@update');
Route::post('/deleteproduct', 'ProductController@destory');
Route::post('/editperson', 'HomeController@update');
Route::get('/Cart', 'CartController@index');
Route::post('/addcart', 'CartController@getAddToCart');
Route::get('/increase-one-item/{id}', 'CartController@increaseByOne');
Route::get('/decrease-one-item/{id}', 'CartController@decreaseByOne');
Route::get('/remove-item/{id}', 'CartController@removeItem');
Route::get('/clear-cart', 'CartController@clearCart');

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin', 'Admin\UsersController@index');
});
