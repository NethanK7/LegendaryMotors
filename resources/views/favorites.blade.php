<x-site-layout>
    <div class="pt-48 pb-12 bg-black min-h-screen" style="padding-top: 150px;">
        <div class="container mx-auto px-6">
            <div class="flex items-end justify-between mb-12 border-l-4 border-[var(--color-accent)] pl-6">
                <div>
                     <h2 class="text-[var(--color-accent)] font-bold tracking-[0.3em] uppercase text-xs mb-2">My Garage</h2>
                    <h1 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tighter">
                        Saved Collection
                    </h1>
                </div>
                <div class="hidden md:block">
                     <p class="text-gray-400 text-sm font-bold uppercase tracking-widest">
                        Values reflected are estimated.
                    </p>
                </div>
            </div>

            @if($favorites->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($favorites as $car)
                        <div class="group relative hover-triggered cursor-pointer bg-[#0a0a0a] border border-white/5 hover:border-[var(--color-accent)] transition-all duration-500 ease-out clip-angle">
                            <!-- Image -->
                            <div class="relative aspect-[16/10] overflow-hidden bg-[#111]">
                                <img src="{{ Str::startsWith($car->image_url, 'http') ? $car->image_url : asset($car->image_url) }}" 
                                     alt="{{ $car->model }}" 
                                     class="w-full h-full object-cover transform group-hover:scale-105 group-hover:rotate-1 transition-transform duration-700 ease-out opacity-90 group-hover:opacity-100">
                                
                                <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-transparent to-transparent opacity-80 group-hover:opacity-0 transition-opacity duration-300"></div>

                                <!-- Favorite Button -->
                                <div class="absolute top-4 right-4 z-30">
                                    <livewire:favorite-button :car="$car" :wire:key="'fav-page-'.$car->id" />
                                </div>
                                
                                <!-- Price Tag -->
                                <div class="absolute top-16 right-4 bg-black/80 backdrop-blur border border-white/10 px-4 py-2 z-20">
                                    <span class="text-xs font-black text-white tracking-widest">${{ number_format($car->price) }}</span>
                                </div>
                            </div>

                            <!-- Details -->
                            <div class="p-8 relative bg-[#0a0a0a]">
                                <div class="mb-6">
                                    <div class="flex items-center gap-3 mb-2 text-[10px] font-bold text-[var(--color-accent)] uppercase tracking-[0.2em]">
                                        <span>{{ $car->brand }}</span>
                                        <span class="w-1 h-1 bg-white/20 rounded-full"></span>
                                        <span>{{ $car->year }}</span>
                                    </div>
                                    <h4 class="text-2xl font-black text-white uppercase italic tracking-tighter">
                                        {{ $car->model }}
                                    </h4>
                                </div>

                                <a href="{{ route('cars.show', $car->id) }}" class="flex items-center justify-between w-full bg-white text-black px-6 py-4 font-black uppercase text-xs tracking-[0.2em] hover:bg-[var(--color-accent)] hover:text-white transition-all duration-300 clip-angle">
                                    <span>Configure</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="py-32 flex flex-col items-center justify-center border border-dashed border-white/10 rounded-lg">
                    <svg class="w-16 h-16 text-gray-700 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    <h3 class="text-2xl font-black text-white uppercase mb-2">Collection Empty</h3>
                    <p class="text-gray-500 text-sm tracking-widest">Start curating your dream garage.</p>
                    <a href="{{ route('inventory') }}" class="mt-8 text-[var(--color-accent)] font-bold uppercase text-xs hover:text-white transition-colors">Browse Inventory</a>
                </div>
            @endif
        </div>
    </div>
</x-site-layout>
