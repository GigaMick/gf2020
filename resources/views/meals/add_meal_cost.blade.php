@extends('../layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="stepper text-center mb-4">
                    <i class="fas fa-circle text-green mr-2"></i>
                    <i class="fas fa-circle text-green mr-2"></i>
                    <i class="fas fa-circle text-green mr-2"></i>
                    <i class="fas fa-circle text-green mr-2"></i>
                    <i class="fas fa-circle text-green mr-2"></i>
                    <i class="far fa-circle mr-2"></i>
                </div>
                <div class="card p-4 shadow">
                    <h3 class="section-head mb-3">5. Price per portion?</h3>
                    <form class="" method="post" action="/meals/store-cost">
                        @csrf
                    <div class="input-group mb-3">
                        <label>How much per portion?</label>
                        <input type="text" name="price" class="" placeholder="Eg, 7.50" value="" id="">
                    </div>
                    <div class="input-group mb-3">
                        <label>How many portions are available?</label>
                        <input type="number" name="stock" class="" placeholder="Eg, 4" value="" id="">
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

