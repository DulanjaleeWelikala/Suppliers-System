<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>InBiz Sys | Enterprise Supply Chain</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Instrument Sans', sans-serif; }
            .glass-effect {
                background: rgba(255, 255, 255, 0.02);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.05);
            }
        </style>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#070707] text-[#1b1b18] antialiased selection:bg-indigo-100 selection:text-indigo-700">
        
        <div class="relative min-h-screen flex flex-col items-center justify-center p-6 overflow-hidden">
            {{-- Background Subtle Gradient --}}
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full -z-10">
                <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-500/10 blur-[120px] rounded-full"></div>
                <div class="absolute bottom-[-10%] right-[-10%] w-[30%] h-[30%] bg-blue-500/10 blur-[120px] rounded-full"></div>
            </div>

            <header class="w-full lg:max-w-5xl flex items-center justify-between mb-12">
                <div class="flex items-center gap-2">
                    <div class="h-8 w-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                    </div>
                    <span class="text-lg font-bold tracking-tighter dark:text-white uppercase">InBiz Sys</span>
                </div>
                
                @if (Route::has('login'))
                    <nav class="flex items-center gap-6">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold hover:text-indigo-500 transition-colors dark:text-zinc-400 dark:hover:text-white">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold hover:text-indigo-500 transition-colors dark:text-zinc-400 dark:hover:text-white">Sign in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-zinc-900 dark:bg-white dark:text-black text-white text-sm font-bold rounded-lg transition-transform active:scale-95">Create Account</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <main class="w-full lg:max-w-5xl grid lg:grid-cols-2 gap-12 items-center">
                
                {{-- Left Side --}}
                <div class="order-2 lg:order-1">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-xs font-bold tracking-wide uppercase mb-6">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                        </span>
                        Enterprise Ready
                    </div>
                    
                    <h1 class="text-5xl lg:text-6xl font-extrabold tracking-tight dark:text-white leading-[1.1] mb-6">
                        Next-gen <span class="text-indigo-600">Supply Chain</span> Control.
                    </h1>
                    
                    <p class="text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed mb-8 max-w-md">
                        Streamline supplier relations and inventory logistics with our all-in-one management ecosystem. Built for scale.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-xl font-bold transition-all shadow-xl shadow-indigo-500/25">
                            Get Started
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </a>
                        <button class="flex items-center justify-center gap-2 px-8 py-4 rounded-xl font-bold border border-zinc-200 dark:border-zinc-800 dark:text-white hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-all">
                            View Demo
                        </button>
                    </div>

                    <div class="mt-12 flex items-center gap-4 text-sm text-zinc-500">
                        <div class="flex -space-x-2">
                            <div class="h-8 w-8 rounded-full bg-zinc-200 dark:bg-zinc-800 border-2 border-white dark:border-black"></div>
                            <div class="h-8 w-8 rounded-full bg-zinc-300 dark:bg-zinc-700 border-2 border-white dark:border-black"></div>
                            <div class="h-8 w-8 rounded-full bg-zinc-400 dark:bg-zinc-600 border-2 border-white dark:border-black"></div>
                        </div>
                        <span>Trusted by 50+ local industries</span>
                    </div>
                </div>

                {{-- Right Side: Abstract Tech Component --}}
                <div class="order-1 lg:order-2 relative">
                    <div class="relative z-10 p-8 rounded-3xl glass-effect border border-white/10 shadow-2xl overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-transparent"></div>
                        
                        <div class="relative space-y-4">
                            <div class="h-2 w-20 bg-indigo-500 rounded-full"></div>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="h-20 rounded-xl bg-zinc-100 dark:bg-zinc-800/50"></div>
                                <div class="h-20 rounded-xl bg-indigo-600/20 border border-indigo-500/20"></div>
                                <div class="h-20 rounded-xl bg-zinc-100 dark:bg-zinc-800/50"></div>
                            </div>
                            <div class="h-32 rounded-xl bg-zinc-100 dark:bg-zinc-800/50 flex items-center justify-center">
                                <svg class="w-12 h-12 text-zinc-300 dark:text-zinc-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Decorative Rings --}}
                    <div class="absolute -top-6 -right-6 w-24 h-24 bg-indigo-600/20 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-blue-600/10 rounded-full blur-3xl"></div>
                </div>

            </main>

            <footer class="mt-20 w-full lg:max-w-5xl flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-zinc-100 dark:border-zinc-900 pt-8 text-xs text-zinc-500 font-medium">
                <p>&copy; {{ date('Y') }} InBiz System Analytics. Version 2.0</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-indigo-500 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-indigo-500 transition-colors">Documentation</a>
                </div>
            </footer>
        </div>

    </body>
</html>