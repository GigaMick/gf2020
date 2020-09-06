@extends('../layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="stepper text-center mb-4">
                    <i class="fas fa-circle text-green mr-2"></i>
                    <i class="fas fa-circle text-green mr-2"></i>
                    <i class="far fa-circle mr-2"></i>
                    <i class="far fa-circle mr-2"></i>
                    <i class="far fa-circle mr-2"></i>
                    <i class="far fa-circle mr-2"></i>
                </div>
                <div class="card p-4 shadow">
                    <h3 class="section-head mb-3">2. Dietary Types</h3>
                    <p>If your meal is suitable for any of the following dietary preferences then please select them
                        here.</p>
                    <form class="" method="post" action="/meals/store-dietary">
                        @csrf
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="vegetarian" value="1" class="custom-control-input"
                                   id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Vegetarian</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="vegan" value="1" class="custom-control-input"
                                   id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">Vegan</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="kosher" value="1" class="custom-control-input"
                                   id="customCheck3">
                            <label class="custom-control-label" for="customCheck3">Kosher</label>
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

