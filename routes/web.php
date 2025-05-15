<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Controllers\PublicController;

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }
    if (!Auth::user()->hasVerifiedEmail()) {
        return redirect()->route('verification.notice');
    }
    return app(\App\Http\Controllers\PublicController::class)->index();
})->name('homepage');

Route::post('/email/verification-notification', function (Request $request) {
    $key = 'resend-verification-email:' . $request->user()->id;
    $maxAttempts = 1;
    $decaySeconds = 60;
    if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
        $seconds = RateLimiter::availableIn($key);
        return back()->with('error', 'Too many requests. Please try again in ' . $seconds . ' seconds.');
    }
    RateLimiter::hit($key, $decaySeconds);
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth'])->name('verification.send');

Route::post('/forgot-password', function (Request $request) {
    $request->validate([
        'email' => 'required|email'
    ]);
    $email = (string) $request->input('email');
    $key = 'reset-password-request:' . $email;
    $maxAttempts = 1;
    $decaySeconds = 60;
    if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
        $seconds = RateLimiter::availableIn($key);
        // Assegna l'errore al campo 'email'
        return back()->withErrors([
            'email' => 'Too many requests. Please try again in ' . $seconds . ' seconds.'
        ]);
    }
    RateLimiter::hit($key, $decaySeconds);
    $status = Password::sendResetLink(['email' => $email]);
    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withErrors(['email' => __($status)]);
})->name('password.email');

Route::get('/{user}', [PublicController::class, 'show'])->name('show.user');
