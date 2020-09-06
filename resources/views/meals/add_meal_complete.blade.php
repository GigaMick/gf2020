@extends('../layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="stepper text-center mb-4">
                    <i class="fas fa-circle text-green mr-2"></i>
                    <i class="fas text-green fa-circle mr-2"></i>
                    <i class="fas text-green fa-circle mr-2"></i>
                    <i class="fas text-green fa-circle mr-2"></i>
                    <i class="fas text-green fa-circle mr-2"></i>
                    <i class="fas text-green fa-circle mr-2"></i>
                </div>
                <div class="card p-4 shadow">
                    <h3 class="section-head mb-3">Excellent, you've added a meal</h3>
                    <a href="/meals/add-meal-name" class="btn btn-hero">Add Another</a>
                    <a href="/dashboard" class="mt-4 text-center">Go to dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection

