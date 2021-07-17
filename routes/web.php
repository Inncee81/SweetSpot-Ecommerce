<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/', 'HomeController@index');
Route::get('/privacy-policy', 'HomeController@Privacy');
Route::get('/home','HomeController@home')->middleware('verified');
Route::get('lang/{locale}', 'HomeController@lang_change') ;
Route::get('products/{id}/{subcategory?}', 'HomeController@Products') ;
Route::get('product-detail/{id}', 'HomeController@ProductDetail') ;
Route::get('cart', 'HomeController@Cart') ;
Route::get('update-cart', 'HomeController@UpdateCart') ;
Route::get('deleteCart', 'HomeController@deleteCart') ;
Route::get('increase-qty', 'HomeController@IncreaseQty') ;
Route::get('search', 'HomeController@search') ;
Route::get('contact-us', 'HomeController@ContactUs') ;
Route::get('about-us', 'HomeController@AboutUs') ;
Route::post('insert-contact-us', 'HomeController@insertContactUs');
Route::get('/insert-rating', 'HomeController@InsertRating');
  

Route::group( ['middleware'=>['auth','admincheck'],'prefix'=>'admin'], function(){   
 
   Route::get('/', 'AdminController@index');
   Route::get('/deleteUser', 'AdminController@DeleteUser');
   Route::get('/deleteCategory', 'AdminController@DeleteCategory');
   Route::get('/categories', 'AdminController@Categories');
   Route::post('/add-category', 'AdminController@AddCategory');
   Route::post('/update-category', 'AdminController@UpdateCategory');
   Route::get('/users', 'AdminController@Users');
   Route::get('/statistics', 'AdminController@Statistics');
   Route::get('/deleteSubCategory', 'AdminController@DeleteSubCategory');
   Route::get('/subcategory', 'AdminController@Subcategory');
   Route::post('/add-subcategory', 'AdminController@AddSubCategory');
   Route::post('/update-subcategory', 'AdminController@UpdateSubCategory');
   Route::get('/get-subcategory', 'AdminController@GetSubcategory');
   Route::get('/edit-category', 'AdminController@EditCategory');
   Route::get('product', 'AdminController@Product');
   Route::post('/add-product', 'AdminController@InsertProduct');
   Route::get('deleteProduct', 'AdminController@deleteProduct');
   Route::get('/edit-product', 'AdminController@EditProduct');
   Route::post('/update-product', 'AdminController@UpdateProduct');
   Route::get('/slides', 'AdminController@Slides');
   Route::post('/add-Slide', 'AdminController@AddSlides');    
   Route::get('/deleteSlide', 'AdminController@deleteSlide');        
   Route::get('/orders', 'AdminController@Orders');   
   Route::post('/update-status', 'AdminController@UpdateStatus');    
   Route::get('/deleteOrder', 'AdminController@deleteOrder');  
   Route::get('/show-order-product', 'AdminController@ShowOrderProduct');  
   Route::get('/footer-settings', 'AdminController@FooterSettings');            
   Route::post('/update-footer-settings', 'AdminController@UpdateFooterSettings');
});
 
Route::group( ['middleware'=>['auth','usercheck'],'prefix'=>''], function(){   

   Route::get('user/', 'UserController@index');
   Route::get('checkout', 'HomeController@Chekout') ;
   Route::get('completeOrder', 'HomeController@completeOrder') ;
   Route::get('my-account', 'HomeController@MyAccount') ;
   Route::get('/show-order-product', 'HomeController@ShowOrderProduct');  
   Route::get('/change-password', 'HomeController@ChangePassword');
   Route::post('/changePassword', 'HomeController@InsertChangePassword');
        
});
 

Auth::routes(['verify' => true]);
 