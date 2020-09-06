<?php

namespace App\Http\Controllers;

use App\Category;
use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MealController extends Controller
{
    public function meal_name()
    {
        return view('meals.add_meal_name');
    }

    public function store_meal_name(Request $request)
    {
        if (session('mealToken')) {
            session()->forget('mealToken');
        }

        $meal = new Meal();
        $meal->name = $request->name;
        $meal->description = $request->description ?? "";
        $meal->token = Str::uuid();
        $meal->user_id = Auth::user()->id;
        $meal->status = 99; //not for sale
        $meal->save();

        session(['mealToken' => $meal->token]);

        return redirect('/meals/add-meal-dietary');
    }

    public function meal_dietary()
    {
        $token = session('mealToken');
        $meal = Meal::query()->where('token', $token)->first();

        return view('/meals/add_meal_dietary');

    }

    public function store_meal_dietary(Request $request)
    {
        $token = session('mealToken');
        $meal = Meal::query()->where('token', $token)->first();
        $meal->vegan = $request->vegan ?? "0";
        $meal->vegetarian = $request->vegetarian ?? "0";
        $meal->kosher = $request->kosher ?? "0";
        $meal->save();

        return redirect('/meals/add-meal-category');

    }

    public function meal_category()
    {

        $cats = Category::query()->where('status', '=', 1)->get();
        return view('/meals/add_meal_category', compact('cats'));

    }

    public function store_meal_category(Request $request)
    {

        $token = session('mealToken');
        $meal = Meal::query()->where('token', $token)->first();
        $meal->category = $request->category;
        $meal->type = $request->type;
        $meal->save();

        return redirect('/meals/add-meal-pic');

    }

    public function meal_pic()
    {

        return view('/meals/add_meal_pic');

    }

    public function store_meal_pic(Request $request)
    {

        $token = session('mealToken');
        $meal = Meal::query()->where('token', $token)->first();


        return redirect('/meals/add-meal-pic');

    }

    public function meal_cost()
    {

        return view('/meals/add_meal_cost');

    }

    public function store_meal_cost(Request $request)
    {

        $token = session('mealToken');
        $meal = Meal::query()->where('token', $token)->first();
        $price = preg_replace('/[^0-9]/', '', $request->price);

        $meal->price = $price;
        $meal->stock = $request->stock;
        $meal->save();

        return redirect('/meals/complete');

    }

    public function meal_complete()
    {
        $token = session('mealToken');
        $meal = Meal::query()->where('token', $token)->first();

        return view('/meals/add_meal_complete', compact('meal'));

    }
}
