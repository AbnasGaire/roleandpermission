<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Rolecontroller;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Usercontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register',[Authcontroller::class,'register']);

Route::post('/login',[Authcontroller::class,'login']);




Route::get('/userlist',[Usercontroller::class,'listuser']);

Route::get('useredit/{id}',[Usercontroller::class,'edituser']);

Route::put('userupdate/{id}',[Usercontroller::class,'updateuser']);

Route::get('userdelete/{id}',[Usercontroller::class,'deleteuser']);



Route::post('/product',[Productcontroller::class,'addproduct']);

Route::get('/productlist',[Productcontroller::class,'listproduct'])->middleware('auth:api');

Route::get('productedit/{id}',[Productcontroller::class,'editproduct']);

Route::put('productupdate/{id}',[Productcontroller::class,'updateproduct']);

Route::get('productdelete/{id}',[Productcontroller::class,'deleteproduct']);




Route::get('/role',[Rolecontroller::class,'viewrole']);

Route::post('/role',[Rolecontroller::class,'addrole']);

Route::get('/rolelist',[Rolecontroller::class,'listrole']);

Route::get('roleedit/{id}',[Rolecontroller::class,'editrole']);

Route::put('roleupdate/{id}',[Rolecontroller::class,'updaterole']);

Route::get('roledelete/{id}',[Rolecontroller::class,'deleterole']);
