<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
// Get and function
Route::group(["namespace"=>"App\Http\Controllers"], function() {
    Route::get('/about-us', 'FrontEndController@about')->name('about');
    Route::get('/contact-us', 'FrontEndController@contacts')->name('contact');
    Route::get('/','FrontEndController@home')->name('home');
});

//Grouping of routes-posts
Route::group(["prefix"=>"posts","as"=>"posts.", "namespace"=>"App\Http\Controllers"],function(){
    Route::get('/','PostController@list')->name('list');
    //insert Query
    Route::get('/posts/add', function() {
        DB::insert("insert into posts (title,content) values(?,?)",['Laravel','Laravel content']);
        return redirect()->route('posts.list')->withSuccess("Posted successfully");
    })->name('create');
});
Route::get('/admin', 'App\Http\Controllers\FrontEndController@admin')->name('user.admin');
Route::post('user.login', 'App\Http\Controllers\Users\UsersController@doLogin')->name('user.login');
Route::get('logout', 'App\Http\Controllers\Users\UsersController@logout')->name('user.logout');
Route::get('/user/create', 'App\Http\Controllers\Users\UsersController@create')->name('user.create');
Route::post('/user/save', 'App\Http\Controllers\Users\UsersController@save')->name('user.save');
Route::group(["middleware"=>"user_auth", "namespace"=>"App\Http\Controllers\Users"], function() {
    Route::get('user/homepage', 'UsersController@homepage')->name('user.homepage');
    Route::get('/user/search/{id_or_name}/{status}', 'UsersController@search')->name('user.search');
    Route::get('/user/list', 'UsersController@list')->name('user.list');
    Route::get('/user/edit/{user_id}', 'UsersController@edit')->name('user.edit');
    Route::post('/user/update/{user_id}', 'UsersController@update')->name('user.update');
});

//Grouping of routes
Route::group(["prefix"=>"sample-products","as"=>"sample.", "namespace"=>"App\Http\Controllers\SampleProducts"],function(){
    //If nothing to return, use Route::view() directly to pass route and template.
    Route::get('/','SampleProductController@index', ['name'=>'Rice as parameter'])->name('index');
    //Use Route::get(), call controller:function.
    Route::get('view','SampleProductController@view')->name('view');  
});


Route::resource('products', ProductController::class);

//Grouping of routes
Route::group(["prefix"=>"products","as"=>"products.", "namespace"=>"App\Http\Controllers"],function(){
    //If nothing to return, use Route::view() directly to pass route and template.
    Route::get('restore/{product_id}','ProductController@restore')->name('restore');
    //Use Route::get(), call controller:function.
    Route::get('delete/{product_id}','ProductController@forceDelete')->name('forceDelete');  
});

//Use Route::get() with arguments.
/*Route::get('/user/{id}', function ($id) {
    return view('users', ['userid'=> $id]);
})->name('user');
Route::get('/about-us', function () {
    return '<h1>About us</h1><div class="relative flex items-top justify-center"> We are a small company</div>';
})->name('about');
Route::view('/',"basic_pages.frontpage")->name('home');
*/