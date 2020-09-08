<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@index');

Auth::routes();

// Search

Route::post('/search','SearchController@search');

// Onboarding
Route::get('/get-started', 'OnboardingController@OBChoosePath');

// Onboarding cooks
Route::get('/{token}/basic-details', 'OnboardingController@BasicDetails');
Route::post('/ob/store-basic-details', 'OnboardingController@storeBasicDetails');

Route::get('/ob/display-name', 'OnboardingController@DisplayName');
Route::post('/ob/store-display-name', 'OnboardingController@storeDisplayName');

Route::get('/ob/address', 'OnboardingController@Address');
Route::post('/ob/store-address', 'OnboardingController@storeAddress');

Route::post('/ob/store-confirmed-address', 'OnboardingController@storeConfirmedAddress');

Route::get('/ob/mobile', 'OnboardingController@Mobile');
Route::post('/ob/store-mobile', 'OnboardingController@storeMobile');

Route::get('/ob/pin', 'OnboardingController@Pin');
Route::post('/ob/store-pin', 'OnboardingController@storePin');

Route::get('/ob/summary', 'OnboardingController@Summary');
Route::post('/ob/store-summary', 'OnboardingController@storeSummary');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Onboarding customers
Route::get('/ob/customer-basic-details', 'CustomerOnboardingController@customerBasicDetails');
Route::post('/ob/store-customer-basic-details', 'CustomerOnboardingController@storeCustomerBasicDetails');

// DASHBOARD
Route::get('/dashboard','DashboardController@index');

//CREATE MEAL
Route::get('/meals/add-meal-name','MealController@meal_name');
Route::post('/meals/store-basic-details','MealController@store_meal_name');

Route::get('/meals/add-meal-dietary','MealController@meal_dietary');
Route::post('/meals/store-dietary','MealController@store_meal_dietary');

Route::get('/meals/add-meal-category','MealController@meal_category');
Route::post('/meals/store-category','MealController@store_meal_category');

Route::get('/meals/add-meal-pic','MealController@meal_pic');
Route::post('/meals/store-pic','MealController@store_meal_pic');

Route::get('/meals/add-meal-cost','MealController@meal_cost');
Route::post('/meals/store-cost','MealController@store_meal_cost');

Route::get('/meals/complete','MealController@meal_complete');