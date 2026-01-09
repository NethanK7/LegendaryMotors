<x-site-layout>
    <div class="pt-48 pb-12 bg-black min-h-screen text-white" style="padding-top: 150px;">
        <div class="container mx-auto px-6">
            
            <!-- Admin Header -->
            <div class="flex flex-col md:flex-row items-end justify-between mb-16 border-b border-white/10 pb-8">
                <div>
                     <div class="flex items-center gap-3 mb-2">
                        <span class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></span>
                        <span class="text-[var(--color-accent)] font-bold tracking-[0.3em] uppercase text-xs">Live Command Center</span>
                     </div>
                    <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter">
                        Admin Overview
                    </h1>
                </div>
                <div class="flex gap-4 mt-8 md:mt-0">
                    <a href="{{ route('admin.cars.index') }}" class="group relative bg-[#111] border border-white/20 text-white px-8 py-4 overflow-hidden transition-all hover:bg-white hover:text-black hover:border-white">
                        <span class="relative z-10 font-bold uppercase text-xs tracking-[0.2em] flex items-center gap-3">
                            Inventory
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Stats Grid - Cinematic Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-16">
                <!-- Stat Card 1 -->
                <div class="bg-[#0a0a0a] border border-white/10 p-8 relative overflow-hidden group hover:border-[var(--color-accent)] transition-all duration-300">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-[0.2em] mb-4">Total Inventory</p>
                    <p class="text-5xl font-black text-white font-tech tracking-tighter">{{ $stats['total_cars'] }}</p>
                    <div class="mt-4 h-1 w-full bg-white/5">
                        <div class="h-full bg-[var(--color-accent)] w-3/4"></div>
                    </div>
                </div>

                <!-- Stat Card 2 -->
                <div class="bg-[#0a0a0a] border border-white/10 p-8 relative overflow-hidden group hover:border-[var(--color-accent)] transition-all duration-300">
                     <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-[0.2em] mb-4">Registered Users</p>
                    <p class="text-5xl font-black text-white font-tech tracking-tighter">{{ $stats['total_users'] }}</p>
                    <div class="mt-4 h-1 w-full bg-white/5">
                        <div class="h-full bg-white w-1/2"></div>
                    </div>
                </div>

                <!-- Stat Card 3 -->
                <div class="bg-[#0a0a0a] border border-white/10 p-8 relative overflow-hidden group hover:border-[var(--color-accent)] transition-all duration-300">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-[0.2em] mb-4">Requests</p>
                    <p class="text-5xl font-black text-white font-tech tracking-tighter">{{ $stats['total_allocations'] }}</p>
                     <div class="mt-4 h-1 w-full bg-white/5">
                        <div class="h-full bg-blue-500 w-2/3"></div>
                    </div>
                </div>

                <!-- Stat Card 4 (Cash) -->
                <div class="bg-[#0a0a0a] border border-green-900/30 p-8 relative overflow-hidden group hover:border-green-500 transition-all duration-300">
                     <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity text-green-500">
                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-green-500 text-[10px] font-bold uppercase tracking-[0.2em] mb-4">Deposits Held</p>
                    <p class="text-4xl font-black text-white font-tech tracking-tighter">${{ number_format($stats['deposits_collected'] / 1000) }}<span class="text-2xl text-gray-500">k</span></p>
                    <div class="mt-4 h-1 w-full bg-white/5">
                        <div class="h-full bg-green-500 w-full animate-pulse"></div>
                    </div>
                </div>

                <!-- Stat Card 5 (Revenue) -->
                <div class="bg-[#0a0a0a] border border-white/10 p-8 relative overflow-hidden group hover:border-[var(--color-accent)] transition-all duration-300">
                     <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-[0.2em] mb-4">Pipeline Value</p>
                    <p class="text-3xl font-black text-[var(--color-accent)] font-tech tracking-tighter">${{ number_format($stats['revenue'] / 1000000, 1) }}<span class="text-xl text-white">M</span></p>
                    <div class="mt-4 h-1 w-full bg-white/5">
                         <div class="h-full bg-[var(--color-accent)] w-1/2"></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Recent Allocations Table -->
                <div class="lg:col-span-2 bg-[#0a0a0a] border border-white/10">
                    <div class="p-8 border-b border-white/10 flex justify-between items-center">
                        <h3 class="text-lg font-black uppercase tracking-widest flex items-center gap-3">
                            <span class="w-1 h-6 bg-[var(--color-accent)]"></span>
                            Recent Inquiries
                        </h3>
                        <button class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-500 hover:text-white transition-colors">View All</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-white/5 text-gray-500 text-[10px] uppercase tracking-[0.2em]">
                                    <th class="py-4 px-6 font-bold">Client</th>
                                    <th class="py-4 px-6 font-bold">Build Configuration</th>
                                    <th class="py-4 px-6 font-bold">Date</th>
                                    <th class="py-4 px-6 font-bold text-center">Status</th>
                                    <th class="py-4 px-6 font-bold text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs divide-y divide-white/5">
                                @foreach($recent_allocations as $allocation)
                                <tr class="group hover:bg-white/5 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-white">{{ $allocation->user->name }}</div>
                                        <div class="text-[9px] text-gray-500 mt-1">{{ $allocation->user->email }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            @if($allocation->car->image_url)
                                                <div class="w-12 h-8 bg-gray-800 rounded-sm overflow-hidden">
                                                    <img src="{{ Str::startsWith($allocation->car->image_url, 'http') ? $allocation->car->image_url : asset($allocation->car->image_url) }}" class="w-full h-full object-cover">
                                                </div>
                                            @endif
                                            <div>
                                                <span class="block font-bold text-white">{{ $allocation->car->model }}</span>
                                                <span class="block text-[9px] text-[var(--color-accent)] font-mono">{{ $allocation->configuration['color'] ?? 'Custom' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-gray-400 font-mono">{{ $allocation->created_at->format('M d, H:i') }}</td>
                                    <td class="py-4 px-6 text-center">
                                        @if($allocation->status == 'reserved')
                                            <span class="inline-block bg-[var(--color-accent)]/20 text-[var(--color-accent)] px-2 py-1 text-[9px] font-bold uppercase tracking-wider border border-[var(--color-accent)]/30 rounded-sm">Reserved</span>
                                        @elseif($allocation->status == 'paid')
                                            <span class="inline-block bg-green-500/20 text-green-500 px-2 py-1 text-[9px] font-bold uppercase tracking-wider border border-green-500/30 rounded-sm">Paid</span>
                                        @else
                                            <span class="inline-block bg-white/10 text-gray-400 px-2 py-1 text-[9px] font-bold uppercase tracking-wider border border-white/10 rounded-sm">{{ $allocation->status }}</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <button class="text-gray-500 hover:text-white transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Admin Tools Sidebar -->
                <div class="space-y-6">
                    <!-- System Status -->
                    <div class="bg-[#0a0a0a] border border-white/10 p-6">
                         <h4 class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] mb-4">System Status</h4>
                         <div class="space-y-4">
                             <div class="flex justify-between items-center">
                                 <span class="text-xs font-bold text-white">Database</span>
                                 <div class="flex items-center gap-2">
                                     <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                     <span class="text-[10px] text-green-500 font-bold uppercase">Operational</span>
                                 </div>
                             </div>
                             <div class="flex justify-between items-center">
                                 <span class="text-xs font-bold text-white">Payments (Stripe)</span>
                                 <div class="flex items-center gap-2">
                                     <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                     <span class="text-[10px] text-green-500 font-bold uppercase">Live</span>
                                 </div>
                             </div>
                             <div class="flex justify-between items-center">
                                 <span class="text-xs font-bold text-white">Notifications</span>
                                 <div class="flex items-center gap-2">
                                     <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                     <span class="text-[10px] text-green-500 font-bold uppercase">Active</span>
                                 </div>
                             </div>
                         </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-[var(--color-accent)] p-8 relative overflow-hidden group hover:bg-white hover:text-black transition-colors duration-500 cursor-pointer">
                        <div class="relative z-10">
                            <h4 class="text-2xl font-black uppercase italic tracking-tighter mb-2">New Vehicle</h4>
                            <p class="text-xs font-bold opacity-80 mb-6 w-3/4 leading-relaxed">Add a new Brabus masterpiece to the public inventory.</p>
                            <a href="{{ route('admin.cars.create') }}" class="inline-block bg-black text-white px-6 py-3 text-[10px] font-bold uppercase tracking-[0.2em] group-hover:bg-[var(--color-accent)] transition-colors">
                                Launch Creator
                            </a>
                        </div>
                         <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-black opacity-10 rounded-full blur-xl group-hover:scale-150 transition-transform"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-site-layout>
