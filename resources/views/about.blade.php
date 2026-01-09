<x-site-layout>
    <!-- Cinematic Header - The Story -->
    <div class="relative h-[60vh] w-full bg-black overflow-hidden flex items-end pb-24 group">
        <div class="absolute inset-0">
             <img src="https://images.unsplash.com/photo-1486006920555-c77dcf18193c?q=80&w=2693&auto=format&fit=crop" 
                  alt="About Us Hero" 
                  class="w-full h-full object-cover opacity-50 group-hover:scale-105 transition-transform duration-[2000ms]">
             <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
        </div>
        <div class="relative z-10 container mx-auto px-6">
             <h2 class="text-[var(--color-accent)] font-bold tracking-[0.5em] text-sm md:text-base uppercase mb-4 animate-fade-in-up">Since 2026</h2>
             <h1 class="text-6xl md:text-9xl font-black text-white uppercase tracking-tighter leading-none animate-fade-in-up delay-100">
                 The Story
             </h1>
        </div>
    </div>

    <!-- Content Section -->
    <section class="bg-white dark:bg-black py-32 transition-colors duration-300">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-24 items-start">
                <!-- Left: Huge Statement -->
                <div class="lg:w-1/2 sticky top-32">
                     <h2 class="text-4xl md:text-6xl font-black text-black dark:text-white uppercase leading-none mb-12">
                        Beyond<br>
                        Automotive<br>
                        Perfection
                     </h2>
                     <div class="w-24 h-2 bg-[var(--color-accent)] mb-12"></div>
                     <p class="text-xl text-gray-600 dark:text-gray-400 leading-relaxed font-medium max-w-lg">
                         Legendary Motors is not just a dealership; it is a sanctuary for the world's most extraordinary machines. 
                         We specialize in the acquisition, refinement, and sale of high-performance vehicles that push the boundaries of engineering and design.
                     </p>
                </div>

                <!-- Right: Timeline/Features -->
                <div class="lg:w-1/2 space-y-24">
                    <!-- Feature 1 -->
                    <div class="group">
                         <div class="aspect-video overflow-hidden mb-8 bg-gray-100 dark:bg-[#111]">
                              <img src="https://images.unsplash.com/photo-1549460269-8e4cb360b979?q=80&w=2670&auto=format&fit=crop" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                         </div>
                         <h3 class="text-2xl font-black text-black dark:text-white uppercase mb-4">Uncompromising Exclusivity</h3>
                         <p class="text-gray-500 font-bold leading-relaxed uppercase tracking-wide text-xs">
                             We curate only the rarest specifications. Our inventory is a testament to individuality, featuring limited production runs and bespoke commissions that cannot be found elsewhere.
                         </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="group">
                         <div class="aspect-video overflow-hidden mb-8 bg-gray-100 dark:bg-[#111]">
                              <img src="https://images.unsplash.com/photo-1570280406792-bf58b7c59247?q=80&w=2662&auto=format&fit=crop" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                         </div>
                         <h3 class="text-2xl font-black text-black dark:text-white uppercase mb-4">Performance Engineers</h3>
                         <p class="text-gray-500 font-bold leading-relaxed uppercase tracking-wide text-xs">
                             Every vehicle is inspected by our master technicians. We don't just sell cars; we deliver track-ready precision instruments maintained to the highest factory standards.
                         </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-site-layout>
