<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            {{-- Logo Section --}}
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-2 py-4 mb-4" wire:navigate>
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-indigo-600 shadow-lg shadow-indigo-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-white">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                </div>
                <div class="flex flex-col leading-none">
                    <span class="text-xl font-black tracking-tight text-white uppercase italic">InBiz Sys</span>
                    <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest mt-1">Supply Chain</span>
                </div>
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group heading="Platform" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>Dashboard</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.item 
                    icon="user-group" 
                    :href="route('suppliers.index')" 
                    :current="request()->routeIs('suppliers.*')" 
                    wire:navigate>
                    Suppliers
                </flux:navlist.item>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="cog-6-tooth" href="/settings/profile" wire:navigate>
                    General Settings
                </flux:navlist.item>
                <flux:navlist.item icon="question-mark-circle" href="#">
                    Support Center
                </flux:navlist.item>
            </flux:navlist>

            <flux:separator class="my-4 mx-2 border-zinc-200 dark:border-zinc-700" />

            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu>
                    <flux:menu.item icon="user" href="/settings/profile" wire:navigate>View Profile</flux:menu.item>
                    <flux:menu.separator />

                    <flux:menu.item 
                        icon="arrow-right-start-on-rectangle" 
                        variant="danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                        Log out
                    </flux:menu.item>
                </flux:menu>
            </flux:dropdown>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </flux:sidebar>

        {{ $slot }}

        @fluxScripts
    </body>
</html>