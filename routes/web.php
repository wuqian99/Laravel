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
    return view('home');
});
Route::get('/test',function(){
    echo  'hello world';
});
Route::post('basic2',function(){
    return 'hello post';
});

//多请求路由
Route::match(['get', 'post'],'multy1',function(){
    return 'multy1';
});

//路由参数
// Route::get('user/{id}', function($id){
//     return 'user-id-' . $id;
// });
//可选参数
Route::get('user/{name?}', function($name = null){
    return 'user-name-' . $name;
})->where('name','[A-Za-z]+');
Route::get( 'user/{id}/{name?}', function($id, $name = null){
    return 'user-id-' . $id . '-name-' . $name;
})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

//命名路由
Route::get('user/profile', function(){
    return route('profile');
})->name('profile');

//指向控制器的路由
Route::get('index/{id}', 'IndexController@index');

Route::group(['namespace'=>'Admin','prefix'=>'admin'],function (){
    Route::get('test','TestController@test');
});



