@extends('../layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="stepper text-center mb-4">
                    <i class="fas fa-circle text-green mr-2"></i><i class="fas text-green fa-circle mr-2"></i><i class="fas text-green fa-circle mr-2"></i><i class="far fa-circle mr-2"></i><i class="far fa-circle mr-2"></i><i class="far fa-circle mr-2"></i>
                </div>
                <div class="card p-4 shadow">
                    <h3 class="section-head mb-3">3. Check the details</h3>

                    <form class="" method="post" action="/ob/store-confirmed-address">
                        @csrf
                        <div class="input-group mb-3">
                            <label>House / flat number?</label>
                            <input type="" name="house_number" class="" placeholder="Eg, 47" value="{{$user->house_number}}" id="">
                        </div>
                        <div class="input-group mb-3">
                            <label class="w-100 mb-1">Street</label>
                            <input type="text" name="address_1" class="" placeholder="Eg G37 4ED" value="{{$user->address_1}}" id="">
                        </div>
                        <div class="input-group mb-3">
                            <label>Address line 2 (optional)</label>
                            <input type="text" name="address_2" class="" placeholder="" value="{{$user->address_2 ?? ""}}" id="">
                        </div>
                        <div class="input-group mb-3">
                            <label>City</label>
                            <input type="text" name="city" class="" placeholder="" value="{{$user->city}}" id="">
                        </div>
                        <div class="input-group mb-3">
                            <label>Postcode</label>
                            <input type="text" name="postcode" class="" placeholder="" value="{{$user->postcode}}" id="">
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

