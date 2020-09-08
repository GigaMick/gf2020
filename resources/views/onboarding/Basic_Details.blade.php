@extends('../layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="stepper text-center mb-4">
                    <i class="fas fa-circle text-green mr-2"></i><i class="far fa-circle mr-2"></i><i
                            class="far fa-circle mr-2"></i><i class="far fa-circle mr-2"></i><i
                            class="far fa-circle mr-2"></i><i class="far fa-circle mr-2"></i>
                </div>
                <div class="card p-4 shadow">
                    <h3 class="section-head mb-3">1. Let's get started</h3>
                    <form class="" method="post" action="/ob/store-basic-details">
                        @csrf
                        <div class="input-group mb-3">
                            <label>Email address</label>
                            <input type="email" name="email" class="" placeholder="Eg gal@wonderwoman.com" value=""
                                   id="" required>
                        </div>
                        <input type="hidden" name="type" value="{{$token}}">
                        <div class="input-group mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="" placeholder="Min 8 characters" value=""
                                   id="" required>
                        </div>
                        <div class="input-group mb-3">

                            <input type="submit" name="" class="btn btn-hero py-3 px-5" placeholder=""
                                   value="Save and Continue" id="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

