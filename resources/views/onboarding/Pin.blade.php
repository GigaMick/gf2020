@extends('../layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="stepper text-center mb-4">
                    <i class="fas fa-circle text-green mr-2"></i><i class="fas text-green fa-circle mr-2"></i><i class="fas text-green fa-circle mr-2"></i><i class="fas fa-circle text-green mr-2"></i><i class="fas text-green fa-circle mr-2"></i><i class="far fa-circle mr-2"></i>
                </div>
                <div class="card p-4 shadow">
                    <h3 class="section-head mb-3">4. Let's make sure that's correct</h3>

                    <form class="" method="post" action="/ob/store-pin">
                        @csrf

                        <div class="input-group mb-3">
                            <label class="w-100 mb-0">Please verify your phone number</label>
                            <p class="small text-muted d-block mb-3 mt-0"><i class="fas fa-info-circle"></i> We just sent you a PIN code. Enter it below</p>
                            <input type="text" name="pin" class="" placeholder="Eg 12345" value="" id="">
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

