<x-site-layout>
    <!-- Cinematic Video Hero (Replicating Brabus.com Top Slider) -->
    <div class="relative h-screen w-full bg-black overflow-hidden group">
        <!-- Background Image (Generated Hero) -->
        <div class="absolute inset-0">
             <img src="{{ asset('images/brabus/hero.png') }}" 
                  alt="Legendary Hero" 
                  class="w-full h-full object-cover filter brightness-[0.6] group-hover:scale-105 transition-transform duration-[2000ms]">
             <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/30"></div>
        </div>

        <!-- Overlay Text -->
        <div class="relative z-10 h-full flex flex-col items-center justify-center text-center px-4">
             <h2 class="text-[var(--color-accent)] font-bold tracking-[0.5em] text-sm md:text-base uppercase mb-8 animate-fade-in-up">World Premiere</h2>
             <h1 class="text-7xl md:text-[10rem] font-black text-white uppercase tracking-tighter leading-[0.85] mb-12 animate-fade-in-up delay-100 drop-shadow-2xl">
                 LEGENDARY<br>ROCKET 1000
             </h1>
             <div class="flex flex-col md:flex-row gap-8 animate-fade-in-up delay-200">
                 <a href="{{ route('inventory') }}" class="px-10 py-4 bg-[var(--color-accent)] text-white font-black uppercase tracking-[0.2em] border border-[var(--color-accent)] hover:bg-white hover:text-black hover:border-white transition-all duration-300">
                     Discover Model
                 </a>
                 <a href="#supercars" class="px-10 py-4 bg-transparent text-white font-black uppercase tracking-[0.2em] border border-white hover:bg-white hover:text-black transition-all duration-300">
                     Configure
                 </a>
             </div>
        </div>
        
        <!-- Bottom Bar Info -->
        <div class="absolute bottom-12 left-0 w-full px-12 flex justify-between items-end text-white/50 text-xs font-bold uppercase tracking-widest hidden md:flex">
            <div>
                <span class="block text-white mb-2">Power</span>
                1,000 HP / 736 kW
            </div>
            <div>
                <span class="block text-white mb-2">0-100 KM/H</span>
                2.6 Seconds
            </div>
            <div>
                 <span class="block text-white mb-2">Vmax</span>
                 350 km/h
            </div>
        </div>
    </div>

    <!-- Section: Supercars (The "Cards" Replica) -->
    <section id="supercars" class="bg-white dark:bg-black py-32 transition-colors duration-300">
        <div class="container mx-auto px-6">
            <div class="text-center mb-24">
                 <h2 class="text-[var(--color-accent)] font-bold tracking-[0.4em] uppercase mb-4">The Collection</h2>
                 <h3 class="text-5xl md:text-7xl font-black text-black dark:text-white uppercase tracking-tighter">Supercars</h3>
            </div>

            <!-- Static Grid (Replica) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                
                <!-- Card 1: The Rocket -->
                <a href="{{ route('inventory') }}" class="group block relative">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-[#111] mb-8 relative">
                        <img src="{{ asset('images/brabus/card1.png') }}" alt="Rocket 900" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4 bg-black text-white text-[10px] font-bold uppercase px-3 py-1 tracking-widest">
                            Limited Edition
                        </div>
                    </div>
                    <div class="text-center">
                        <h4 class="text-3xl font-black text-black dark:text-white uppercase mb-2 group-hover:text-[var(--color-accent)] transition-colors">Rocket 900</h4>
                        <p class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-6">Based on Mercedes-AMG GT 63 S</p>
                        
                        <!-- Tech Specs Mini -->
                        <div class="flex justify-center gap-6 text-[10px] font-bold text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-white/10 pt-6">
                            <span>900 HP</span>
                            <span class="text-gray-300 dark:text-gray-700">|</span>
                            <span>1,250 Nm</span>
                            <span class="text-gray-300 dark:text-gray-700">|</span>
                            <span>330 km/h</span>
                        </div>
                    </div>
                </a>

                <!-- Card 2: The Adventure -->
                <a href="{{ route('inventory') }}" class="group block relative">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-[#111] mb-8 relative">
                        <img src="{{ asset('images/brabus/card2.png') }}" alt="800 Adventure" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4 bg-[var(--color-accent)] text-white text-[10px] font-bold uppercase px-3 py-1 tracking-widest">
                            Offroad
                        </div>
                    </div>
                    <div class="text-center">
                        <h4 class="text-3xl font-black text-black dark:text-white uppercase mb-2 group-hover:text-[var(--color-accent)] transition-colors">800 Adventure XLP</h4>
                        <p class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-6">Based on Mercedes-AMG G 63</p>
                        
                        <div class="flex justify-center gap-6 text-[10px] font-bold text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-white/10 pt-6">
                            <span>800 HP</span>
                            <span class="text-gray-300 dark:text-gray-700">|</span>
                            <span>1,000 Nm</span>
                            <span class="text-gray-300 dark:text-gray-700">|</span>
                            <span>210 km/h</span>
                        </div>
                    </div>
                </a>

                <!-- Card 3: The Icon -->
                <a href="{{ route('inventory') }}" class="group block relative">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-[#111] mb-8 relative">
                         <img src="{{ asset('images/brabus/card3.png') }}" alt="900 Turbo S" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="text-center">
                        <h4 class="text-3xl font-black text-black dark:text-white uppercase mb-2 group-hover:text-[var(--color-accent)] transition-colors">900 Rocket R</h4>
                        <p class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-6">Based on Porsche 911 Turbo S</p>
                        
                        <div class="flex justify-center gap-6 text-[10px] font-bold text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-white/10 pt-6">
                            <span>900 HP</span>
                            <span class="text-gray-300 dark:text-gray-700">|</span>
                            <span>1,000 Nm</span>
                            <span class="text-gray-300 dark:text-gray-700">|</span>
                            <span>340 km/h</span>
                        </div>
                    </div>
                </a>

            </div>
            
            <div class="mt-24 text-center">
                 <a href="{{ route('inventory') }}" class="inline-block px-12 py-5 bg-black dark:bg-white text-white dark:text-black font-black uppercase tracking-[0.2em] border border-transparent hover:bg-[var(--color-accent)] hover:text-white dark:hover:bg-[var(--color-accent)] dark:hover:text-white transition-all duration-300">
                     View All Supercars
                 </a>
            </div>
        </div>
    </section>

    <!-- Section: Divisions (Visual Block) -->
    <section class="h-[80vh] relative group overflow-hidden">
        <!-- Tuning -->
        <img src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=2670&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 filter grayscale group-hover:grayscale-0">
         <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-colors"></div>
         <div class="absolute bottom-12 left-12">
             <h3 class="text-5xl font-black text-white uppercase tracking-tighter mb-4">Tuning</h3>
             <a href="#" class="text-white font-bold uppercase tracking-widest border-b-2 border-[var(--color-accent)] pb-1 hover:text-[var(--color-accent)] transition-colors">Discover Refinement</a>
         </div>
    </section>
</x-site-layout>
