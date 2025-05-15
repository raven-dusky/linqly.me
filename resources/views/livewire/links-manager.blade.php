<div>
    <form class="container-fluid my-5" wire:submit.prevent="{{ $show ? 'saveInputs' : 'showInputs' }}">
    @if($show)
        <h1>You can share your page using this link:</h1>
        <h4 class="mb-5"><a href="http://192.168.1.19:8000/{{ Auth::user()->name }}" target="_blank">http://example.com/{{ Auth::user()->name }}</a></h4>
        @foreach($socials as $social)
            @if(!str_contains($social->name, 'generic'))
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="bi bi-{{ $social->icon }}"></i></span>
                    <input type="text" class="form-control auth-input" wire:model="socialLinks.{{ $social->id }}" placeholder="https://">
                </div>
            @endif
        @endforeach
        <p class="fst-italic">Add custom sites...</p>
        @foreach($socials as $social)
            @if(str_contains($social->name, 'generic'))
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="bi bi-{{ $social->icon }}"></i></span>
                    <input type="text" class="form-control auth-input" wire:model="socialLinks.{{ $social->id }}" placeholder="https://">
                </div>
            @endif
        @endforeach
    @endif
    @if($show == false)
        @foreach($links as $link)
        <a class="card-link" href="{{ $link->url }}" target="_blank">
            <div class="mb-3 input-group card-container">
                <span class="input-group-text" id="basic-addon1"> <i class="bi bi-{{ str_contains($link->social->name, 'generic') ? 'link-45deg' : $link->social->icon }}"></i></span>
                <input type="text" class="form-control auth-input" value="{{ str_contains($link->social->name, 'generic') ? $link->url : ucfirst($link->social->name) }}" readonly>
            </div>
        </a>
        @endforeach
        @if(count($links) == 0)
        <h1>🫣 Oops! It looks like there are no links here!</h1>
        @endif
    @endif
        <div class="row justify-content-end my-5">
            <button type="submit" class="btn auth-btn">
                {{ $show ? 'Save' : 'Customize' }}
            </button>
        </div>
    </form>
</div>
