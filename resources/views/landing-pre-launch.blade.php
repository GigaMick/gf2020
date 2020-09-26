@extends('layouts.app')

@section('content')
    <section class="homepage-hero py-5">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-10 offset-1 col-md-6 offset-md-3">
                    <img src="{{asset('img/gf2.png')}}" class="img-fluid">
                </div>
                <div class="col-12 col-md-8 offset-md-2">
                    <h2 class="hero-text mt-4">Like the idea of selling beautiful home cooked food to friendly
                        locals?</h2>
                    <h4 class="hero-text-sub mt-4">Hit the button below to pre register with GetFed</h4>
                    <div class="text-center mt-4">
                        <a class="typeform-share button shadow" href="https://form.typeform.com/to/UJvG15rg"
                           data-mode="drawer_right"
                           style="display:inline-block;text-decoration:none;background-color:#ed1c16;color:white;cursor:pointer;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:50px;text-align:center;margin:0;height:50px;padding:0px 100px;border-radius:0px;max-width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:bold;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;"
                           target="_blank">Pre Register as a Cook</a>
                        <script> (function () {
                                var qs, js, q, s, d = document, gi = d.getElementById, ce = d.createElement,
                                    gt = d.getElementsByTagName, id = "typef_orm_share",
                                    b = "https://embed.typeform.com/";
                                if (!gi.call(d, id)) {
                                    js = ce.call(d, "script");
                                    js.id = id;
                                    js.src = b + "embed.js";
                                    q = gt.call(d, "script")[0];
                                    q.parentNode.insertBefore(js, q)
                                }
                            })() </script>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-6">

                </div>
                <div class="col-12 col-md-6">
                    <div class="">
                        <h1 class="fw900">What is GetFed?</h1>
                    </div>
                    <h4 class="mt-4 fw400">Launched in 2017, GetFed is the online marketplace for home cooked food.</h4>
                    <h4 class="mt-3">Simply put, GetFed allows talented and passionate home cooks to sell meals to
                        people in their neighbourhood.</h4>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light-grey">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="">
                        <h1 class="fw900">Why sell on GetFed?</h1>
                    </div>
                    <h4 class="mt-4 fw400">Earn extra cash</h4>
                    <h4 class="mt-2 fw400">Help reduce food waste</h4>
                </div>
                <div class="col-12 col-md-6">

                </div>
            </div>
        </div>
    </section>
@endsection

