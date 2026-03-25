<x-layouts.app>
    <div class="p-6 lg:p-10 bg-[#f4f4f5] dark:bg-[#020617] min-h-screen font-sans">
        
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div class="space-y-1">
                <flux:heading size="xl" level="1" class="font-black uppercase tracking-tighter text-zinc-900 dark:text-white italic text-4xl">
                    Suppliers
                </flux:heading>
                <div class="flex items-center gap-3">
                    <div class="h-[2px] w-10 bg-indigo-600"></div>
                    <flux:subheading class="text-[10px] font-bold text-zinc-500 uppercase tracking-[0.3em]">
                        Logistics & Supply Network
                    </flux:subheading>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <flux:button href="{{ route('suppliers.print') }}" target="_blank" icon="printer" variant="outline" size="sm" class="!border-zinc-300 dark:!border-zinc-700 !text-zinc-600 dark:!text-zinc-400 font-bold uppercase text-[10px] bg-white dark:bg-zinc-900 shadow-sm">
                    Print Report
                </flux:button>
                
                <flux:modal.trigger name="add-supplier">
                    <flux:button icon="plus" variant="primary" size="sm" class="!bg-indigo-600 hover:!bg-indigo-700 !text-white font-black uppercase text-[10px] tracking-widest shadow-lg shadow-indigo-500/20 px-5">
                        Add New Partner
                    </flux:button>
                </flux:modal.trigger>
            </div>
        </div>

        {{-- Global Validation Errors (Displayed above the Table) --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-600 rounded-r-xl shadow-sm">
                <div class="flex items-start gap-3">
                    <flux:icon icon="exclamation-triangle" variant="solid" class="text-red-600 size-5 mt-0.5" />
                    <div>
                        <h3 class="text-red-800 dark:text-red-400 text-[11px] font-black uppercase tracking-widest italic">Data Validation Failure</h3>
                        <ul class="mt-1 list-none p-0">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-700 dark:text-red-500 text-[12px] font-bold uppercase tracking-tight">→ {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-6 px-4 py-3 bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 rounded-xl flex items-center gap-2">
                <div class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></div>
                <span class="text-emerald-700 dark:text-emerald-400 text-[10px] font-black uppercase tracking-widest italic">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Filters & Search --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <form action="{{ route('suppliers.index') }}" method="GET" class="relative w-full md:w-80">
                <flux:input 
                    name="search" 
                    value="{{ request('search') }}" 
                    icon="magnifying-glass" 
                    placeholder="Search supplier network..." 
                    variant="filled"
                    class="!bg-white !rounded-full !border-zinc-200 dark:!border-zinc-800 !h-11 text-[13px] font-medium shadow-sm focus:ring-2 focus:ring-indigo-500/20 !text-zinc-900"
                />
                <button type="submit" class="hidden"></button>
            </form>
        </div>

        {{-- Main Table Card --}}
        <flux:card class="!p-0 overflow-hidden !border-none shadow-2xl shadow-zinc-200/50 dark:shadow-none rounded-2xl">
            <div class="overflow-x-auto">
                <flux:table>
                    <flux:table.columns>
                        <flux:table.column class="!pl-6 !py-5 !bg-zinc-900 !text-zinc-400 uppercase text-[11px] font-bold tracking-[0.1em]">Ref ID</flux:table.column>
                        <flux:table.column class="!py-5 !bg-zinc-900 !text-zinc-400 uppercase text-[11px] font-bold tracking-[0.1em]">Full Name</flux:table.column>
                        <flux:table.column class="!py-5 !bg-zinc-900 !text-zinc-400 uppercase text-[11px] font-bold tracking-[0.1em]">Email</flux:table.column>
                        <flux:table.column class="!py-5 !bg-zinc-900 !text-zinc-400 uppercase text-[11px] font-bold tracking-[0.1em]">Contact Number</flux:table.column>
                        <flux:table.column class="!py-5 !bg-zinc-900 !text-zinc-400 uppercase text-[11px] font-bold tracking-[0.1em]">Address</flux:table.column>
                        <flux:table.column align="start" class="!pl-6 !py-5 !bg-zinc-900 !text-zinc-400 uppercase text-[11px] font-bold tracking-[0.1em]">Actions</flux:table.column>                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($suppliers as $supplier)
                            <flux:table.row :key="$supplier->id" class="group border-b border-zinc-100 dark:border-zinc-800 hover:bg-zinc-50/80 dark:hover:bg-white/[0.02] transition-all">
                                <flux:table.cell class="!pl-6">
                                    <span class="text-[14px] font-mono font-bold text-zinc-500">{{ str_pad($supplier->id, 4, '0', STR_PAD_LEFT) }}</span>
                                </flux:table.cell>
                                <flux:table.cell>
                                    <span class="text-[14px] font-bold text-zinc-900 dark:text-white uppercase tracking-tight">{{ $supplier->name }}</span>
                                </flux:table.cell>
                                <flux:table.cell>
                                    <span class="text-[14px] font-semibold text-zinc-600 dark:text-zinc-400 lowercase">{{ $supplier->email }}</span>
                                </flux:table.cell>
                                <flux:table.cell>
                                    <span class="text-[14px] font-bold text-zinc-800 dark:text-zinc-200 bg-zinc-100 dark:bg-zinc-800 px-2 py-1 rounded border border-zinc-200 dark:border-zinc-700">{{ $supplier->phone }}</span>
                                </flux:table.cell>
                                <flux:table.cell class="max-w-[250px]">
                                    <span class="text-[14px] font-medium text-zinc-500 truncate block uppercase italic">{{ $supplier->address ?? 'N/A' }}</span>
                                </flux:table.cell>
                                <flux:table.cell align="end" class="!pr-6">
                                    <div class="flex justify-start items-center gap-1">
                                        <flux:modal.trigger name="edit-supplier-{{ $supplier->id }}">
                                            <button class="p-2 text-zinc-600 hover:text-indigo-600 transition-colors"><flux:icon icon="pencil-square" class="size-5" /></button>
                                        </flux:modal.trigger>
                                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" onsubmit="return confirm('Archive record?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 text-zinc-400 hover:text-red-600 transition-colors"><flux:icon icon="trash" class="size-5" /></button>
                                        </form>
                                    </div>

                                    {{-- Edit Modal --}}
                                    <flux:modal name="edit-supplier-{{ $supplier->id }}" class="md:w-[500px] !p-0 overflow-hidden rounded-2xl shadow-2xl">
                                        <div class="bg-zinc-900 p-6 flex items-center justify-between">
                                            <div>
                                                <flux:heading size="lg" class="!text-white uppercase font-black italic">Modify Entry</flux:heading>
                                                <p class="text-zinc-400 text-[10px] uppercase font-bold tracking-[0.2em] mt-1">Registry Ref: {{ $supplier->id }}</p>
                                            </div>
                                            <flux:icon icon="pencil-square" class="text-indigo-500 size-6" />
                                        </div>

                                        <form method="POST" action="{{ route('suppliers.update', $supplier) }}" class="p-8 space-y-6 bg-white dark:bg-zinc-900">
                                            @csrf @method('PUT')
                                            <div class="grid grid-cols-1 gap-6">
                                                <flux:input label="Full Name" name="name" value="{{ old('name', $supplier->name) }}" required class="font-bold uppercase !text-[13px] !h-11" />
                                                <div class="grid grid-cols-2 gap-4">
                                                    <flux:input label="Email" name="email" type="email" value="{{ old('email', $supplier->email) }}" required class="font-bold !text-[13px] !h-11" />
                                                    <flux:input label="Contact Number" name="phone" value="{{ old('phone', $supplier->phone) }}" required class="font-bold !text-[13px] !h-11" />
                                                </div>
                                                <flux:textarea label="Address" name="address" rows="3" class="font-bold !text-[13px] uppercase">{{ old('address', $supplier->address) }}</flux:textarea>
                                            </div>
                                            <div class="flex gap-3 justify-end pt-6 border-t border-zinc-100 dark:border-zinc-800">
                                                <flux:modal.close><flux:button variant="ghost" size="sm" class="uppercase font-bold text-[11px]">Discard</flux:button></flux:modal.close>
                                                <flux:button type="submit" variant="primary" size="sm" class="!bg-indigo-600 !text-white uppercase font-black text-[11px] px-10">Update Record</flux:button>
                                            </div>
                                        </form>
                                    </flux:modal>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="6" class="py-32 text-center bg-white dark:bg-zinc-900">
                                    <span class="text-[11px] font-black text-zinc-300 uppercase tracking-[0.4em] italic">No results found for "{{ request('search') }}"</span>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                </flux:table>
            </div>
        </flux:card>

        <div class="mt-8">
            {{ $suppliers->links() }}
        </div>

        {{-- Add Modal --}}
        <flux:modal name="add-supplier" class="md:w-[500px] !p-0 overflow-hidden rounded-2xl shadow-2xl">
            <div class="bg-indigo-600 p-6 flex items-center justify-between">
                <div>
                    <flux:heading size="lg" class="!text-white uppercase font-black italic">Partner Enrollment</flux:heading>
                    <p class="text-indigo-200 text-[10px] uppercase font-bold tracking-[0.2em] mt-1">Master Database protocol</p>
                </div>
                <flux:icon icon="user-plus" class="text-white size-6" />
            </div>

            <form method="POST" action="{{ route('suppliers.store') }}" class="p-8 space-y-6 bg-white dark:bg-zinc-900">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <flux:input label="Full Corporate Name" name="name" value="{{ old('name') }}" placeholder="E.G. APEX SOLUTIONS" required class="font-bold uppercase !text-[13px] !h-11" />
                    <div class="grid grid-cols-2 gap-4">
                        <flux:input label="Official Email" name="email" type="email" value="{{ old('email') }}" placeholder="contact@company.com" required class="font-bold !text-[13px] !h-11" />
                        <flux:input label="Direct Contact" name="phone" value="{{ old('phone') }}" placeholder="+94 XX XXX XXXX" required class="font-bold !text-[13px] !h-11" />
                    </div>
                    <flux:textarea label="Headquarters Location" name="address" placeholder="PHYSICAL ADDRESS" class="font-bold !text-[13px] uppercase" rows="3">{{ old('address') }}</flux:textarea>
                </div>
                <div class="flex gap-3 justify-end pt-6 border-t border-zinc-100 dark:border-zinc-800">
                    <flux:modal.close><flux:button variant="ghost" size="sm" class="uppercase font-bold text-[11px]">Close</flux:button></flux:modal.close>
                    <flux:button type="submit" variant="primary" size="sm" class="!bg-indigo-600 !text-white uppercase font-black text-[11px] px-10 shadow-lg shadow-indigo-500/20">Save Record</flux:button>
                </div>
            </form>
        </flux:modal>
    </div>
</x-layouts.app>