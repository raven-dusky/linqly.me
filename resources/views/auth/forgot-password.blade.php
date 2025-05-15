<x-layout>
    <div class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <form method="POST" action="{{ route('password.email') }}" class="p-4">
                    @csrf
                        <h1 class="text-left mb-1 auth-title">😓 Forgot your password?</h1>
                        <p class="mb-4">That's okay, it happens! Enter your email address below and we'll send you a link to reset your password.</p>
                        <div class="mb-3">
                            <input class="form-control auth-input" type="email" name="email" placeholder="Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex justify-content-center flex-column">
                            <button class="btn auth-btn" type="submit">Send Password Reset Link</button>
                            @if (session('status'))
                                <span class="mt-2 text-success text-center">{{ session('status') }}</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
