<x-layouts.app>
    <style>
        /* Screen එකේදී Pagination පෙන්වීමට අවශ්‍ය Styling */
        .pagination-wrapper {
            display: block !important;
            margin-top: 2rem;
        }
        .pagination-wrapper svg {
            width: 20px !important;
            height: 20px !important;
            display: inline-block;
        }
        .pagination-wrapper nav div:first-child { display: none !important; }
        .pagination-wrapper nav div:last-child { display: flex !important; gap: 4px; }

        @media print {
            @page {
                size: A4 portrait;
                margin: 15mm;
            }
            nav, aside, footer, header, .no-print, .pagination-wrapper {
                display: none !important;
            }
            body {
                background: white !important;
                -webkit-print-color-adjust: exact;
                margin: 0;
            }
            .print-container {
                box-shadow: none !important;
                border: none !important;
                padding: 0 !important;
            }
            /* Print එකේදී Table එක පැහැදිලිව පේන්න Borders */
            table { border-collapse: collapse !important; width: 100% !important; }
            th, td { border: 1px solid #e4e4e7 !important; color: black !important; }
        }

        .print-container {
            max-width: 210mm;
            margin: auto;
        }
    </style>

    <div class="print-container p-8 lg:p-12 bg-white min-h-screen flex flex-col shadow-sm border border-zinc-100 my-10">
        
        <div class="flex-grow">
            {{-- Header: Modern & Bold --}}
            <div class="flex justify-between items-start mb-10 border-b-8 border-zinc-900 pb-8">
                <div>
                    <h1 class="text-5xl font-black tracking-tighter uppercase text-zinc-900 leading-none mb-2">
                        INBIZSYS<span class="text-indigo-600">.</span>
                    </h1>
                    <p class="text-[10px] font-bold text-zinc-400 uppercase tracking-[0.5em]">
                        Enterprise Solutions & Inventory Management
                    </p>
                </div>
                <div class="text-right flex flex-col items-end">
                    <span class="bg-zinc-100 text-zinc-900 px-3 py-1 text-[10px] font-black uppercase tracking-widest border border-zinc-200">
                        Official Partners Directory
                    </span>
                    <p class="text-[10px] font-bold text-zinc-400 mt-2 tracking-widest uppercase">
                        Ref: SR-{{ now()->format('Ymd') }}
                    </p>
                </div>
            </div>

            {{-- Sub Header --}}
            <div class="flex justify-between items-center mb-6 px-1">
                <h2 class="text-xl font-black uppercase tracking-tight text-zinc-800 italic">
                    Suppliers Master List
                </h2>
                <div class="h-px bg-zinc-200 flex-grow mx-4"></div>
                <span class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">
                    Status: Verified
                </span>
            </div>
            
            {{-- Professional Table --}}
            <table class="min-w-full border-collapse border border-zinc-200">
                <thead>
                    <tr class="bg-zinc-50 text-zinc-900 uppercase text-[10px] font-black tracking-widest border-b-2 border-zinc-900">
                        <th class="px-3 py-4 border border-zinc-200 text-center w-[8%]">ID</th>
                        <th class="px-4 py-4 border border-zinc-200 text-left w-[27%]">Supplier Name</th>
                        <th class="px-4 py-4 border border-zinc-200 text-left w-[25%]">Email Address</th>
                        <th class="px-4 py-4 border border-zinc-200 text-left w-[20%]">Contact No.</th>
                        <th class="px-4 py-4 border border-zinc-200 text-left w-[20%]">Headquarters</th>
                    </tr>
                </thead>
                <tbody class="text-[11px] font-semibold uppercase tracking-tight text-zinc-700">
                    @forelse($suppliers as $supplier)
                    <tr class="border-b border-zinc-100 hover:bg-zinc-50 transition-colors">
                        <td class="px-3 py-3 border border-zinc-200 text-center text-zinc-400 font-mono italic">
                            #{{ str_pad($supplier->id, 3, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="px-4 py-3 border border-zinc-200 text-zinc-900 font-black tracking-tighter">
                            {{ $supplier->name }}
                        </td>
                        <td class="px-4 py-3 border border-zinc-200 lowercase font-bold text-zinc-500 italic">
                            {{ $supplier->email }}
                        </td>
                        <td class="px-4 py-3 border border-zinc-200 text-zinc-900 tabular-nums">
                            {{ $supplier->phone }}
                        </td>
                        <td class="px-4 py-3 border border-zinc-200 text-[10px] italic text-zinc-400 leading-tight">
                            {{ $supplier->address ?? 'N/A' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-16 text-center text-zinc-300 font-black tracking-[0.3em] uppercase">
                            No active records found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer Section (ඔයා ඉල්ලපු විදිහටම වෙනස් නොකර) --}}
        <div class="flex justify-between items-start mt-10 text-[10px] font-black uppercase tracking-widest italic border-t border-zinc-100 pt-6">
            <div class="w-1/2">
                <p class="text-zinc-500 not-italic font-bold tracking-normal">Official Report Generated On: {{ now()->toDateTimeString() }}</p>
                <p class="mt-1">Page Number: 01 / 01</p>
            </div>
            
            <div class="w-1/3 text-right">
                <div class="mb-2 h-16 border-b-2 border-dashed border-zinc-200 w-full ml-auto flex items-end justify-center text-[8px] text-zinc-300 lowercase tracking-normal not-italic font-normal">
                    (authorized seal & signature)
                </div>

                <p class="text-zinc-400 font-bold not-italic tracking-normal mt-1 text-[9px]">
                    Name: {{ auth()->user()->name ?? 'Administrator' }}
                </p>
            </div>
        </div>

        {{-- UI Controls --}}
        <div class="no-print mt-12 flex flex-col md:flex-row justify-between items-center border-t border-zinc-100 pt-8">
            <div class="pagination-wrapper">
                @if(method_exists($suppliers, 'links'))
                    {{ $suppliers->links() }}
                @endif
            </div>

            <button onclick="window.print()" class="bg-zinc-900 text-white text-[10px] font-black uppercase tracking-widest px-10 py-3 shadow-2xl hover:bg-zinc-800 transition-all flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                Print Report
            </button>
        </div>
    </div>
</x-layouts.app>