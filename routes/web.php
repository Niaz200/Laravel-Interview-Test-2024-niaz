<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DashboardController;




Route::get('/', function () {
    return view('home');
})->name('home');



// Page Routes

Route::get('/userLogin',[UserController::class,'LoginPage'])->name('login');
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/dashboard',[DashboardController::class,'DashboardPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage']);
Route::get('/userProfile',[UserController::class,'profilePage']);
// Route::view('/resetPassword','pages.auth.reset-pass-page');

Route::get('/countryPage',[CountryController::class,'CountryPage']);
Route::get('/statePage',[StateController::class,'StatePage']);
Route::get('/cityPage',[CityController::class,'CityPage']);








