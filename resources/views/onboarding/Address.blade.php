@extends('../layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="stepper text-center mb-4">
                    <i class="fas fa-circle text-green mr-2"></i><i class="fas text-green fa-circle mr-2"></i><i class="fas text-green fa-circle mr-2"></i><i class="far fa-circle mr-2"></i><i class="far fa-circle mr-2"></i><i class="far fa-circle mr-2"></i>
                </div>
                <div class="card p-4 shadow">
                    <h3 class="section-head mb-1">3. {{$message}}</h3>
                    <p class="small text-muted d-block mb-3 mt-0"><i class="fas fa-info-circle"></i> {{$message2}}</p>

                    <form class="" method="post" action="/ob/store-address">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group mb-3">
                                <label>What's your house / flat number?</label>
                                <input type="" name="house_number" class="" placeholder="Eg, 47" value="" id="">
                            </div>
                            <label class="w-100 mb-1">Please enter your full postcode</label>
                            <input type="text" name="postcode" class="" placeholder="Eg G37 4ED" value="" id="">
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" name="" class="btn btn-hero py-3 px-5" placeholder="" value="Save and Continue" id="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

