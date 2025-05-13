<x-layout>
    <div class="d-flex justify-content-center align-items-center auth-d-flex">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <form method="POST" action="{{ route('verification.send') }}" class="p-5 m-5">
                    @csrf
                        <h1 class="text-left mb-1 auth-title">📬 Please verify your email!</h1>
                        <p class="mb-4">We've sent a verification email to <strong>{{ Auth::user()->email }}</strong></p>
                        <div class="mb-3 d-flex justify-content-center flex-column">
                            <button class="btn auth-btn" type="submit">Resend verification email</button>
                            @if (session('message'))
                                <span class="mt-2 text-success text-center">{{ session('message') }}</span>
                            @endif
                            @if (session('error'))
                                <span class="mt-2 text-danger text-center">{{ session('error') }}</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
