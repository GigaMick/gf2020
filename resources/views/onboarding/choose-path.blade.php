@extends('../layouts.app')

@section('content')
    <section class="min-vh-100">
        <div class="container-fluid">
            <div class="row min-vh-80">
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center flex-column">
                    <h1 class="section-head">I want to cook & sell</h1>
                    <a href="/ob/cook-basic-details" class="btn-hero py-3 px-5">Continue</a>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center flex-column bg-light-grey">
                    <h1 class="section-head">I want to buy & eat</h1>
                    <a href="/ob/customer-1" class="btn-hero py-3 px-5">Continue</a>
                </div>
            </div>
        </div>
    </section>
@endsection