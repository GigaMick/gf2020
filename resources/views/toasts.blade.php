@if ($message = Session::get('success'))
    <div class="toast bg-brand text-white" data-delay="3000" style="" role="alert"
         aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p class="text-dark"><strong>{{ $message }}</strong></p>
        </div>
    </div>
@endif
@if (count($errors) > 0)
    <div class="toast bg-brand text-white" data-delay="3000" style="width:350px; position: absolute; top: 10px; right: 10px;" role="alert"
         aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p class="text-dark"><strong>
            @foreach ($errors->all() as $error)
                <p class="text-dark">{{ $error }}</p>
                @endforeach</strong></p>
        </div>
    </div>
@endif

<script>
    $('.toast').toast('show');
</script>


