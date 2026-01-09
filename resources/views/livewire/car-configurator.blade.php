<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 text-white selection:bg-[var(--color-accent)] selection:text-white">
    <!-- Visualizer (Left/Top) -->
    <div class="lg:col-span-8">
        <div class="sticky top-24">
            <div class="relative aspect-[16/9] bg-[#050505] overflow-hidden group rounded-xl border border-white/5 shadow-2xl">
                <!-- Dynamic Image Layering -->
                <img src="{{ Str::startsWith($car->image_url, 'http') ? $car->image_url : asset($car->image_url) }}" 
                     alt="{{ $car->model }}" 
                     class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105 will-change-transform">
                
                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-black/80 to-transparent p-6 md:p-12">
                    <h2 class="text-3xl md:text-5xl font-black uppercase italic tracking-tighter mb-2">{{ $car->model }}</h2>
                    <div class="flex items-center gap-3">
                        <span class="w-8 h-[1px] bg-[var(--color-accent)]"></span>
                        <p class="text-gray-300 font-bold tracking-[0.2em] uppercase text-xs">
                             {{ $options['colors'][$color]['name'] }} <span class="text-gray-600 mx-2">|</span> {{ $options['rims'][$rims]['name'] }}
                        </p>
                    </div>
                </div>
                
                <!-- Price Overlay as Badge -->
                <div class="absolute top-6 right-6 md:top-10 md:right-10">
                    <div class="backdrop-blur-md bg-black/40 border border-white/10 px-6 py-4 rounded-lg shadow-lg">
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-1 text-right">Estimated Total</p>
                        <p class="text-2xl md:text-3xl font-black text-white tracking-tight text-right">${{ number_format($total) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Configurator Controls (Right/Bottom) -->
    <div class="lg:col-span-4">
        <div class="bg-[#111]/90 backdrop-blur-xl p-8 border border-white/10 rounded-xl h-fit sticky top-24 shadow-2xl ring-1 ring-white/5">
            <h3 class="text-lg font-black uppercase tracking-widest text-white mb-8 flex items-center gap-3">
                <span class="w-2 h-8 bg-[var(--color-accent)] rounded-sm"></span>
                Configuration
            </h3>

            <!-- Paint Selection -->
            <div class="mb-12">
                <div class="flex justify-between items-baseline mb-6">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest">Select Paint</label>
                    <span class="text-[10px] font-mono text-[var(--color-accent)]">{{ $options['colors'][$color]['name'] }}</span>
                </div>
                
                <div class="flex justify-between gap-4">
                    @foreach($options['colors'] as $key => $details)
                    <div class="group relative">
                        <button wire:click="$set('color', '{{ $key }}')" 
                                class="w-16 h-16 rounded-full transition-all duration-300 focus:outline-none relative"
                                style="background-color: {{ $details['hex'] }};">
                                
                                <!-- Selection Ring -->
                                <div class="absolute -inset-1.5 rounded-full border-2 transition-all duration-300 {{ $color === $key ? 'border-white opacity-100 scale-100' : 'border-white/30 opacity-0 scale-90 group-hover:opacity-100 group-hover:scale-100' }}"></div>
                        </button>
                        
                         <!-- Tooltip -->
                        <div class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none z-20 translate-y-2 group-hover:translate-y-0">
                            <span class="text-[10px] font-bold uppercase text-black bg-white px-3 py-1.5 rounded shadow-xl whitespace-nowrap tracking-wide">
                                {{ $key == 'obsidian_black' ? 'Free' : '+$'.number_format($details['price']/1000).'k' }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Rims Selection -->
            <div class="mb-10">
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Select Wheels</label>
                <div class="space-y-3">
                    @foreach($options['rims'] as $key => $details)
                    <button wire:click="$set('rims', '{{ $key }}')" 
                            class="w-full flex justify-between items-center p-4 border rounded-lg transition-all duration-300 group {{ $rims === $key ? 'bg-white text-black border-white shadow-lg scale-[1.02]' : 'bg-white/5 text-gray-400 border-white/5 hover:bg-white/10 hover:border-white/20' }}">
                        <div class="flex flex-col items-start text-left">
                            <span class="text-xs font-bold uppercase tracking-wider leading-tight">{{ $details['name'] }}</span>
                        </div>
                        <span class="text-[10px] font-bold bg-black/10 px-2 py-1 rounded {{ $rims === $key ? 'text-black' : 'text-gray-500 group-hover:text-gray-300' }}">
                            {{ $details['price'] == 0 ? 'INC' : '+$'.number_format($details['price']) }}
                        </span>
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- Body Kit Selection -->
            <div class="mb-12">
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Aerodynamics</label>
                <div class="space-y-3">
                    @foreach($options['kits'] as $key => $details)
                    <button wire:click="$set('kit', '{{ $key }}')" 
                            class="w-full flex justify-between items-center p-4 border rounded-lg transition-all duration-300 group {{ $kit === $key ? 'bg-zinc-800 text-white border-[var(--color-accent)] ring-1 ring-[var(--color-accent)] shadow-[0_0_15px_rgba(var(--color-accent-rgb),0.3)]' : 'bg-white/5 text-gray-400 border-white/5 hover:bg-white/10 hover:border-white/20' }}">
                        <span class="text-xs font-bold uppercase tracking-wider">{{ $details['name'] }}</span>
                        <span class="text-[10px] font-bold {{ $kit === $key ? 'text-[var(--color-accent)]' : 'text-gray-500' }}">
                            {{ $details['price'] == 0 ? 'INC' : '+$'.number_format($details['price']) }}
                        </span>
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- Summary & Action -->
            <div class="pt-8 border-t border-white/10">
                <div class="space-y-2 mb-8">
                    <div class="flex justify-between items-center text-xs text-gray-500 font-bold uppercase tracking-widest">
                        <span>Base Model</span>
                        <span>${{ number_format($car->price) }}</span>
                    </div>
                    <div class="flex justify-between items-center text-xs text-[var(--color-accent)] font-bold uppercase tracking-widest">
                        <span>Selected Options</span>
                        <span>+${{ number_format($total - $car->price) }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm text-white font-black uppercase tracking-widest pt-4 border-t border-dashed border-white/10 mt-4">
                        <span>Total Configuration</span>
                        <span>${{ number_format($total) }}</span>
                    </div>
                </div>
                
                <button wire:click="reserve" 
                        wire:loading.attr="disabled"
                        class="w-full py-5 bg-white text-black font-black uppercase tracking-[0.2em] border border-white hover:bg-transparent hover:text-white transition-all duration-300 rounded-sm relative overflow-hidden group shadow-[0_0_20px_rgba(255,255,255,0.3)] hover:shadow-none">
                    <span class="relative z-10 flex items-center justify-center gap-2" wire:loading.remove>
                        <span>Reserve Build</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </span>
                    <span class="relative z-10" wire:loading>Processing Request...</span>
                </button>
                <p class="text-[10px] text-center text-gray-500 mt-6 uppercase tracking-widest font-medium flex items-center justify-center gap-2">
                    <svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Secure transaction via Stripe • 100% Refundable Deposit
                </p>
            </div>
        </div>
    </div>
</div>
