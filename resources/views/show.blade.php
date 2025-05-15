<x-layout>
    <div class="d-flex justify-content-center align-items-center auth-d-flex">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <h1 class="my-5">{{ $user->name }}</h1>
                    @forelse($links as $link)
                    <a class="card-link" href="{{ $link->url }}" target="_blank">
                        <div class="mb-3 input-group card-container" style="box-shadow: 5px 5px {{$link->social && $link->social->color ? $link->social->color : 'black'}}; border-radius: 5px;">
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
                </div>
            </div>
        </div>
    </div>
</x-layout>
