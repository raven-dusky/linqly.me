<x-layout>
    <div class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <form method="POST" action="{{ route('password.update') }}" class="p-5">
                    @csrf
                        <h1 class="text-left mb-1 auth-title">👀 Reset your password</h1>
                        <p class="mb-4">Please enter and confirm your new password to reset your account.</p>
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="mb-3">
                            <input class="form-control auth-input" type="email" name="email" readonly placeholder="Your email" value="{{ old('email', $request->email) }}">
                        </div>
                        <div class="mb-3">
                            <input class="form-control auth-input" type="password" name="password" placeholder="New password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-control auth-input" type="password" name="password_confirmation" placeholder="Confirm new password">
                        </div>
                        <div class="mb-3 d-flex justify-content-center flex-column">
                            <button class="btn auth-btn" type="submit">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
