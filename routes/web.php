<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontendController;


Route::get('/', 'frontend\FrontendController@home')->name('frontend');
Route::get('/about-us', 'frontend\FrontendController@getaboutus')->name('aboutus');
Route::get('/testionial', 'frontend\FrontendController@gettestimonial')->name('testimonial');
Route::resource('check_orders','HomeController')->except('index');
Route::post('/check_orders', 'frontend\FrontendController@order_store')->name('check_orders.store');
Route::get('/login', function () {
    return view('auth.login');
}); 

Route::get('/user', function () {
    return view('auth.user');
});
Route::get('/clear',function(){
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
});

Auth::routes();

Route::group([
    'middleware'    => ['auth'],
    'prefix'        => 'client',
    'namespace'     => 'Client'
], function ()
{
    Route::get('/dashboard', 'ClientController@index')->name('client.dashboard');
	Route::get('/profile', 'ClientController@edit')->name('client-profile');
	Route::post('/admin-update', 'ClientController@update')->name('client-update');


});

Route::group([
    'middleware'    => ['auth','is_admin'],
    'prefix'        => 'admin',
    'namespace'     => 'Admin'
], function ()
{
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/profile', 'AdminController@edit')->name('admin-profile');
    Route::post('/admin-update', 'AdminController@update')->name('admin-update');
    //Setting Routes
    Route::resource('setting','SettingController');

	//User Routes
	Route::resource('clients','ClientController');
	Route::post('get-clients', 'ClientController@getClients')->name('admin.getClients');
	Route::post('get-client', 'ClientController@clientDetail')->name('admin.getClient');
	Route::get('client/delete/{id}', 'ClientController@destroy');
	Route::post('delete-selected-clients', 'ClientController@deleteSelectedClients')->name('admin.delete-selected-clients');

   

    //Gallery routes
    Route::resource('banners','BannerController');
	Route::post('get-banners', 'BannerController@getClients')->name('admin.getBanners');
	Route::post('get-banner', 'BannerController@bannerDetail')->name('admin.getBanner');
	Route::get('banner/delete/{id}', 'BannerController@destroy');
	Route::post('delete-selected-banners', 'BannerController@deleteSelectedBanner')->name('admin.delete-selected-banners');

    //Services routes
    Route::resource('services','ServicesController');
	Route::post('get-services', 'ServicesController@getServices')->name('admin.getServices');
	Route::post('get-service', 'ServicesController@serviecDetail')->name('admin.getService');
	Route::get('service/delete/{id}', 'ServicesController@destroy');
	Route::post('delete-selected-services', 'ServicesController@deleteSelectedService')->name('admin.delete-selected-services');

    //Extra Services routes
    Route::resource('extraservices','ExtraServicesController');
	Route::post('get-extraservices', 'ExtraServicesController@getServices')->name('admin.getExtraServices');
	Route::post('get-extraservice', 'ExtraServicesController@serviecDetail')->name('admin.getExtraService');
	Route::get('extraservice/delete/{id}', 'ExtraServicesController@destroy');
	Route::post('delete-selected-extraservices', 'ExtraServicesController@deleteSelectedExtraService')->name('admin.delete-selected-extraservices');

     //Galleries routes
     Route::resource('galleries','GalleryController');
     Route::post('get-galleries', 'GalleryController@getGalleries')->name('admin.getgalleries');
     Route::post('get-gallery', 'GalleryController@galleryDetail')->name('admin.getgallery');
     Route::get('gallery/delete/{id}', 'GalleryController@destroy');
     Route::post('delete-selected-galleries', 'GalleryController@deleteSelectedgalleries')->name('admin.delete-selected-galleries');

     //Testimonial routes
     Route::resource('testimonials','TestimonialController');
     Route::post('get-testimonials', 'TestimonialController@getTestimonials')->name('admin.gettestimonials');
     Route::post('get-testimonial', 'TestimonialController@testimonialDetail')->name('admin.gettestimonial');
     Route::get('testimonial/delete/{id}', 'TestimonialController@destroy');
     Route::post('delete-selected-testimonials', 'TestimonialController@deleteSelectedtestimonial')->name('admin.delete-selected-testimonials');
     
     //Order
     Route::resource('orders','OrderController');
     Route::post('get-orders', 'OrderController@getOrders')->name('admin.getorders');
     Route::post('get-order', 'OrderController@orderDetail')->name('admin.getorder');
     Route::get('order/delete/{id}', 'OrderController@destroy');
     Route::post('delete-selected-orders', 'OrderController@deleteSelectedorder')->name('admin.delete-selected-orders');

     //Service Order
     Route::resource('service_orders','OrderServiceController');
     Route::post('get-service-orders', 'OrderServiceController@getServiceOrders')->name('admin.getserviceorders');
     Route::post('get-service-order', 'OrderServiceController@serviceorderDetail')->name('admin.getserviceorder');
     Route::get('service-order/delete/{id}', 'OrderServiceController@destroy');
     Route::post('delete-selected-service-orders', 'OrderServiceController@deleteSelectedorder')->name('admin.delete-selected-service-orders');

      //Extra Service Order
      Route::resource('extra_service_orders','OrderExtraServiceController');
      Route::post('get-extra-service-orders', 'OrderExtraServiceController@getExtraOrders')->name('admin.getextraorders');
      Route::post('get-extra-ervice-order', 'OrderExtraServiceController@extraorderDetail')->name('admin.getextraorder');
      Route::get('extra-service-order/delete/{id}', 'OrderExtraServiceController@destroy');
      Route::post('delete-selected-extra-service-orders', 'OrderExtraServiceController@deleteSelectedorder')->name('admin.delete-selected-extra-service-orders');
     


});