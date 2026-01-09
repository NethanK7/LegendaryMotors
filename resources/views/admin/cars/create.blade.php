<x-site-layout>
    <div class="pt-48 pb-12 bg-black min-h-screen text-white">
        <div class="container mx-auto px-6 max-w-4xl">
            
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-black uppercase tracking-tighter mb-2">Add New Vehicle</h1>
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-widest">Expand the Legendary Collection</p>
                </div>
                <a href="{{ route('admin.cars.index') }}" class="text-gray-500 hover:text-white font-bold uppercase text-xs tracking-widest transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    Cancel
                </a>
            </div>

            <form action="{{ route('admin.cars.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <!-- Column 1: Identity & Status -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Identity Card -->
                        <div class="bg-[#111] border border-white/10 p-8 relative overflow-hidden">
                            <h3 class="text-lg font-black uppercase tracking-widest mb-6 flex items-center gap-2">
                                <span class="w-1 h-5 bg-[var(--color-accent)]"></span>
                                Vehicle Identity
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-2">Brand Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="brand" value="{{ old('brand') }}" placeholder="e.g. Brabus" class="w-full bg-black border @error('brand') border-red-500 @else border-white/10 @enderror px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 uppercase font-bold text-sm" required>
                                    @error('brand') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-2">Model Designation <span class="text-red-500">*</span></label>
                                    <input type="text" name="model" value="{{ old('model') }}" placeholder="e.g. Rocket 900" class="w-full bg-black border @error('model') border-red-500 @else border-white/10 @enderror px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 uppercase font-bold text-sm" required>
                                    @error('model') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-2">Model Year <span class="text-red-500">*</span></label>
                                    <input type="number" name="year" value="{{ old('year', 2026) }}" class="w-full bg-black border @error('year') border-red-500 @else border-white/10 @enderror px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 font-tech text-sm" required>
                                    @error('year') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-2">Classification <span class="text-red-500">*</span></label>
                                    <select name="category" class="w-full bg-black border @error('category') border-red-500 @else border-white/10 @enderror px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 uppercase font-bold text-sm">
                                        <option value="supercar" {{ old('category') == 'supercar' ? 'selected' : '' }}>Supercar</option>
                                        <option value="suv" {{ old('category') == 'suv' ? 'selected' : '' }}>SUV</option>
                                        <option value="luxury" {{ old('category') == 'luxury' ? 'selected' : '' }}>Luxury Limo</option>
                                        <option value="motorbike" {{ old('category') == 'motorbike' ? 'selected' : '' }}>Motorbike</option>
                                    </select>
                                    @error('category') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Specs Card -->
                        <div class="bg-[#111] border border-white/10 p-8 relative overflow-hidden">
                            <h3 class="text-lg font-black uppercase tracking-widest mb-6 flex items-center gap-2">
                                <span class="w-1 h-5 bg-white"></span>
                                Performance Engineering
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-2">Power (HP)</label>
                                    <input type="number" name="hp" value="{{ old('hp') }}" placeholder="900" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 font-tech text-sm">
                                </div>
                                <div>
                                    <label class="block text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-2">0-60 MPH (s)</label>
                                    <input type="text" name="0_60" value="{{ old('0_60') }}" placeholder="2.8" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 font-tech text-sm">
                                </div>
                                <div>
                                    <label class="block text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-2">Top Speed (MPH)</label>
                                    <input type="text" name="top_speed" value="{{ old('top_speed') }}" placeholder="200" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 font-tech text-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2: Market & Media -->
                    <div class="space-y-8">
                         <!-- Market Data -->
                         <div class="bg-[#111] border border-white/10 p-8">
                            <h3 class="text-lg font-black uppercase tracking-widest mb-6 flex items-center gap-2">
                                <span class="w-1 h-5 bg-green-500"></span>
                                Market Data
                            </h3>
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-2">Base Price ($) <span class="text-red-500">*</span></label>
                                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" placeholder="500000" class="w-full bg-black border @error('price') border-red-500 @else border-white/10 @enderror px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 font-tech text-xl" required>
                                    @error('price') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-2">Inventory Status</label>
                                    <select name="status" class="w-full bg-black border @error('status') border-red-500 @else border-white/10 @enderror px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 uppercase font-bold text-sm">
                                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }} class="text-green-500">Available</option>
                                        <option value="reserved" {{ old('status') == 'reserved' ? 'selected' : '' }} class="text-yellow-500">Reserved</option>
                                        <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }} class="text-red-500">Sold</option>
                                    </select>
                                    @error('status') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>
                         </div>

                         <!-- Media -->
                         <div class="bg-[#111] border border-white/10 p-8">
                            <h3 class="text-lg font-black uppercase tracking-widest mb-6 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Visuals
                            </h3>
                            <div>
                                <label class="block text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-2">Image Source URL <span class="text-red-500">*</span></label>
                                <textarea name="image_url" rows="3" class="w-full bg-black border @error('image_url') border-red-500 @else border-white/10 @enderror px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 text-xs font-mono leading-relaxed" placeholder="https://..." required>{{ old('image_url') }}</textarea>
                                <p class="text-[9px] text-gray-600 mt-2 uppercase tracking-wide">Paste a direct link to a high-res image (Unsplash or hosted asset).</p>
                                @error('image_url') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-1 block">{{ $message }}</span> @enderror
                            </div>
                         </div>

                        <button type="submit" class="w-full bg-[var(--color-accent)] text-white px-8 py-4 font-black uppercase text-sm tracking-[0.2em] hover:bg-white hover:text-black transition-all duration-300 shadow-[0_0_30px_rgba(255,0,0,0.3)] hover:shadow-[0_0_50px_rgba(255,255,255,0.4)]">
                            Launch Vehicle
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-site-layout>
