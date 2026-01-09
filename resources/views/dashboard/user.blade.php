<x-site-layout>
    <div class="bg-black min-h-screen text-white pt-48 pb-12" style="padding-top: 150px;">
        <div class="container mx-auto px-6">
            
            <!-- Welcome Header -->
            <div class="mb-16 flex flex-col md:flex-row items-end justify-between border-b border-white/10 pb-8">
                <div>
                    <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter mb-2">
                        My Garage
                    </h1>
                    <p class="text-[var(--color-accent)] font-bold uppercase tracking-[0.2em] text-sm">
                        Concierge Dashboard • {{ Auth::user()->name }}
                    </p>
                </div>
                <div class="mt-6 md:mt-0 flex gap-4">
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="border border-white/20 px-6 py-3 text-xs font-bold uppercase tracking-widest hover:bg-white hover:text-black transition-all">
                            Sign Out
                        </button>
                    </form>
                    <a href="{{ route('profile.show') }}" class="bg-white text-black px-6 py-3 text-xs font-bold uppercase tracking-widest hover:bg-[var(--color-accent)] hover:text-white transition-all">
                        Settings
                    </a>
                </div>
            </div>

            <!-- Status Messages -->
            @if (session('status'))
                <div class="mb-12 bg-green-500/10 border border-green-500/20 text-green-500 p-6 font-bold uppercase tracking-wide text-sm flex items-center gap-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('status') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Main Column: Allocations & Favorites (Span 8) -->
                <div class="lg:col-span-8 space-y-16">
                    
                    <!-- Active Allocations Section -->
                    <section>
                        <h3 class="text-xl font-black uppercase mb-8 flex items-center gap-3 tracking-wide">
                            <span class="w-2 h-8 bg-[var(--color-accent)]"></span>
                            Active Allocations
                        </h3>

                        @if(Auth::user()->allocations->count() > 0)
                            <div class="space-y-6">
                                @foreach(Auth::user()->allocations as $allocation)
                                    <div class="bg-[#0a0a0a] border border-white/10 group hover:border-white/30 transition-all duration-500 overflow-hidden relative">
                                        <div class="flex flex-col md:flex-row">
                                            <!-- Image -->
                                            <div class="md:w-1/3 relative h-48 md:h-auto overflow-hidden">
                                                <img src="{{ Str::startsWith($allocation->car->image_url, 'http') ? $allocation->car->image_url : asset($allocation->car->image_url) }}" 
                                                     class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-700" 
                                                     alt="{{ $allocation->car->model }}">
                                                <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-transparent"></div>
                                            </div>
                                            
                                            <!-- Details -->
                                            <div class="p-8 md:w-2/3 flex flex-col justify-between relative">
                                                <!-- Status Badge -->
                                                <div class="absolute top-8 right-8">
                                                    <span class="bg-[var(--color-accent)]/20 text-[var(--color-accent)] border border-[var(--color-accent)]/30 px-3 py-1 text-[10px] uppercase font-bold tracking-widest">
                                                        {{ $allocation->status }}
                                                    </span>
                                                </div>

                                                <div>
                                                    <div class="text-[10px] text-gray-500 font-bold uppercase tracking-[0.2em] mb-2">
                                                        Ref: #{{ $allocation->id }}-{{ Str::upper(Str::random(4)) }}
                                                    </div>
                                                    <h3 class="text-2xl font-black text-white uppercase italic tracking-tighter mb-1">
                                                        {{ $allocation->car->model }}
                                                    </h3>
                                                    <p class="text-sm text-gray-400 font-bold uppercase tracking-wider mb-6">
                                                        {{ $allocation->car->year }} {{ $allocation->car->brand }}
                                                    </p>
                                                    
                                                    <!-- Config Summary -->
                                                    <div class="flex gap-4 text-[10px] text-gray-500 uppercase tracking-wider border-t border-white/5 pt-4">
                                                        <div>
                                                            <span class="block text-gray-700">Paint</span>
                                                            <span class="text-gray-300">{{ $allocation->configuration['color'] ?? 'Standard' }}</span>
                                                        </div>
                                                        <div class="w-[1px] bg-white/10"></div>
                                                        <div>
                                                            <span class="block text-gray-700">Wheels</span>
                                                            <span class="text-gray-300">{{ $allocation->configuration['rims'] ?? 'Standard' }}</span>
                                                        </div>
                                                         <div class="w-[1px] bg-white/10"></div>
                                                        <div>
                                                            <span class="block text-gray-700">Kit</span>
                                                            <span class="text-gray-300">{{ $allocation->configuration['kit'] ?? 'Standard' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                             <div class="py-16 border border-dashed border-white/10 flex flex-col items-center justify-center text-center bg-white/5">
                                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mb-4">Your garage is currently empty.</p>
                                <a href="{{ route('inventory') }}" class="text-[var(--color-accent)] text-xs font-black uppercase tracking-[0.2em] hover:text-white transition-colors border-b border-[var(--color-accent)] pb-1">
                                    Start Configuration
                                </a>
                            </div>
                        @endif
                    </section>
                </div>

                <!-- Sidebar: Profile & Quick Stats (Span 4) -->
                <div class="lg:col-span-4 space-y-8">
                    
                    <!-- Profile Widget -->
                    <div class="bg-[#0a0a0a] border border-white/10 p-8">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center text-2xl font-black uppercase">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div>
                                <h4 class="font-bold uppercase text-white tracking-wider">{{ Auth::user()->name }}</h4>
                                <p class="text-[10px] text-gray-500 uppercase tracking-widest">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                         <div class="grid grid-cols-2 gap-4 border-t border-white/10 pt-6">
                            <div>
                                <span class="block text-2xl font-black text-white font-tech">{{ Auth::user()->allocations->count() }}</span>
                                <span class="text-[10px] text-gray-500 uppercase tracking-widest">Active Builds</span>
                            </div>
                            <div>
                                <span class="block text-2xl font-black text-white font-tech">{{ Auth::user()->favorites->count() }}</span>
                                <span class="text-[10px] text-gray-500 uppercase tracking-widest">Saved</span>
                            </div>
                        </div>
                    </div>

                    <!-- Favorites Widget -->
                    <div class="bg-[#0a0a0a] border border-white/10 p-8">
                        <div class="flex items-center justify-between mb-6">
                             <h4 class="font-bold uppercase text-gray-400 text-xs tracking-[0.2em]">Saved Collection</h4>
                             <a href="{{ route('favorites.index') }}" class="text-[10px] text-[var(--color-accent)] font-bold uppercase hover:text-white transition-colors">View All</a>
                        </div>
                        
                        @if(Auth::user()->favorites->count() > 0)
                            <div class="space-y-4">
                                @foreach(Auth::user()->favorites->take(3) as $car)
                                    <a href="{{ route('cars.show', $car->id) }}" class="flex items-center gap-4 group">
                                        <div class="w-20 h-12 bg-[#111] overflow-hidden">
                                             <img src="{{ Str::startsWith($car->image_url, 'http') ? $car->image_url : asset($car->image_url) }}" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition-opacity">
                                        </div>
                                        <div>
                                            <div class="text-[10px] text-gray-500 uppercase font-bold">{{ $car->brand }}</div>
                                            <div class="text-xs text-white font-bold uppercase group-hover:text-[var(--color-accent)] transition-colors">{{ $car->model }}</div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                             <p class="text-[10px] text-gray-600 uppercase tracking-wide">No saved vehicles.</p>
                        @endif
                    </div>

                     <!-- Concierge Support -->
                    <div class="bg-[var(--color-accent)] p-8 text-white relative overflow-hidden group">
                        <div class="relative z-10">
                            <h4 class="font-black uppercase italic text-2xl mb-2 tracking-tighter">Concierge</h4>
                            <p class="text-xs font-medium opacity-80 mb-6 leading-relaxed">Prioritized support for all garage members. Contact us for custom allocation requests.</p>
                            <a href="{{ route('contact') }}" class="inline-block bg-black text-white px-6 py-3 text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-white hover:text-black transition-colors">
                                Contact Now
                            </a>
                        </div>
                        <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-black opacity-10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-site-layout>
