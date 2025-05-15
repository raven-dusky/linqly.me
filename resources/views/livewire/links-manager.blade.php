<div>
    <form class="container-fluid my-5" wire:submit.prevent="{{ $show ? 'saveInputs' : 'showInputs' }}">
    @if($show)
        <h1 class="mb-5">You can share your page using this link: https://linqly.me/{{ Auth::user()->name }}</h1>
        @foreach($socials as $social)
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-{{ $social->icon }}"></i></span>
                <input type="text" class="form-control auth-input" wire:model="socialLinks.{{ $social->id }}" placeholder="https://">
            </div>
        @endforeach
    @endif
    @if($show == false)
        @forelse($links as $link)
        <a class="card-link" href="{{ $link->url }}" target="_blank">
            <div class="mb-3 input-group card-container">
                @if($link->social_id)
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-{{ $link->social?->icon }}"></i></span>
                @else
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-link-45deg"></i></span>
                @endif
                <input type="text" class="form-control auth-input" value="{{ !empty($link->url) ? $link->url : '' }}" readonly>
            </div>
        </a>
        @empty
            <h1>🫣 Oops! It looks like there are no links here!</h1>
        @endforelse
    @endif
        <div class="row justify-content-end my-5">
            <button type="submit" class="btn auth-btn">
                {{ $show ? 'Save' : 'Customize' }}
            </button>
        </div>
    </form>
</div>
