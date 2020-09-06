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

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

// Search

Route::post('/search','SearchController@search');

// Onboarding
Route::get('/get-started', 'OnboardingController@OBChoosePath');

Route::get('/ob/cook-basic-details', 'OnboardingController@cookBasicDetails');
Route::post('/ob/store-cook-basic-details', 'OnboardingController@storeCookBasicDetails');

Route::get('/ob/cook-display-name', 'OnboardingController@cookDisplayName');
Route::post('/ob/store-cook-display-name', 'OnboardingController@storeCookDisplayName');

Route::get('/ob/cook-address', 'OnboardingController@cookAddress');
Route::post('/ob/store-cook-address', 'OnboardingController@storeCookAddress');

Route::post('/ob/store-confirmed-cook-address', 'OnboardingController@storeConfirmedCookAddress');

Route::get('/ob/cook-mobile', 'OnboardingController@cookMobile');
Route::post('/ob/store-cook-mobile', 'OnboardingController@storeCookMobile');

Route::get('/ob/cook-pin', 'OnboardingController@cookPin');
Route::post('/ob/store-cook-pin', 'OnboardingController@storeCookPin');

Route::get('/ob/cook-summary', 'OnboardingController@cookSummary');
Route::post('/ob/store-cook-summary', 'OnboardingController@storeCookSummary');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//DASHBOARD
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