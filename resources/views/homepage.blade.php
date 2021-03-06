@extends('layouts.app')

@section('content')
    <section class="homepage-hero min-vh-95">
        <div class="nav py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="logo">
                                <img src="{{secure_asset('img/header-logo-green.png')}}" class="nav-logo">
                            </div>
                            <div class="links">
                                @auth
                                    @hasrole('cook')
                                    <a href="/dashboard" class="px-2">Dashboard</a>
                                    <a href="/meals/add-meal-name" class="px-2">Add Meal</a>
                                    <a href="/logout" class="px-2">Schedule</a>
                                    <a href="/logout" class="px-2">Go Online</a>
                                    @endhasrole
                                    <a href="/logout" class="btn-hero px-5">Logout</a>
                                @else
                                    <a href="/get-started" class="btn-hero px-5">Sign Up</a>
                                @endauth                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5 px-4  px-md-0">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="hero-copy">
                        <h2 class="text-white fw900 ts">The Marketplace For<br class="d-none b-md-block"> Home Cooked Food</h2>
                        <h5 class="text-white fw400 ts">Get beautiful home cooked meals<br class="d-none b-md-block"> from talented cooks near you</h5>
                        <h5 class="text-white ts fw700 mt-5 mb-2">Enter your postcode to find meals nearby</h5>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 offset-md-3">
                            <div class="hero-form">
                                <form class="" method="post" action="/search">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="postcode" class="text-center" placeholder="Your full postcode"
                                               value="{{$postcode}}" id="">
                                        <input type="submit" name="" class="btn-hero" placeholder="" value="Search"
                                               id="">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-6 mb-5 mb-md-0">
                    <h1 class="section-head">Like to cook?</h1>
                    <h4 class="fw400 mb-4">
                        Earn extra cash by selling your delicious meals straight from your home.
                    </h4>
                    <a href="/like-to-cook" class="btn-hero mt-4 px-5">Learn about cooking with GetFed</a>
                </div>
                <div class="col-12 col-md-6">
                    <h1 class="section-head">Like to eat?</h1>
                    <h4 class="fw400 mb-4">
                        Tired of the standard fast food options? Get hearty, healthy and delicious
                        home made meals by local cooks who are passionate about what they do.
                    </h4>
                    <a href="/like-to-cook" class="btn-hero mt-4 px-5">Learn about eating with GetFed</a>
                </div>
            </div>
        </div>
    </section>
@endsection
