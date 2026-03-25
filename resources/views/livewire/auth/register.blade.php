<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

{{-- max-w-2xl ලෙස වෙනස් කර ඇත (වඩා පළල් පෙනුමක් සඳහා) --}}
<div class="w-full max-w-2xl mx-auto">
    
    {{-- Card Wrapper with Border --}}
    <div class="bg-white dark:bg-[#0f0f0f] border-2 border-zinc-200 dark:border-zinc-800 rounded-[2.5rem] p-8 lg:p-12 shadow-2xl shadow-zinc-200/40 dark:shadow-none">
        
        {{-- Branding & Header Section --}}
        <div class="text-center space-y-4 mb-10">
            <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-600 shadow-xl shadow-indigo-500/20 mb-2 ring-4 ring-indigo-50 dark:ring-indigo-950/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div>
                <h2 class="text-3xl font-black tracking-tight text-zinc-900 dark:text-white uppercase italic">InBiz Sys</h2>
                <p class="text-base text-zinc-500 dark:text-zinc-400 mt-1 font-medium">Join our Enterprise Network</p>
            </div>
        </div>

        <x-auth-session-status class="text-center mb-6" :status="session('status')" />

        <form wire:submit="register" class="flex flex-col gap-6">
            {{-- Inputs --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                {{-- Name (Full Width on mobile) --}}
                <div class="md:col-span-2">
                    <flux:input 
                        wire:model="name" 
                        id="name" 
                        label="{{ __('Full Name') }}" 
                        icon="user"
                        required 
                        autofocus 
                        placeholder="John Doe" 
                        class="dark:bg-zinc-900/50 py-2"
                    />
                </div>

                {{-- Email (Full Width on mobile) --}}
                <div class="md:col-span-2">
                    <flux:input 
                        wire:model="email" 
                        id="email" 
                        label="{{ __('Email address') }}" 
                        type="email" 
                        icon="envelope"
                        required 
                        placeholder="name@company.com" 
                        class="dark:bg-zinc-900/50 py-2"
                    />
                </div>

                {{-- Password Fields - Side by Side on Desktop --}}
                <flux:input
                    wire:model="password"
                    id="password"
                    label="{{ __('Password') }}"
                    type="password"
                    icon="lock-closed"
                    required
                    placeholder="••••••••"
                    class="dark:bg-zinc-900/50 py-2"
                />

                <flux:input
                    wire:model="password_confirmation"
                    id="password_confirmation"
                    label="{{ __('Confirm Password') }}"
                    type="password"
                    icon="shield-check"
                    required
                    placeholder="••••••••"
                    class="dark:bg-zinc-900/50 py-2"
                />
            </div>

            <div class="pt-4">
                <flux:button 
                    type="submit" 
                    variant="primary" 
                    class="w-full !bg-indigo-600 hover:!bg-indigo-700 !py-4 text-base font-bold shadow-lg shadow-indigo-500/25 transition-all active:scale-[0.98] rounded-xl"
                >
                    {{ __('Create Enterprise Account') }}
                </flux:button>
            </div>
        </form>

        {{-- Footer Links --}}
        <div class="mt-10 pt-6 border-t border-zinc-100 dark:border-zinc-800 text-center text-sm text-zinc-600 dark:text-zinc-500 font-medium">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 font-bold ml-1 transition-colors hover:underline">
                Sign in here
            </a>
        </div>
    </div>
</div>