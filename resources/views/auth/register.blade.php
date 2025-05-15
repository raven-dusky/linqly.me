<x-layout>
    <div class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <form action="{{ route('register') }}" method="POST" class="p-4">
                    @csrf
                        <h1 class="text-left mb-4 auth-title">☺️ Create your account</h1>
                        <div class="mb-3">
                            <input type="text" class="form-control auth-input" id="name" name="name" placeholder="Username" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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
                        <div class="mb-3">
                            <input type="password" class="form-control auth-input" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                        <div class="mb-3 d-flex justify-content-center flex-column">
                            <p class="text-center">By creating an account you agree with our <a href="" class="auth-link">terms</a> and <a href="" class="auth-link">privacy policy</a></p>
                            <button type="submit" class="btn auth-btn">Sing Up</button>
                            <p class="mt-2">Already have an account? <a href="{{ route('login') }}" class="auth-link">Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
