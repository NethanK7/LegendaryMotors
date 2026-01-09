<x-app-layout>
    <div class="bg-black min-h-screen text-white pt-24 pb-12">
        <div class="container mx-auto px-6">
            
            <!-- Header -->
            <div class="mb-12 border-l-4 border-[var(--color-accent)] pl-6 flex items-end justify-between">
                <div>
                    <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter mb-2">
                        Command Center
                    </h1>
                    <p class="text-gray-400 font-bold uppercase tracking-[0.2em] text-sm">
                        Legendary Motors Administration
                    </p>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-[var(--color-accent)] font-bold uppercase tracking-widest text-xs hover:text-white transition-colors">
                            Logout System
                        </button>
                    </form>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="bg-[#111] border border-white/10 p-8">
                    <span class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Total Inventory</span>
                    <span class="text-4xl font-black text-white">{{ $totalCars }} <span class="text-sm text-[var(--color-accent)]">UNITS</span></span>
                </div>
                <div class="bg-[#111] border border-white/10 p-8">
                    <span class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Registered Clients</span>
                    <span class="text-4xl font-black text-white">{{ $totalUsers }}</span>
                </div>
                <div class="bg-[#111] border border-white/10 p-8">
                     <span class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Pending Requests</span>
                    <span class="text-4xl font-black text-white">0</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Quick Actions -->
                <div>
                    <h3 class="text-xl font-bold uppercase mb-6 flex items-center gap-3">
                        <span class="w-2 h-2 bg-[var(--color-accent)] rounded-full"></span>
                        Management
                    </h3>
                    <div class="space-y-4">
                        <button class="w-full py-4 bg-white/5 border border-white/10 text-left px-6 hover:bg-[var(--color-accent)] hover:border-[var(--color-accent)] transition-all group">
                            <span class="block font-bold uppercase text-sm group-hover:text-white">Add New Vehicle</span>
                            <span class="block text-[10px] text-gray-500 tracking-widest uppercase group-hover:text-white/80">Inventory Management</span>
                        </button>
                         <button class="w-full py-4 bg-white/5 border border-white/10 text-left px-6 hover:bg-[var(--color-accent)] hover:border-[var(--color-accent)] transition-all group">
                            <span class="block font-bold uppercase text-sm group-hover:text-white">View Allocation Requests</span>
                            <span class="block text-[10px] text-gray-500 tracking-widest uppercase group-hover:text-white/80">Sales Management</span>
                        </button>
                    </div>
                </div>

                <!-- Recent Inventory -->
                <div>
                     <h3 class="text-xl font-bold uppercase mb-6 flex items-center gap-3">
                        <span class="w-2 h-2 bg-[var(--color-accent)] rounded-full"></span>
                        Recent Additions
                    </h3>
                    <div class="bg-[#111] border border-white/10">
                        @foreach($recentCars as $car)
                        <div class="flex items-center justify-between p-4 border-b border-white/5 last:border-0 hover:bg-white/5 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-8 bg-black overflow-hidden">
                                     <img src="{{ Str::startsWith($car->image_url, 'http') ? $car->image_url : asset($car->image_url) }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <span class="block text-xs font-bold uppercase text-white">{{ $car->model }}</span>
                                    <span class="block text-[9px] font-bold text-gray-500 uppercase tracking-widest">{{ $car->brand }}</span>
                                </div>
                            </div>
                            <span class="text-[10px] font-bold text-[var(--color-accent)] uppercase tracking-widest">${{ number_format($car->price) }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
