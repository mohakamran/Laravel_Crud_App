<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StuCon;
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
})->name('homepage');

Route::get('/login',function(){
    return view('login');
})->name('login-app');

// Admin Home Panel 
Route::get('/admin-login', function(){
  return view('admin.index');
})->name('admin-login');

Route::get('/add-student', function(){
  $page_title = "Add Student";
  $url="/add-student";
  $btn_title = "Add Student";
  $data = compact('page_title','url','btn_title');
  return view('admin.add-student')->with($data);
})->name('add-student');

// Student Controller 
Route::post('/add-student', [StuCon::class,'index']);
Route::get('/view-students', [StuCon::class,'viewData'])->name('view-students');
Route::get('/update-student/{id}', [StuCon::class,'updateStudent']);
Route::post('/update-student/{id}', [StuCon::class,'updateStudentInfo']);
Route::get('/delete-student/{id}', [StuCon::class,'deleteStudentInfo']);