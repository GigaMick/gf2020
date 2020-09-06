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
                    <h3 class="section-head mb-3">1. Meal name and description</h3>
                    <form class="" method="post" action="/meals/store-basic-details">
                        @csrf
                        <div class="input-group mb-3">
                            <label>What's the name of this meal? (required)</label>
                            <input type="text" name="name" class="" placeholder="Eg Chicken Surprise" value="" id=""
                                   required>
                        </div>

                        <div class="input-group mb-3">
                            <label>Give a brief description of this meal</label>
                            <textarea rows="3" name="description" value="" class="input"></textarea>
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

