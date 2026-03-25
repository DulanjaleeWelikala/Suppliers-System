<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

{{-- Container for Login Card --}}
<div class="w-full max-w-2xl mx-auto">
    
    {{-- Main Card with Border and Shadow --}}
    <div class="bg-white dark:bg-[#0f0f0f] border-2 border-zinc-200 dark:border-zinc-800 rounded-[2.5rem] p-8 lg:p-12 shadow-2xl shadow-zinc-200/40 dark:shadow-none">
        
        {{-- Header Section --}}
        <div class="text-center space-y-4 mb-10">
            <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-600 shadow-xl shadow-indigo-500/20 mb-2 ring-4 ring-indigo-50 dark:ring-indigo-950/30">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8 text-white">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-3xl font-black tracking-tight text-zinc-900 dark:text-white uppercase italic">Welcome Back</h2>
                <p class="text-base text-zinc-500 dark:text-zinc-400 mt-1 font-medium">Please enter your credentials to access InBiz Sys</p>
            </div>
        </div>

        <x-auth-session-status class="text-center mb-6" :status="session('status')" />

        <form wire:submit="login" class="flex flex-col gap-6">
            {{-- Email Input --}}
            <flux:input 
                wire:model="email" 
                label="{{ __('Email address') }}" 
                type="email" 
                name="email" 
                icon="envelope"
                required 
                autofocus 
                autocomplete="email" 
                placeholder="name@company.com" 
                class="dark:bg-zinc-900/50 py-2.5"
            />

            {{-- Password Input Section --}}
            <div class="relative">
                <flux:input
                    wire:model="password"
                    label="{{ __('Password') }}"
                    type="password"
                    name="password"
                    icon="lock-closed"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                    class="dark:bg-zinc-900/50 py-2.5"
                />
                
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="absolute right-0 -top-7 text-xs font-bold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 transition-colors">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center justify-between py-1">
                <flux:checkbox wire:model="remember" label="{{ __('Stay signed in for 30 days') }}" class="text-sm font-medium" />
            </div>

            {{-- Submit Button --}}
            <div class="pt-2">
                <flux:button 
                    variant="primary" 
                    type="submit" 
                    class="w-full !bg-indigo-600 hover:!bg-indigo-700 !py-4 text-base font-bold shadow-lg shadow-indigo-500/25 transition-all active:scale-[0.98] rounded-xl"
                >
                    {{ __('Sign in to Dashboard') }}
                </flux:button>
            </div>
        </form>

        {{-- Footer Divider and Link --}}
        <div class="mt-10 pt-8 border-t border-zinc-100 dark:border-zinc-800 text-center text-sm text-zinc-600 dark:text-zinc-500 font-medium">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 transition-colors ml-1 hover:underline">
                Get started for free
            </a>
        </div>
    </div>
</div>