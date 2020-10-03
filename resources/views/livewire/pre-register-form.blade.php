<div>
    <h4 class="hero-text-sub mt-4 mb-4">{{$thanks}}</h4>

    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">


            <form wire:submit.prevent="submit">
                @csrf
                @error('email') <span class="text-white hero-text-sub">{{ $message }}</span> @enderror
                <div class="input-group mb-1">
                    <input wire:model="email" type="email" class="" placeholder="Your email address" value=""
                           id="">
                </div>
                <div class="input-group mb-3">
                    <input type="button" wire:click="submit" class="btn btn-hero" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
