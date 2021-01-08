<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Rolecontroller;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/create',function(){
//     return view('create');
// })->middleware('role:editor');
// Route::group(['middleware' => ['role:editor']], function () {
//     // Route::get('/test', function(){
//     //     echo "HERE";
//     //     die();
//     // });


//     Route::get('/create',function(){
//         return view('create');
//     });
// });


Route::group(['middleware' => ['permission:product_create']], function () {
    Route::get('/product',[Productcontroller::class,'viewproduct']);

    Route::post('/product',[Productcontroller::class,'addproduct']);
});



Route::get('/productlist',[Productcontroller::class,'listproduct'])->middleware('permission:product_view');

Route::get('productedit/{id}',[Productcontroller::class,'editproduct'])->middleware('permission:product_edit');

Route::put('productupdate/{id}',[Productcontroller::class,'updateproduct'])->middleware('permission:product_edit');

Route::get('productdelete/{id}',[Productcontroller::class,'deleteproduct'])->middleware('permission:product_delete');



Route::get('/user',[Usercontroller::class,'viewuser']);

Route::post('/user',[Usercontroller::class,'adduser']);

Route::get('/userlist',[Usercontroller::class,'listuser']);

Route::get('useredit/{id}',[Usercontroller::class,'edituser']);

Route::put('userupdate/{id}',[Usercontroller::class,'updateuser']);

Route::get('userdelete/{id}',[Usercontroller::class,'deleteuser']);




Route::get('/role',[Rolecontroller::class,'viewrole']);

Route::post('/role',[Rolecontroller::class,'addrole']);

Route::get('/rolelist',[Rolecontroller::class,'listrole']);

Route::get('roleedit/{id}',[Rolecontroller::class,'editrole']);

Route::put('roleupdate/{id}',[Rolecontroller::class,'updaterole']);

Route::get('roledelete/{id}',[Rolecontroller::class,'deleterole']);



Route::get('/logout',[Usercontroller::class,'logout']);