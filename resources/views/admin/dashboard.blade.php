<x-site-layout>
    <div class="pt-48 pb-12 bg-black min-h-screen text-white" style="padding-top: 150px;">
        <div class="container mx-auto px-6">
            
            <!-- Admin Header -->
            <div class="flex flex-col md:flex-row items-end justify-between mb-12 border-b border-white/10 pb-8">
                <div>
                     <span class="text-[var(--color-accent)] font-bold tracking-[0.3em] uppercase text-xs mb-2 block">Command Center</span>
                    <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tighter">
                        Admin Dashboard
                    </h1>
                </div>
                <div class="flex gap-4 mt-6 md:mt-0">
                    <a href="{{ route('admin.cars.index') }}" class="bg-white text-black px-6 py-3 font-bold uppercase text-xs tracking-widest hover:bg-[var(--color-accent)] hover:text-white transition-colors">
                        Manage Inventory
                    </a>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="bg-[#111] border border-white/10 p-6">
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Total Inventory</p>
                    <p class="text-4xl font-black text-white font-tech">{{ $stats['total_cars'] }}</p>
                </div>
                <div class="bg-[#111] border border-white/10 p-6">
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Total Users</p>
                    <p class="text-4xl font-black text-white font-tech">{{ $stats['total_users'] }}</p>
                </div>
                <div class="bg-[#111] border border-white/10 p-6">
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Ref Requests</p>
                    <p class="text-4xl font-black text-white font-tech">{{ $stats['total_allocations'] }}</p>
                </div>
                <div class="bg-[#111] border border-white/10 p-6">
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Potential Value</p>
                    <p class="text-4xl font-black text-[var(--color-accent)] font-tech">${{ number_format($stats['revenue']) }}</p>
                </div>
            </div>

            <!-- Recent Allocations -->
            <div class="bg-[#111] border border-white/10 p-8">
                <h3 class="text-xl font-bold uppercase mb-6 flex items-center gap-3">
                    Recent Requests
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-white/10 text-gray-500 text-xs uppercase tracking-widest">
                                <th class="pb-4">User</th>
                                <th class="pb-4">Vehicle</th>
                                <th class="pb-4">Date</th>
                                <th class="pb-4">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach($recent_allocations as $allocation)
                            <tr class="border-b border-white/5 last:border-0 hover:bg-white/5 transition-colors">
                                <td class="py-4 font-bold">{{ $allocation->user->name }}</td>
                                <td class="py-4 text-gray-400">{{ $allocation->car->year }} {{ $allocation->car->model }}</td>
                                <td class="py-4 text-gray-500">{{ $allocation->created_at->format('M d, Y') }}</td>
                                <td class="py-4">
                                    <span class="bg-white/10 px-2 py-1 text-[10px] uppercase font-bold tracking-wider text-white">{{ $allocation->status }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-site-layout>
