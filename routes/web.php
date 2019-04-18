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

Route::get('/', 'Watches@index')->name('watches.index');
Route::get('/watches', 'Watches@watches')->name('watches.products');
Route::get('watches/{id}','Watches@viewWatches')->where('id','[0-9]+')->name('watches.view');
Route::get('/order/add','Watches@addOrder')->name('watches.addpage');
Route::get('/feedback/add','Watches@addfeedback')->name('feedback.addpage');
//----------------------[ watches ]-------------------------

//Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

Route::get('/admin/config_watches','AdminPanel@watchesConfig')->name('watches.config');

Route::get('/admin/add_watches','AdminPanel@addWatches')->name('watches.addpage');
Route::post('/admin/add_watches/do', 'AdminPanel@addWatchesAction')->name('watches.addaction');

Route::get('/admin/del_watches','AdminPanel@deleteWatchesPage')->name('watches.deletepage');
Route::post('/admin/del_watches/do', 'AdminPanel@deleteWatchesAction')->name('watches.deleteaction');

// ----------------------[ orders ]-----------------------------

Route::get('/admin/orders_config','AdminPanel@ordersConfig')->name('orders.config');

Route::post('/admin/add_orders','AdminPanel@addOrders')->name('orders.addpage');
Route::post('/admin/add_orders/do', 'AdminPanel@addOrdersAction')->name('orders.addaction');

Route::get('/admin/del_orders','AdminPanel@deleteOrdersPage')->name('orders.deletepage');
Route::post('/admin/del_orders/do', 'AdminPanel@deleteOrdersAction')->name('orders.deleteaction');

// ---------------------[ feedback ]-----------------------------

Route::get('/admin/feedback_config','AdminPanel@feedbackConfig')->name('feedback.config');

Route::get('/feedback/add','Watches@addFeedback')->name('feedback.addpage');
Route::post('/feedback/add/do', 'Watches@addfeedbackAction')->name('feedback.addaction');

Route::get('/admin/del_feedback','AdminPanel@deletefeedbackPage')->name('feedback.deletepage');
Route::post('/admin/del_feedback/do', 'AdminPanel@deletefeedbackAction')->name('feedback.deleteaction');


// ---------------------[ about us ]----------------------------

Route::get('/about','Watches@about')->name('about');


// ---------------------[ reg/auth ]----------------------------

Auth::routes();

Route::get('/logout','Auth\LoginController@logout');

// ---------------------[ shopping cart ]----------------------------

Route::get('/cart', 'ShoppingCart@show')->name('cart.show');

Route::post('/cart/add', 'ShoppingCart@add')->name('cart.add');
Route::post('/cart/del', 'ShoppingCart@delete')->name('cart.delete');
Route::post('/cart/proceed', 'ShoppingCart@proceed')->name('cart.proceed');
Route::post('/cart/clear', 'ShoppingCart@clear')->name('cart.clear'); 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
