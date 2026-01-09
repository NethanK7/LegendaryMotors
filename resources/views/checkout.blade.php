<x-site-layout>
    <div class="bg-black min-h-screen text-white pt-24 pb-12">
        <div class="container mx-auto px-6">
            
            <!-- Header -->
            <div class="mb-12 border-l-4 border-[var(--color-accent)] pl-6">
                <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter mb-2">
                    Secure Allocation
                </h1>
                <p class="text-gray-400 font-bold uppercase tracking-[0.2em] text-sm">
                    Finalize your request for the {{ $car ? $car->model : 'Legendary Collection' }}
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-16">
                
                <!-- Left: Application Form -->
                <div class="lg:w-2/3 order-2 lg:order-1">
                    <div class="bg-[#050505] border border-white/10 p-8 md:p-12">
                        <h3 class="text-2xl font-bold uppercase mb-8 flex items-center gap-3">
                            <span class="w-2 h-2 bg-[var(--color-accent)] rounded-full"></span>
                            Client Details
                        </h3>

                        @if($errors->any())
                            <div class="mb-8 p-4 bg-red-500/10 border border-red-500 text-red-500 font-bold uppercase text-xs tracking-widest">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('payment.process') }}" method="POST" class="space-y-8">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-3">First Name</label>
                                    <input type="text" name="first_name" required class="w-full bg-[#111] border-b border-white/10 text-white font-bold py-4 px-0 focus:outline-none focus:border-[var(--color-accent)] transition-colors placeholder-gray-700 uppercase rounded-none" placeholder="ENTER FIRST NAME">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-3">Last Name</label>
                                    <input type="text" name="last_name" required class="w-full bg-[#111] border-b border-white/10 text-white font-bold py-4 px-0 focus:outline-none focus:border-[var(--color-accent)] transition-colors placeholder-gray-700 uppercase rounded-none" placeholder="ENTER LAST NAME">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-3">Email Address</label>
                                <input type="email" name="email" required class="w-full bg-[#111] border-b border-white/10 text-white font-bold py-4 px-0 focus:outline-none focus:border-[var(--color-accent)] transition-colors placeholder-gray-700 uppercase rounded-none" placeholder="ENTER OFFICIAL EMAIL">
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-3">Phone Number</label>
                                <input type="tel" name="phone" required class="w-full bg-[#111] border-b border-white/10 text-white font-bold py-4 px-0 focus:outline-none focus:border-[var(--color-accent)] transition-colors placeholder-gray-700 uppercase rounded-none" placeholder="+1 (000) 000-0000">
                            </div>
                            
                            <!-- Delivery Preference -->
                             <div class="pt-8 border-t border-white/5">
                                <h3 class="text-xl font-bold uppercase mb-6 flex items-center gap-3">
                                    <span class="w-2 h-2 bg-[var(--color-accent)] rounded-full"></span>
                                    Logistics
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="delivery" value="collection" class="peer sr-only" required>
                                        <div class="p-6 border border-white/10 peer-checked:border-[var(--color-accent)] peer-checked:bg-white/5 transition-all group-hover:border-white/30">
                                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Option 01</span>
                                            <span class="block font-black uppercase text-lg">Factory Collection</span>
                                        </div>
                                    </label>
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="delivery" value="transport" class="peer sr-only">
                                        <div class="p-6 border border-white/10 peer-checked:border-[var(--color-accent)] peer-checked:bg-white/5 transition-all group-hover:border-white/30">
                                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Option 02</span>
                                            <span class="block font-black uppercase text-lg">Secure Transport</span>
                                        </div>
                                    </label>
                                </div>
                             </div>

                             <div class="pt-8">
                                 <button type="submit" class="w-full py-5 bg-[var(--color-accent)] text-white font-black uppercase tracking-[0.2em] border border-[var(--color-accent)] hover:bg-white hover:text-black hover:border-white transition-all duration-300 clip-angle">
                                    Confirm Reservation
                                </button>
                                <p class="text-center text-[10px] text-gray-600 uppercase tracking-widest mt-6">
                                    A deposit of 10% is required to secure this allocation.
                                </p>
                             </div>
                        </form>
                    </div>
                </div>

                <!-- Right: Summary (Sticky) -->
                <div class="lg:w-1/3 order-1 lg:order-2">
                    <div class="sticky top-24">
                        <div class="bg-[#111] border border-white/10 p-2">
                            @if($car)
                                <div class="aspect-video w-full overflow-hidden bg-black mb-4 relative group">
                                    <img src="{{ Str::startsWith($car->image_url, 'http') ? $car->image_url : asset($car->image_url) }}" 
                                         class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500">
                                    <div class="absolute top-2 right-2 bg-[var(--color-accent)] text-white text-[10px] font-bold uppercase px-2 py-1">
                                        Selected
                                    </div>
                                </div>
                                <div class="px-6 pb-8">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="text-2xl font-black italic uppercase">{{ $car->model }}</h3>
                                    </div>
                                    <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-6">{{ $car->brand }} • {{ $car->year }}</p>

                                    <div class="space-y-3 pt-6 border-t border-white/10">
                                        <div class="flex justify-between text-sm font-bold">
                                            <span class="text-gray-500 uppercase">Base Price</span>
                                            <span>${{ number_format($car->price) }}</span>
                                        </div>
                                        <div class="flex justify-between text-sm font-bold">
                                            <span class="text-gray-500 uppercase">Est. Tax</span>
                                            <span>TBD</span>
                                        </div>
                                        <div class="flex justify-between text-sm font-bold text-[var(--color-accent)] pt-4 border-t border-white/10 mt-4">
                                            <span class="uppercase">Deposit Due</span>
                                            <span>${{ number_format($car->price * 0.10) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="p-8 text-center">
                                    <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    </div>
                                    <h3 class="text-xl font-bold uppercase mb-2">General Inquiry</h3>
                                    <p class="text-gray-500 text-xs">No specific vehicle selected.</p>
                                    <a href="{{ route('inventory') }}" class="inline-block mt-4 text-[var(--color-accent)] text-xs font-bold uppercase border-b border-[var(--color-accent)]">Browse Inventory</a>
                                </div>
                            @endif
                        </div>

                        <!-- Trust Badge -->
                        <div class="mt-8 flex items-center justify-center gap-4 opacity-50 grayscale">
                             <!-- Fake Trust Logos -->
                             <div class="h-8 w-12 bg-white/10"></div>
                             <div class="h-8 w-12 bg-white/10"></div>
                             <div class="h-8 w-12 bg-white/10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
