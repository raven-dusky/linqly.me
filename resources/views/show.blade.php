<x-layout>
    <div class="d-flex justify-content-center align-items-center auth-d-flex">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 mb-5">
                    <h1 class="my-5">{{'@'}}{{ $user->name }}</h1>
                    @foreach($links as $link)
                    <a class="card-link" href="{{ $link->url }}" target="_blank">
                        <div class="mb-3 input-group card-container" style="box-shadow: 5px 5px {{ $link->social && $link->social->color ? $link->social->color : 'black' }}; border-radius: 5px;">
                            <span class="input-group-text" id="basic-addon1"> <i class="bi bi-{{ str_contains($link->social->name, 'generic') ? 'link-45deg' : $link->social->icon }}"></i></span>
                            <input type="text" class="form-control auth-input" value="{{ str_contains($link->social->name, 'generic') ? $link->url : ucfirst($link->social->name) }}" readonly>
                        </div>
                    </a>
                    @endforeach
                    @if(count($links) == 0)
                    <h1>🫣 Oops! It looks like there are no links here!</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
