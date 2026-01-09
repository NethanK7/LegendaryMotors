<x-site-layout>
    <!-- Cinematic Hero Section -->
    <div class="relative h-[85vh] w-full bg-black overflow-hidden flex flex-col justify-end pb-16 group">
        <!-- Background Asset -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/brabus/inventory_hero.png') }}" 
                 alt="Luxury Showroom" 
                 class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-[3000ms] ease-out">
            <div class="absolute inset-0 bg-gradient-to-b from-white/90 dark:from-black/60 via-transparent to-black"></div>
            <div class="absolute inset-x-0 bottom-0 h-[30rem] bg-gradient-to-t from-black via-black/90 to-transparent"></div>
            <!-- Grid Pattern Overlay -->
            <div class="absolute inset-0 bg-grid-pattern opacity-20 pointer-events-none"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 container mx-auto px-6 mb-12 border-l-4 border-[var(--color-accent)] pl-8">
            <div class="overflow-hidden mb-2">
                <h2 class="text-[var(--color-accent)] font-tech text-base md:text-lg font-bold uppercase tracking-[0.3em] animate-fade-in-up">
                    Legendary Exclusives
                </h2>
            </div>
            <h1 class="text-6xl md:text-8xl lg:text-9xl font-black text-white uppercase tracking-tighter leading-none animate-fade-in-up delay-100">
                The Collection
            </h1>
            <div class="h-1 w-32 bg-white/20 mt-8 mb-8 backdrop-blur"></div>
            <p class="text-gray-400 max-w-xl font-light text-lg md:text-xl animate-fade-in-up delay-200 leading-relaxed">
                Engineering perfection meets unrestrained power. Browse our available inventory of modified supercars.
            </p>
        </div>
    </div>

    <!-- Tech Filter Bar (Sticky) -->
    <div class="sticky top-20 z-40 bg-black/90 backdrop-blur-xl border-y border-white/10 shadow-2xl transition-all duration-300">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center justify-between py-5 gap-4">
                <!-- Categories -->
                <nav class="flex space-x-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 no-scrollbar">
                    @foreach(['all' => 'All Models', 'supercar' => 'Supercars', 'suv' => 'SUVs', 'motorbike' => 'Motorbikes', 'luxury' => 'Luxury'] as $key => $label)
                        <a href="{{ route('inventory', ['category' => $key]) }}" 
                           class="relative group px-6 py-3 clip-angle transition-all duration-300 {{ request('category', 'all') == $key ? 'bg-white text-black' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                            <span class="text-xs font-black uppercase tracking-[0.15em] relative z-10">
                                {{ $label }}
                            </span>
                             <!-- Active Indicator Accent Corner -->
                            @if(request('category', 'all') == $key)
                                <div class="absolute top-0 right-0 w-3 h-3 bg-[var(--color-accent)]"></div>
                            @endif
                        </a>
                    @endforeach
                </nav>
                
                <!-- Stats / Sort -->
                <div class="flex items-center gap-8">
                    <div class="hidden md:flex flex-col items-end">
                        <span class="text-[10px] text-[var(--color-accent)] font-bold uppercase tracking-widest">Available</span>
                        <span class="text-xl font-black text-white font-tech leading-none">{{ count($cars) }} <span class="text-xs text-gray-500 font-sans tracking-normal">UNITS</span></span>
                    </div>
                    <div class="h-8 w-[1px] bg-white/10 hidden md:block"></div>
                    <button class="flex items-center gap-3 text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-colors group">
                        Sort List
                        <div class="p-2 bg-white/5 group-hover:bg-[var(--color-accent)] group-hover:text-white transition-colors">
                             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inventory Grid -->
    <section class="bg-[#050505] min-h-screen py-12 md:py-24 bg-grid-pattern relative">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($cars as $car)
                <div class="group relative hover-triggered cursor-pointer bg-[#0a0a0a] border border-white/5 hover:border-[var(--color-accent)] transition-all duration-500 ease-out clip-angle">
                    <!-- Image -->
                    <div class="relative aspect-[16/10] overflow-hidden bg-[#111]">
                        <img src="{{ Str::startsWith($car->image_url, 'http') ? $car->image_url : asset($car->image_url) }}" 
                             alt="{{ $car->model }}" 
                             class="w-full h-full object-cover transform group-hover:scale-105 group-hover:rotate-1 transition-transform duration-700 ease-out opacity-90 group-hover:opacity-100">
                        
                        <!-- Top Gradient for Header Visibility -->
                        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-transparent to-transparent opacity-80 group-hover:opacity-0 transition-opacity duration-300"></div>
                        
                        <!-- Status Badge -->
                         @if($car->status !== 'available')
                            <div class="absolute top-4 left-4 bg-[#222] text-gray-400 text-[10px] font-bold uppercase px-3 py-1 tracking-widest z-20">
                                {{ $car->status }}
                            </div>
                        @else
                             <div class="absolute top-4 left-4 bg-[var(--color-accent)] text-white text-[10px] font-bold uppercase px-3 py-1 tracking-widest z-20">
                                In Stock
                            </div>
                        @endif

                        <!-- Favorite Button -->
                        <div class="absolute top-4 right-4 z-30">
                            <livewire:favorite-button :car="$car" :wire:key="'inventory-fav-'.$car->id" />
                        </div>
                        
                        <!-- Price Tag (Floating - Moved below favorite) -->
                        <div class="absolute top-16 right-4 bg-black/80 backdrop-blur border border-white/10 px-4 py-2 z-20">
                            <span class="text-xs font-black text-white tracking-widest">${{ number_format($car->price) }}</span>
                        </div>
                    </div>

                    <!-- Details Panel -->
                    <div class="p-8 relative bg-[#0a0a0a]">
                        <!-- Model Info -->
                        <div class="mb-6">
                            <div class="flex items-center gap-3 mb-2 text-[10px] font-bold text-[var(--color-accent)] uppercase tracking-[0.2em]">
                                <span>{{ $car->brand }}</span>
                                <span class="w-1 h-1 bg-white/20 rounded-full"></span>
                                <span>{{ $car->year }}</span>
                            </div>
                            <h4 class="text-2xl font-black text-white uppercase italic tracking-tighter group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-white group-hover:to-gray-500 transition-all duration-300">
                                {{ $car->model }}
                            </h4>
                        </div>

                        <!-- Specs Grid -->
                        <div class="grid grid-cols-3 gap-px bg-white/5 border border-white/5 mb-6">
                            <div class="py-3 text-center bg-[#0a0a0a] group-hover:bg-white/5 transition-colors">
                                <span class="block text-[9px] text-gray-500 uppercase tracking-widest mb-1">Power</span>
                                <span class="block text-xs font-bold text-white font-tech">{{ $car->specs['hp'] ?? '-' }} <span class="text-[9px] text-gray-600">HP</span></span>
                            </div>
                            <div class="py-3 text-center bg-[#0a0a0a] group-hover:bg-white/5 transition-colors border-l border-white/5">
                                <span class="block text-[9px] text-gray-500 uppercase tracking-widest mb-1">0-60</span>
                                <span class="block text-xs font-bold text-white font-tech">{{ $car->specs['0_60'] ?? '-' }} <span class="text-[9px] text-gray-600">S</span></span>
                            </div>
                            <div class="py-3 text-center bg-[#0a0a0a] group-hover:bg-white/5 transition-colors border-l border-white/5">
                                <span class="block text-[9px] text-gray-500 uppercase tracking-widest mb-1">V-Max</span>
                                <span class="block text-xs font-bold text-white font-tech">{{ $car->specs['top_speed'] ?? '-' }}</span>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <a href="{{ route('cars.show', $car->id) }}" class="flex items-center justify-between w-full bg-white text-black px-6 py-4 font-black uppercase text-xs tracking-[0.2em] hover:bg-[var(--color-accent)] hover:text-white transition-all duration-300 clip-angle group-hover:translate-x-1 group-hover:-translate-y-1">
                            <span>{{ auth()->user()?->is_admin ? 'View Details' : 'Configure' }}</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 py-32 flex flex-col items-center justify-center border border-dashed border-white/10 rounded-lg">
                    <svg class="w-16 h-16 text-gray-700 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    <h3 class="text-2xl font-black text-white uppercase mb-2">Inventory Depleted</h3>
                    <p class="text-gray-500 text-sm tracking-widest">No vehicles match current criteria.</p>
                    <a href="{{ route('inventory') }}" class="mt-8 text-[var(--color-accent)] font-bold uppercase text-xs hover:text-white transition-colors">Clear Filters</a>
                </div>
                @endforelse
            </div>
            
            <div class="mt-24 text-center">
                 <button class="inline-block border border-white/10 hover:border-[var(--color-accent)] text-gray-400 hover:text-white font-bold uppercase text-[10px] tracking-[0.3em] px-12 py-5 transition-all duration-300 bg-white/5 hover:bg-black">
                    Load Archive
                </button>
            </div>
        </div>
    </section>
</x-site-layout>
