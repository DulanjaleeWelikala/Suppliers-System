<x-layouts.app>
    
    <div class="flex h-full w-full flex-1 flex-col gap-8 p-8 bg-[#f4f4f5] dark:bg-[#020617]">
        
        <div class="flex flex-col gap-1">
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-900 dark:text-white">Supply Overview</h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">Monitoring your logistics and financial performance for today.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            
            <div class="group relative overflow-hidden rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-white/5 dark:bg-zinc-900/50">
                <div class="flex items-center justify-between">
                    <div class="z-10">
                        <p class="text-xs font-medium uppercase tracking-wider text-zinc-500">Strategic Partners</p>
                        <h3 class="mt-2 text-3xl font-bold tracking-tight text-zinc-900 dark:text-white">248</h3>
                    </div>
                    <div class="rounded-xl bg-indigo-50 p-3 dark:bg-indigo-500/10 transition-colors group-hover:bg-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 dark:text-indigo-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656 126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400">
                        +12.5%
                    </span>
                    <span class="text-xs text-zinc-400 font-medium">vs last month</span>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-white/5 dark:bg-zinc-900/50">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-zinc-500">Inventory Status</p>
                        <h3 class="mt-2 text-3xl font-bold tracking-tight text-zinc-900 dark:text-white">85%</h3>
                    </div>
                    <div class="rounded-xl bg-amber-50 p-3 dark:bg-amber-500/10 group-hover:bg-amber-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600 dark:text-amber-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </div>
                <div class="mt-6">
                    <div class="flex justify-between mb-2 items-center">
                        <span class="text-[11px] font-medium text-zinc-400">Utilization</span>
                        <span class="text-[11px] font-semibold text-amber-600 dark:text-amber-400">Optimal</span>
                    </div>
                    <div class="h-1.5 w-full rounded-full bg-zinc-200 dark:bg-zinc-800">
                        <div class="h-1.5 w-[85%] rounded-full bg-amber-500 transition-all duration-500"></div>
                    </div>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl border border-zinc-800 bg-zinc-900 p-6 shadow-lg transition-all hover:scale-[1.01] dark:border-white/10">
                <div class="flex items-center justify-between text-white">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-zinc-400">Total Valuation</p>
                        <h3 class="mt-2 text-3xl font-bold tracking-tight text-white">$42,500.00</h3>
                    </div>
                    <div class="rounded-xl bg-white/10 p-3 group-hover:bg-emerald-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-5 flex items-center justify-between border-t border-white/10 pt-4">
                    <p class="text-[11px] font-medium text-zinc-400 uppercase tracking-widest">Q1 Target</p>
                    <p class="text-[11px] font-semibold text-emerald-400">$50,000</p>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-zinc-200 bg-white shadow-sm dark:border-white/5 dark:bg-zinc-900/50">
            <div class="p-6 border-b border-zinc-100 dark:border-white/5">
                <h4 class="text-lg font-semibold text-zinc-900 dark:text-white">Financial Activity</h4>
                <p class="text-sm text-zinc-500">A detailed list of recent supplier settlements and payouts.</p>
            </div>

            <div class="divide-y divide-zinc-100 dark:divide-white/5">
                @for ($i = 1; $i <= 5; $i++)
                <div class="flex items-center justify-between p-5 transition-all hover:bg-zinc-50 dark:hover:bg-white/[0.02]">
                    <div class="flex items-center gap-4">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-zinc-100 text-zinc-600 font-bold text-xs dark:bg-zinc-800 dark:text-zinc-400">
                            #0{{ $i }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-zinc-900 dark:text-white">Supplier Payout <span class="text-zinc-400 font-normal ml-1">#Batch_X{{ 450 + $i }}</span></p>
                            <div class="mt-0.5 flex items-center gap-2">
                                <p class="text-xs text-zinc-500 font-medium tracking-tight">System Auth: INB-001</p>
                                <span class="h-1 w-1 rounded-full bg-zinc-300 dark:bg-zinc-700"></span>
                                <p class="text-xs text-zinc-500 font-medium">{{ now()->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-zinc-900 dark:text-white tracking-tight">$1,250.00</p>
                        <span class="inline-flex items-center gap-1.5 mt-1 rounded-full bg-emerald-500/10 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-emerald-600 dark:text-emerald-400">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Settled
                        </span>
                    </div>
                </div>
                @endfor
            </div>
            
            <div class="p-4 bg-zinc-50/80 dark:bg-transparent text-center border-t border-zinc-100 dark:border-white/5">
                <button class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 dark:text-indigo-400 uppercase tracking-widest">View All Transactions</button>
            </div>
        </div>
    </div>
</x-layouts.app>