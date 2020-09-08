@extends('../layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="card p-4 shadow text-center">
                    <div class="card-body">
                        <h1 class="section-head mb-3 mt-0">Thanks! You're all signed up 😊</h1>
                        @if(\Illuminate\Support\Facades\Auth::user()->is_cook)
                            <h3 class="text-md-left mt-2">What happens next?</h3>
                            <h5 class="text-md-left mt-2">We send a welcome pack to your home containing GetFed branded
                                packaging and labels.</h5>
                            <h5 class="text-md-left mt-1">Before we can do that, we need to verify your home
                                address.</h5>
                            <h3 class="text-md-left mt-4">You have 2 options</h3>
                            <h4 class="text-md-left mt-3 fw700">1. Verify by bank details (quickest)</h4>
                            <h5 class="text-md-left mt-2">We'll charge your bank card £1. This will be refunded to you
                                when
                                you sell your first meal on the platform. Sound good?</h5>
                            <div class="text-md-left">
                                <a href="/verify-address-by-bank" class="btn btn-hero px-5 d-inline-block">Verify by
                                    bank
                                    details</a>
                            </div>
                            <h4 class="text-md-left mt-4 fw700">2. Verify by post (slower)</h4>
                            <h5 class="text-md-left mt-2">We'll send you a letter containing a PIN code. When you
                                receive
                                the letter, enter the code and you're good to go. Is this the option for you?</h5>
                            <div class="text-md-left">
                                <a href="/verify-address-by-post" class="btn btn-hero px-5 d-inline-block">Verify by
                                    post</a>
                            </div>
                    </div>
                    <a href="/dashboard">Go to Dashboard</a>
                    @else
                </div>
                @endif

            </div>
        </div>
    </div>
    </div>
@endsection

