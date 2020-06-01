<?php
use App\Product;
use App\Category;
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
return view ('store.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Admin*/
Route::get('/admin', function () {

return view('template.admin');

});

Route::resource('admin/category', 'Admin\AdminCategoryController')->names('admin.category');