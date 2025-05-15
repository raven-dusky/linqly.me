<x-layout>
    <div class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <form action="{{ route('login') }}" method="POST" class="p-4">
                    @csrf
                        <h1 class="text-left mb-4 auth-title">👋🏻 Welcome back!</h1>
                        <div class="mb-3">
                            <input type="email" class="form-control auth-input" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control auth-input" id="password" name="password" placeholder="Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex justify-content-center flex-column">
                            <p class="mb-3 text-end"><a href="{{ route('password.request') }}" class="auth-link">Forgot your password?</a></p>
                            <button type="submit" class="btn auth-btn">Sign in</button>
                            <p class="mt-2">Don't have an account? <a href="{{ route('register') }}" class="auth-link">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
