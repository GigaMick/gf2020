@extends('../layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="stepper text-center mb-4">
                    <i class="fas fa-circle text-green mr-2"></i><i class="fas text-green fa-circle mr-2"></i><i
                            class="fas text-green fa-circle mr-2"></i><i class="fas text-green fa-circle mr-2"></i><i
                            class="far fa-circle mr-2"></i><i class="far fa-circle mr-2"></i>
                </div>
                <div class="card p-4 shadow">
                    <h3 class="section-head mb-3">4. Upload some photos of the meal</h3>
                    <p class="mb-1">Make the photos as clear and appealing as you can. <br class="d-none d-md-block"> <strong>You must</strong> use photos of the actual food you have prepared.</p>
                        <div class="input-group mb-3">
                            <a href="/meals/add-meal-cost" class="btn btn-block btn-hero py-3 px-5">Save and Continue</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

