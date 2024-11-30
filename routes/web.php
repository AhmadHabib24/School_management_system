<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\TeacherProfileController;
use App\Http\Controllers\KakaoController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TrailController;

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

Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/login',function(){
    return redirect('/');
});
Route::get('/log-in',[AuthController::class,'loadLogin'])->name('loadLogin');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/check-email/{token}', [PasswordResetController::class, 'success_message'])->name('check.mail');
Route::get('/forgot-password', [PasswordResetController::class, 'showForgetPasswordForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

Route::get('/request-pending',[AuthController::class, 'pendingview']);

// ********** Super Admin Routes *********
Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
    Route::get('/dashboard',[SuperAdminController::class,'dashboard']);

    Route::get('/users',[SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',[SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',[SuperAdminController::class,'updateRole'])->name('updateRole');
    Route::get('/manage-permission',[SuperAdminController::class,'managePermission'])->name('managePermission');
    Route::post('/update-permission',[SuperAdminController::class,'updatePermission'])->name('updatepermission');
});

// ********** Sub Admin Routes *********
Route::group(['prefix' => 'sub-admin','middleware'=>['web','isSubAdmin']],function(){
    Route::get('/dashboard',[SubAdminController::class,'dashboard']);
});

// ********** Admin Routes *********
Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('teacher-dashboard');
    Route::get('/teacher-profile',[AdminController::class,'teacher_profile'])->name('teacher-profile');
    Route::post('/teacher-profile', [TeacherProfileController::class, 'store'])->name('teacher.profile.store');
    Route::get('/teacher-Schedule', [ScheduleController::class, 'index'])->name('teacher.Schedule.index');
    Route::post('/store-event', [ScheduleController::class, 'store_event'])->name('store-event');
    
});

// ********** User Routes *********
Route::group(['middleware'=>['web','isUser']],function(){
    Route::get('/dashboard',[UserController::class,'dashboard']);
});


Route::get('/google/login', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('/login/kakao', [KakaoController::class, 'redirectToKakao'])->name('kakao.login');
Route::get('/login/kakao/callback', [KakaoController::class, 'handleKakaoCallback']);

// Trail form routs

Route::get('free-trail-form', [TrailController::class, 'index'])->name('trail-form');
Route::get('trail-dashboard', [TrailController::class, 'dashboard'])->name('trail-dashboard');
Route::post('free-trial', [TrailController::class, 'store'])->name('free_trial.store');





