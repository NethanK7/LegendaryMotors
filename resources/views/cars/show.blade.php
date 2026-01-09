<x-site-layout>
    <div class="bg-black text-white min-h-screen pb-24 relative overflow-hidden">
        <!-- Background Ambient Glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] bg-[var(--color-accent)] opacity-10 blur-[150px] pointer-events-none rounded-full"></div>

        <div class="container mx-auto px-6 relative z-10">
            
            <!-- Breadcrumbs / Top Nav -->
            <div class="pt-8 pb-12 flex justify-between items-center">
                <a href="{{ route('inventory') }}" class="text-gray-500 hover:text-white text-[10px] font-bold uppercase tracking-[0.2em] transition-colors flex items-center gap-3 group">
                    <span class="w-8 h-[1px] bg-gray-700 group-hover:bg-white transition-colors"></span>
                    Back to Inventory
                </a>
                <span class="text-[10px] font-bold text-[var(--color-accent)] uppercase tracking-[0.2em]">Configurator Active</span>
            </div>

            <!-- Header Section -->
            <div class="mb-20 text-center relative">
                <h1 class="text-5xl md:text-8xl font-black uppercase italic tracking-tighter mb-4 text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-600">
                    {{ $car->model }}
                </h1>
                <p class="text-[var(--color-accent)] font-bold tracking-[0.4em] uppercase text-xs md:text-sm">
                    {{ $car->brand }} {{ $car->year }}
                </p>
            </div>

            <!-- Car Configuration Section (Livewire) -->
            <div class="mb-32">
                <livewire:car-configurator :car="$car" />
            </div>

            <!-- Editorial Content Section -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 border-t border-white/5 pt-20">
                
                <!-- Left Column: Narrative -->
                <div class="lg:col-span-7">
                    <div class="mb-20">
                        <span class="text-[var(--color-accent)] font-bold text-6xl block mb-6 leading-none">"</span>
                        <h3 class="text-3xl md:text-4xl font-black uppercase italic tracking-tight mb-10 text-white leading-tight">
                            Start Your Legacy.<br>
                            <span class="text-gray-500">Defy Expectations.</span>
                        </h3>
                        <div class="prose prose-invert prose-lg text-gray-400 max-w-none space-y-8 font-light leading-relaxed">
                            <p>
                                Experience the raw power and refined luxury of the <span class="text-white font-bold border-b border-[var(--color-accent)]">{{ $car->brand }} {{ $car->model }}</span>. 
                                Engineered for dominance, this vehicle combines state-of-the-art technology with bespoke craftsmanship. 
                                Every detail from the aerodynamic lines to the stitched leather interior has been meticulously designed to provide an unparallelled driving experience.
                            </p>
                            <p>
                                From the handcrafted interior to the precision-tuned engine, the {{ $car->model }} represents the pinnacle of automotive engineering.
                                Whether tearing up the track or cruising the coastline, it commands attention and respect. This isn't just a car; it's a statement.
                            </p>
                        </div>
                    </div>

                    <!-- Technical Specs Grid (Horizontal Strip) -->
                    <div>
                        <div class="flex items-center gap-4 mb-10">
                            <div class="h-[1px] flex-1 bg-white/10"></div>
                            <h4 class="text-xs font-bold text-white uppercase tracking-[0.3em]">Technical Data</h4>
                            <div class="h-[1px] flex-1 bg-white/10"></div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-px bg-white/5 border border-white/5">
                            <!-- Spec 1 -->
                            <div class="bg-[#050505] p-8 text-center group hover:bg-[#0a0a0a] transition-colors">
                                <span class="block text-[9px] font-bold text-gray-600 uppercase tracking-widest mb-3">Power</span>
                                <div class="flex justify-center items-baseline gap-1">
                                    <span class="text-3xl font-black text-white font-tech group-hover:text-[var(--color-accent)] transition-colors">{{ $car->specs['hp'] ?? 'N/A' }}</span>
                                    <span class="text-[10px] font-bold text-gray-500">HP</span>
                                </div>
                            </div>
                            <!-- Spec 2 -->
                            <div class="bg-[#050505] p-8 text-center group hover:bg-[#0a0a0a] transition-colors">
                                <span class="block text-[9px] font-bold text-gray-600 uppercase tracking-widest mb-3">0-60 MPH</span>
                                <div class="flex justify-center items-baseline gap-1">
                                    <span class="text-3xl font-black text-white font-tech group-hover:text-[var(--color-accent)] transition-colors">{{ $car->specs['0_60'] ?? 'N/A' }}</span>
                                    <span class="text-[10px] font-bold text-gray-500">SEC</span>
                                </div>
                            </div>
                            <!-- Spec 3 -->
                            <div class="bg-[#050505] p-8 text-center group hover:bg-[#0a0a0a] transition-colors">
                                <span class="block text-[9px] font-bold text-gray-600 uppercase tracking-widest mb-3">Top Speed</span>
                                <div class="flex justify-center items-baseline gap-1">
                                    <span class="text-3xl font-black text-white font-tech group-hover:text-[var(--color-accent)] transition-colors">{{ $car->specs['top_speed'] ?? 'N/A' }}</span>
                                    <span class="text-[10px] font-bold text-gray-500">MPH</span>
                                </div>
                            </div>
                            <!-- Spec 4 -->
                            <div class="bg-[#050505] p-8 text-center group hover:bg-[#0a0a0a] transition-colors">
                                <span class="block text-[9px] font-bold text-gray-600 uppercase tracking-widest mb-3">Base Price</span>
                                <div class="flex justify-center items-baseline gap-1">
                                    <span class="text-lg font-bold text-gray-500 mr-0.5">$</span>
                                    <span class="text-3xl font-black text-white font-tech group-hover:text-[var(--color-accent)] transition-colors">{{ number_format($car->price / 1000) }}k</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Sticky Sidebar -->
                <div class="lg:col-span-5 relative">
                     <div class="sticky top-32">
                        <!-- Inquire Card -->
                        <div class="relative bg-[#0a0a0a] border border-white/5 p-10 md:p-12 overflow-hidden group">
                            <!-- Decorative Elements -->
                            <div class="absolute top-0 right-0 w-24 h-24 bg-[var(--color-accent)] opacity-10 blur-[50px] transition-all duration-700 group-hover:opacity-20 group-hover:blur-[80px]"></div>
                            <div class="absolute bottom-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-[var(--color-accent)] to-transparent opacity-50"></div>

                            <h4 class="text-2xl font-black text-white uppercase italic mb-8 tracking-tighter text-center relative z-10">
                                Inquire Interest
                            </h4>
                            <p class="text-gray-500 text-sm mb-10 text-center leading-relaxed font-light relative z-10">
                                Not ready to commit? Our concierge team is ready to arrange a private viewing or test drive at your convenience.
                            </p>
                            
                            <div class="space-y-4 relative z-10">
                                <a href="{{ route('contact') }}" class="block w-full py-5 bg-white text-black text-center font-black uppercase tracking-[0.2em] hover:bg-[var(--color-accent)] hover:text-white transition-all duration-300 text-xs clip-angle">
                                    Contact Sales
                                </a>
                                <div class="text-center pt-4">
                                    <span class="text-[10px] text-gray-600 uppercase tracking-wider">or call us at</span>
                                    <p class="text-white font-bold mt-1 tracking-widest font-tech">+1 (800) 555-0199</p>
                                </div>
                            </div>

                            <div class="mt-12 pt-8 border-t border-dashed border-white/10 text-center relative z-10">
                                <div class="inline-block p-1 border border-white/10 rounded-full mb-4">
                                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                </div>
                                <h5 class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] mb-2">Vehicle Location</h5>
                                <p class="text-white font-bold uppercase text-sm tracking-wide">Legendary Motors HQ</p>
                                <p class="text-gray-600 text-[10px] mt-1 uppercase tracking-widest">Los Angeles, CA • Showroom Floor</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-site-layout>
