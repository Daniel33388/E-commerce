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

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function () {
    return view('faq');
});


########### Marks #############
Route::get('/adminMarks', 'MarksController@index')->middleware('admin');
Route::post('/addMark', 'MarksController@store')->middleware('admin');
Route::post('/editMark/{id}', 'MarksController@update')->middleware('admin');
Route::post('/deleteMark/{id}', 'MarksController@destroy')->middleware('admin');

########### Categories #############
Route::get('/adminCategories', 'CategoriesController@index')->middleware('admin');
Route::post('/addCategory', 'CategoriesController@store')->middleware('admin');
Route::post('/editCategory/{id}', 'CategoriesController@update')->middleware('admin');
Route::post('/deleteCategory/{id}', 'CategoriesController@destroy')->middleware('admin');

########### Products #############
Route::get('/products', 'ProductsController@list');
Route::get('/products/{id}', 'ProductsController@show');
Route::post('/productsSearch', 'ProductsController@search');
Route::get('/adminProducts', 'ProductsController@index')->middleware('admin');
Route::post('/addProduct', 'ProductsController@store')->middleware('admin');
Route::get('/editProduct/{id}', 'ProductsController@edit')->middleware('admin');
Route::post('/editProduct/{id}', 'ProductsController@update')->middleware('admin');
Route::post('/deleteProduct/{id}', 'ProductsController@destroy')->middleware('admin');

########### Customers #############
Route::get('/profile', 'CustomersController@show');
Route::post('/profile', 'CustomersController@update');
Route::get('/purchases', 'ReceiptsController@indexForUser');
Route::get('/resetPassword', 'CustomersController@resetPasswordForm');
Route::post('/resetPassword', 'CustomersController@resetPassword');
Route::get('/adminCustomers', 'CustomersController@index')->middleware('admin');
Route::post('/deleteCustomer/{id}', 'CustomersController@destroy')->middleware('admin');

########### Carts #############
Route::post('/products/{id}', 'CartsController@addProduct');   // agregar producto al carrito
Route::get('/cart', 'CartsController@show');   // mostrar carrito del cliente logeado
Route::post('/modifyProductQuantity', 'CartsController@modifyProductQuantity');   // modificar la cantidad del producto en el carrito
Route::post('/removeProduct', 'CartsController@removeProduct');   // quitar producto del carrito
Route::post('/checkout', 'CartsController@checkout');   // quitar producto del carrito

########### Admin #############
Route::get('/adminLogIn', 'AdminsController@logInForm')->middleware('adminLogged');
Route::post('/adminLogIn', 'AdminsController@logIn')->middleware('adminLogged');  
Route::get('/adminLogOut', 'AdminsController@logOut')->middleware('admin');

Route::get('/adminSales', 'ReceiptsController@index');  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
