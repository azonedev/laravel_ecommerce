<?php

use App\Http\Controllers\practiceController;
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

// TODO:
 // clear cache and storage session
    Route::get('/clear', function() {
        $run = Artisan::call('config:clear');
        $run = Artisan::call('cache:clear');
        $run = Artisan::call('config:cache');
        return "FINISHED Back HOME";  
    });



// Frontend view home

// Route::get('/masterfront','frontendController@masterfront');
Route::get('/','frontendController@index');

// search 
Route::any('/search','frontendController@search');

// show product by category
Route::get ('/category/{catName}/{catId}','frontendController@category');

// about page
Route::get('/about','frontendController@about');

// shop page
Route::get('/shop','frontendController@shop');

// women page / here shows women category product
Route::get('/women','frontendController@women');

// men page / here shows men category product
Route::get('/men','frontendController@men');

// single-product-page
Route::get('/product-single/{name?}/{id}','frontendController@product_single');



Route::get('/adminhome','adminController@adminhome')->name('/adminhome');
// Route::get(md5('admin'),'adminController@index')->name('/admin');





// login and registraction 
Route::get('/login', 'userController@loginview');
Route::post('/checklogin', 'userController@checklogin')->name('checklogin');
Route::get('/logout','userController@logout')->name('logout');
Route::get('/register','userController@registerview');
Route::post('/saveregister', 'userController@saveregister')->name('saveregister');

// role
Route::get('/addrole', 'adminController@addrole')->name('role.add');
Route::post('/saverole', 'adminController@saverole')->name('role.save');
Route::get('/role', 'adminController@allrole')->name('role');
Route::get('/editrole/{id}', 'adminController@editrole')->name('role.edit');
Route::post('/updaterole/{id}', 'adminController@updaterole')->name('role.update');
Route::get('/deleterole/{id}', 'adminController@deleterole')->name('role.delete');

// category
Route::get('/addcat', 'catController@addcat')->name('cat.add');
Route::post('/catsave', 'catController@catsave')->name('cat.save');
Route::get('/cat', 'catController@allcat')->name('cat');
Route::get('/editcat/{id}', 'catController@editcat')->name('cat.edit');
Route::post('/updatecat/{id}', 'catController@updatecat')->name('cat.update');
Route::get('/deletecat/{id}', 'catController@deletecat')->name('cat.delete');

// product
Route::get('/addproduct','productController@addproduct')->name('product.add');
Route::post('/saveproduct','productController@saveproduct')->name('product.save');
Route::get('/allproduct','productController@allproduct')->name('product');
Route::get('/editproduct/{id}', 'productController@editproduct')->name('product.edit');
Route::post('/updateproduct/{id}', 'productController@updateproduct')->name('product.update');
Route::get('/deleteproduct/{id}', 'productController@deleteproduct')->name('product.delete');

// slider
Route::get('/addslider','sliderController@addslider')->name('slider.add');
Route::post('/saveslider','sliderController@saveslider')->name('slider.save');
Route::get('/allslider','sliderController@allslider')->name('slider');
Route::get('/editslider/{id}','sliderController@editslider')->name('slider.edit');
Route::post('/updateslider/{id}','sliderController@updateslider')->name('slider.update');
Route::get('/deleteslider/{id}','sliderController@deleteslider')->name('slider.delete');

// feature slider
Route::get('/addfslider','fsliderController@addfslider')->name('fslider.add');
Route::post('/savefslider','fsliderController@savefslider')->name('fslider.save');
Route::get('/allfslider','fsliderController@allfslider')->name('fslider');
Route::get('/editfslider/{id}','fsliderController@editfslider')->name('fslider.edit');
Route::post('/updatefslider/{id}','fsliderController@updatefslider')->name('fslider.update');
Route::get('/deletefslider/{id}','fsliderController@deletefslider')->name('fslider.delete');

// cart

 
Route::get('cart', 'productController@cart');
Route::get('add-to-cart/{id}', 'productController@addToCart');
Route::get('remove-cart/{id}', 'productController@remove');
Route::get('view-cart/', 'productController@viewCart');

// cupon code
Route::get('/addcupon', 'cuponController@addcupon')->name('cupon.add');
Route::post('/catcupon', 'cuponController@savecupon')->name('cupon.save');
Route::get('/cupon', 'cuponController@allcupon')->name('cupon');
Route::get('/editcupon/{id}', 'cuponController@editcupon')->name('cupon.edit');
Route::post('/updatecupon/{id}', 'cuponController@updatecupon')->name('cupon.update');
Route::get('/deletecupon/{id}', 'cuponController@deletecupon')->name('cupon.delete');


// checkout
route::get('checkout','checkoutController@checkout'); //checkout blade
route::get('update-voucer','checkoutController@update'); 
route::post('savecheckout','checkoutController@savecheckout'); //save checkout data

// Order
route::get('order','orderController@order');
route::get('allorder','orderController@allorder');