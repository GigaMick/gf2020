@extends('../layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="stepper text-center mb-4">
                    <i class="fas fa-circle text-green mr-2"></i>
                    <i class="fas fa-circle text-green mr-2"></i>
                    <i class="fas fa-circle text-green mr-2"></i>
                    <i class="far fa-circle mr-2"></i>
                    <i class="far fa-circle mr-2"></i>
                    <i class="far fa-circle mr-2"></i>
                </div>
                <div class="card p-4 shadow">
                    <h3 class="section-head mb-3">3. What type of meal is it?</h3>
                    <p class="mb-1">If you don't see an appropriate category for your meal let us know.</p>
                    <form class="" method="post" action="/meals/store-category">
                        @csrf
                        <select name="category" class="custom-select mb-4" required>
                            <option value="" selected disabled>Choose a meal category</option>
                            @foreach($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>

                        <div class=" mb-3">
                            <p class="mb-1">How will this meal arrive with the customer?</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="type" value="1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">Hot & ready to eat</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="type" value="2" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">Chilled & needing prepared</label>
                            </div>
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

