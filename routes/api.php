<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DashboardController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
   
// })->middleware('auth:sanctum');


// Web API Routes
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware('auth:sanctum');
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware('auth:sanctum');
Route::get('/logout',[UserController::class,'UserLogout'])->middleware('auth:sanctum');
Route::get('/dashboard-details',[DashboardController::class,'DashboardDetails'])->middleware('auth:sanctum');

//password reset
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware('auth:sanctum');



// Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->middleware('auth:sanctum');


// Country API
Route::get("/list-country",[CountryController::class,'CountryList'])->middleware('auth:sanctum');
Route::post("/create-country",[CountryController::class,'CountryCreate'])->middleware('auth:sanctum');
Route::post("/update-country",[CountryController::class,'CountryUpdate'])->middleware('auth:sanctum');
Route::post("/delete-country",[CountryController::class,'CountryDelete'])->middleware('auth:sanctum');
Route::post("/country-by-id",[CountryController::class,'CountryByID'])->middleware('auth:sanctum');


// State API
Route::get("/list-state",[StateController::class,'StateList'])->middleware('auth:sanctum');
Route::post("/create-state",[StateController::class,'StateCreate'])->middleware('auth:sanctum');
Route::post("/state-by-id",[StateController::class,'StateByID'])->middleware('auth:sanctum');
Route::post("/update-state",[StateController::class,'UpdateState'])->middleware('auth:sanctum');
Route::post("/delete-state",[StateController::class,'StateDelete'])->middleware('auth:sanctum');
// Route::post("/update-country",[CountryController::class,'CountryUpdate'])->middleware('auth:sanctum');
// Route::post("/delete-country",[CountryController::class,'CountryDelete'])->middleware('auth:sanctum');
// Route::post("/country-by-id",[CountryController::class,'CountryByID'])->middleware('auth:sanctum');


// City API
Route::get("/list-city",[CityController::class,'CityList'])->middleware('auth:sanctum');
Route::post("/create-city",[CityController::class,'CityCreate'])->middleware('auth:sanctum');
Route::post("/city-by-id",[CityController::class,'CityByID'])->middleware('auth:sanctum');
Route::post("/update-city",[CityController::class,'UpdateCity'])->middleware('auth:sanctum');
Route::post("/delete-city",[CityController::class,'CityDelete'])->middleware('auth:sanctum');




//pages


