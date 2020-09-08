@extends('../layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="stepper text-center mb-4">
                    <i class="fas fa-circle text-green mr-2"></i><i class="fas text-green fa-circle mr-2"></i><i
                            class="far fa-circle mr-2"></i><i class="far fa-circle mr-2"></i><i
                            class="far fa-circle mr-2"></i><i class="far fa-circle mr-2"></i>
                </div>
                <div class="card p-4 shadow">
                    <h3 class="section-head mb-3">2. Nice to meet you 👋</h3>
                    <form class="" method="post" action="/ob/store-display-name">
                        @csrf
                        @if($user->is_cook)
                            <p class="p-0 m-0">What's your name?</p>
                            <p class="small text-muted d-block w-100 mb-2 mt-0"><i
                                        class="fas fa-info-circle"></i> {{$message}}</p>
                            <div class="row">
                                <div class="col-6 pr-1">
                                    <div class="input-group mb-3">
                                        <label>First name</label>
                                        <input type="text" name="firstname" class="" placeholder="Eg Clark" value=""
                                               id=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-6 pl-1">
                                    <div class="input-group mb-3">
                                        <label>Surname</label>
                                        <input type="text" name="surname" class="" placeholder="Eg Kent" value=""
                                               id=""
                                               required>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="input-group mb-3">
                            <label class="w-100 mb-1">Pick a username</label>
                            <p class="small text-muted d-block w-100 mb-2 mt-0"><i
                                        class="fas fa-info-circle"></i> {{$message}}</p>
                            <input autofocus type="text" name="username" class="" placeholder="Eg FooderMan" value="" id="">
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

