<x-site-layout>
    <div class="bg-black min-h-screen text-white pt-32 pb-12">
        <div class="container mx-auto px-6">
            
            <!-- Header -->
            <div class="mb-12 border-l-4 border-[var(--color-accent)] pl-6 flex items-end justify-between">
                <div>
                    <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter mb-2">
                        My Garage
                    </h1>
                    <p class="text-gray-400 font-bold uppercase tracking-[0.2em] text-sm">
                        Welcome back, {{ Auth::user()->name }}
                    </p>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-[var(--color-accent)] font-bold uppercase tracking-widest text-xs hover:text-white transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Status Messages -->
            @if (session('status'))
                <div class="mb-8 bg-[var(--color-accent)]/10 border border-[var(--color-accent)] text-[var(--color-accent)] p-4 font-bold uppercase tracking-wide text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Profile Card -->
                <div class="bg-[#111] border border-white/10 p-8 h-fit">
                    <div class="w-24 h-24 bg-[var(--color-accent)] rounded-full flex items-center justify-center text-4xl font-black mb-6 text-black">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <h3 class="text-xl font-bold uppercase mb-1">{{ Auth::user()->name }}</h3>
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-6">{{ Auth::user()->email }}</p>
                    <a href="{{ route('profile.show') }}" class="block w-full text-center py-3 border border-white/10 text-xs font-bold uppercase tracking-widest hover:bg-white hover:text-black transition-colors">
                        Edit Profile
                    </a>
                </div>

                <!-- Recent Activity / Allocation Status -->
                <div class="col-span-2 bg-[#111] border border-white/10 p-8">
                    <h3 class="text-xl font-bold uppercase mb-8 flex items-center gap-3">
                        <span class="w-2 h-2 bg-[var(--color-accent)] rounded-full"></span>
                        Allocation Status
                    </h3>

                    @if(Auth::user()->allocations->count() > 0)
                        <div class="space-y-4">
                            @foreach(Auth::user()->allocations as $allocation)
                                <div class="bg-white/5 border border-white/10 p-6 flex flex-col md:flex-row justify-between items-center gap-4">
                                    <div class="flex items-center gap-4">
                                        @if($allocation->car->image_url)
                                            <div class="w-24 h-16 bg-gray-800 overflow-hidden relative">
                                                <img src="{{ $allocation->car->image_url }}" class="w-full h-full object-cover opacity-80" alt="{{ $allocation->car->model }}">
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="text-white font-bold text-lg leading-none mb-1">
                                                {{ $allocation->car->year }} {{ $allocation->car->brand }} {{ $allocation->car->model }}
                                            </h4>
                                            <div class="flex items-center gap-3">
                                                 <p class="text-gray-400 text-xs uppercase tracking-wider">Status: <span class="text-[var(--color-accent)]">{{ $allocation->status }}</span></p>
                                                 <span class="text-gray-600 text-[10px] uppercase">|</span>
                                                 <p class="text-gray-500 text-[10px] uppercase tracking-wider">Ref: #{{ $allocation->id }}-{{ Str::upper(Str::random(4)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('cars.show', $allocation->car_id) }}" class="text-xs font-bold uppercase border border-white/20 py-2 px-4 hover:bg-white hover:text-black transition-colors">
                                            View Vehicle
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Empty State -->
                         <div class="flex flex-col items-center justify-center py-12 border border-dashed border-white/10">
                            <svg class="w-12 h-12 text-gray-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            <p class="text-gray-500 font-bold uppercase tracking-widest text-xs">No Active Allocations</p>
                            <a href="{{ route('inventory') }}" class="mt-4 text-[var(--color-accent)] text-xs font-bold uppercase hover:text-white">Start Configuration</a>
                        </div>
                    @endif
                </div>

                <!-- Wishlist Section -->
                <div class="col-span-1 md:col-span-3 lg:col-span-3 bg-[#111] border border-white/10 p-8 mt-8">
                    <h3 class="text-xl font-bold uppercase mb-8 flex items-center gap-3">
                        <svg class="w-5 h-5 text-[var(--color-accent)]" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        Saved Vehicles
                    </h3>

                    @if(Auth::user()->favorites->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach(Auth::user()->favorites as $car)
                                <div class="bg-white/5 border border-white/10 group relative hover:border-[var(--color-accent)] transition-colors">
                                    <div class="aspect-video bg-[#111] relative overflow-hidden">
                                        <img src="{{ $car->image_url }}" alt="{{ $car->model }}" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                                        
                                        <!-- Remove Button (Unfavorite) -->
                                        <div class="absolute top-2 right-2 z-10">
                                            <livewire:favorite-button :car="$car" :wire:key="'dashboard-fav-'.$car->id" />
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <h4 class="text-white font-bold text-sm uppercase mb-1">{{ $car->year }} {{ $car->brand }} {{ $car->model }}</h4>
                                        <div class="flex justify-between items-end mt-4">
                                            <span class="text-[var(--color-accent)] font-tech font-bold text-lg">${{ number_format($car->price) }}</span>
                                            <a href="{{ route('cars.show', $car->id) }}" class="text-[10px] font-bold uppercase tracking-widest bg-white text-black py-2 px-4 hover:bg-[var(--color-accent)] hover:text-white transition-colors">
                                                Configure
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">You haven't saved any vehicles yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
