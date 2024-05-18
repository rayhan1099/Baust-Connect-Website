<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Shared\AddressController;
use App\Http\Controllers\Shared\ContactChannelController;
use App\Http\Controllers\Shared\DepartmentController;
use App\Http\Controllers\Shared\HomepageController;
use App\Http\Controllers\Student\ChatController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;

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


Route::get('/csrf',function (){
    return \Illuminate\Support\Facades\Response::json(['csrf'=>csrf_token()]);
});
Route::resource('address', AddressController::class);
Route::get('department/student-list/{department}', 'App\Http\Controllers\Shared\DepartmentController@showStudentList');
Route::resource('department', DepartmentController::class);
Route::post('student/login', 'App\Http\Controllers\Student\StudentController@login');
Route::post('student/logout', 'App\Http\Controllers\Student\StudentController@logout');
Route::resource('student', StudentController::class);
Route::post('admin/login', 'App\Http\Controllers\Admin\AdminController@login');
Route::post('admin/logout', 'App\Http\Controllers\Admin\AdminController@logout');
Route::post('admin/summary', 'App\Http\Controllers\Admin\AdminController@admin_summary');
Route::resource('admin', AdminController::class);
Route::resource('contact', ContactChannelController::class);
Route::post('chat/get', 'App\Http\Controllers\Student\ChatController@receive');
Route::resource('chat', ChatController::class);
Route::post('homepage/search', 'App\Http\Controllers\Shared\Homepage@search');
Route::resource('homepage', HomepageController::class);


