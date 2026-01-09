<x-site-layout>
    <div class="pt-32 pb-12 bg-black min-h-screen text-white">
        <div class="container mx-auto px-6 max-w-4xl">
            
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-black uppercase tracking-tighter">Edit Vehicle</h1>
                <a href="{{ route('admin.cars.index') }}" class="text-gray-500 hover:text-white font-bold uppercase text-xs tracking-widest transition-colors">
                    Cancel
                </a>
            </div>

            <div class="bg-[#111] border border-white/10 p-8">
                <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Brand -->
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Brand</label>
                            <input type="text" name="brand" value="{{ old('brand', $car->brand) }}" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 uppercase font-bold" required>
                        </div>
                        
                        <!-- Model -->
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Model</label>
                            <input type="text" name="model" value="{{ old('model', $car->model) }}" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 uppercase font-bold" required>
                        </div>

                        <!-- Year -->
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Year</label>
                            <input type="number" name="year" value="{{ old('year', $car->year) }}" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 font-tech" required>
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Price ($)</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price', $car->price) }}" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 font-tech" required>
                        </div>

                        <!-- Type -->
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Type</label>
                            <select name="type" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 uppercase font-bold">
                                <option value="supercar" {{ $car->type == 'supercar' ? 'selected' : '' }}>Supercar</option>
                                <option value="suv" {{ $car->type == 'suv' ? 'selected' : '' }}>SUV</option>
                                <option value="luxury" {{ $car->type == 'luxury' ? 'selected' : '' }}>Luxury</option>
                                <option value="motorbike" {{ $car->type == 'motorbike' ? 'selected' : '' }}>Motorbike</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Status</label>
                            <select name="status" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 uppercase font-bold">
                                <option value="available" {{ $car->status == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="reserved" {{ $car->status == 'reserved' ? 'selected' : '' }}>Reserved</option>
                                <option value="sold" {{ $car->status == 'sold' ? 'selected' : '' }}>Sold</option>
                            </select>
                        </div>
                    </div>

                    <!-- Image URL -->
                    <div>
                        <label class="block text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Image URL (Asset Path or External URL)</label>
                        <input type="text" name="image_url" value="{{ old('image_url', $car->image_url) }}" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 text-sm" placeholder="images/brabus/..." required>
                    </div>

                    <div class="border-t border-white/10 pt-6 mt-6">
                        <h3 class="text-lg font-bold uppercase mb-4">Performance Specs</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- HP -->
                            <div>
                                <label class="block text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Horsepower</label>
                                <input type="number" name="hp" value="{{ old('hp', $car->specs['hp'] ?? '') }}" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 font-tech">
                            </div>

                            <!-- 0-60 -->
                            <div>
                                <label class="block text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">0-60 MPH (s)</label>
                                <input type="text" name="0_60" value="{{ old('0_60', $car->specs['0_60'] ?? '') }}" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 font-tech">
                            </div>

                            <!-- Top Speed -->
                            <div>
                                <label class="block text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Top Speed (MPH)</label>
                                <input type="text" name="top_speed" value="{{ old('top_speed', $car->specs['top_speed'] ?? '') }}" class="w-full bg-black border border-white/10 px-4 py-3 text-white focus:border-[var(--color-accent)] focus:ring-0 font-tech">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end pt-6">
                        <button type="submit" class="bg-white text-black px-8 py-3 font-bold uppercase text-xs tracking-widest hover:bg-[var(--color-accent)] hover:text-white transition-colors">
                            Update Vehicle
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-site-layout>
