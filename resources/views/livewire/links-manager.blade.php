<div>
    <form class="container-fluid my-5" wire:submit.prevent="{{ $show ? 'saveInputs' : 'showInputs' }}">
    @if($show)
        @foreach($socials as $social)
        @php
            $userLink = Auth::user()->links()->where('social_id', $social['id'])->first();
        @endphp
        <div class="mb-3 input-group">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-{{ $social['icon'] }}"></i></span>
            <input type="text" class="form-control auth-input" id="{{ $social['icon'] }}-link" name="{{ $social['icon'] }}-link" placeholder="https://" wire:model="socialLinks.{{ $social['name'] }}" value="{{ $userLink?->url }}">
        </div>
        @endforeach
        <p class="fst-italic mt-4">Add custom sites (max 5)</p>
        @foreach(range(0, 4) as $i)
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                <input type="text" class="form-control auth-input" wire:model="genericLinks.{{ $i }}.url" placeholder="https://">
                <input type="hidden" wire:model="genericLinks.{{ $i }}.id">
            </div>
        @endforeach
    @endif
    @if($show == false)
        @forelse($links as $link)
        <a class="card-link" href="{{ $link->url }}">
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
