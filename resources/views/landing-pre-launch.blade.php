@extends('layouts.app')

@section('content')
    <section class="homepage-hero min-vh-100">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-10 offset-1 col-md-6 offset-md-3">
                    <img src="{{asset('img/gf2.png')}}" class="img-fluid">
                </div>
                <div class="col-12 col-md-8 offset-md-2">
                    <h3 class="hero-text mt-4">Like the idea of selling beautiful home cooked meals to friendly
                        locals?</h3>
                    <div class="text-center mt-4">
                        @livewire('pre-register-form')
                    </div>
                    <p class="hero-text-sub mt-4"></p>
                </div>

            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container py-3">
            <div class="row">

                <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-center text-md-left">
                    <h1 class="fw900">What is GetFed?</h1>
                    <h4 class="mt-4 fw400">Launched in 2017, GetFed is the online marketplace for home cooked food.</h4>
                    <h4 class="mt-3">Simply put, GetFed allows talented and passionate home cooks to sell meals to
                        people in their local area.</h4>
                </div>
                <div class="col-12 col-md-6 text-center mt-5 mt-md-0">
                    <img src="{{asset('img/getfed_iphone_mockup_1.jpg')}}" class="img-fluid max-height-x">
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light-grey">
        <div class="container py-0 py-md-5">
            <div class="row">
                <div class="col-12 col-md-6 order-1 order-md-0 mt-5 mt-md-0">
                    <style>.embed-container {
                            position: relative;
                            padding-bottom: 56.25%;
                            height: 0;
                            overflow: hidden;
                            max-width: 100%;
                        }

                        .embed-container iframe, .embed-container object, .embed-container embed {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                        }</style>
                    <div class='embed-container'>
                        <iframe src='https://player.vimeo.com/video/333599724' frameborder='0' webkitAllowFullScreen
                                mozallowfullscreen allowFullScreen></iframe>
                    </div>
                    <h5 class="mt-4 text-center">Gary MacLean - Winner of TV's "Masterchef: The Professionals" talks
                        GetFed</h5>
                </div>
                <div class="col-12 col-md-6 text-center text-md-right d-flex flex-column justify-content-center">
                    <div class="d-none d-md-block">
                        <h1 class="fw900">Why sell on GetFed?</h1>
                        <h4 class="mt-4 fw400">Earn cash for every meal you sell</h4>
                        <h4 class="mt-2 fw400">Help reduce food waste</h4>
                        <h4 class="mt-2 fw400">Build your reputation as a cook</h4>
                        <h4 class="mt-2 fw400">Connect with your local community</h4>
                        <h4 class="mt-2 fw400">Grow your own food business</h4>
                        <h4 class="mt-2 fw400">All from your own home</h4>
                    </div>
                    <div class="d-block d-md-none">
                        <h2 class="fw900">Why sell on GetFed?</h2>
                        <h5 class="mt-4 fw400">Earn cash for every meal you sell</h5>
                        <h5 class="mt-2 fw400">Help reduce food waste</h5>
                        <h5 class="mt-2 fw400">Build your reputation as a cook</h5>
                        <h5 class="mt-2 fw400">Connect with your local community</h5>
                        <h5 class="mt-2 fw400">Grow your own food business</h5>
                        <h5 class="mt-2 fw400">All from your own home</h5>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="footer-hero py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 text-dark">
                    @livewire('pre-register-form')
                </div>
            </div>
        </div>
    </section>
@endsection

