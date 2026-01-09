<x-site-layout>
    <div class="pt-48 pb-12 bg-black min-h-screen text-white" style="padding-top: 150px;">
        <div class="container mx-auto px-6">
            
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-black uppercase tracking-tighter">Inventory Management</h1>
                <a href="{{ route('admin.cars.create') }}" class="bg-[var(--color-accent)] text-white px-6 py-3 font-bold uppercase text-xs tracking-widest hover:bg-white hover:text-black transition-colors">
                    Add New Vehicle
                </a>
            </div>

            @if(session('success'))
                <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-500 p-4 text-xs font-bold uppercase tracking-wide">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Inventory Table -->
            <div class="bg-[#111] border border-white/10 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left min-w-[800px]">
                        <thead class="bg-white/5">
                            <tr class="text-gray-500 text-xs uppercase tracking-widest whitespace-nowrap">
                                <th class="p-6">Vehicle</th>
                                <th class="p-6">Category</th>
                                <th class="p-6">Price</th>
                                <th class="p-6">Status</th>
                                <th class="p-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse($cars as $car)
                            <tr class="border-b border-white/5 last:border-0 hover:bg-white/5 transition-colors group">
                                <td class="p-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-16 h-10 bg-gray-800 overflow-hidden shrink-0">
                                            <img src="{{ Str::startsWith($car->image_url, 'http') ? $car->image_url : asset($car->image_url) }}" class="w-full h-full object-cover" alt="{{ $car->model }}">
                                        </div>
                                        <div>
                                            <div class="font-bold text-white">{{ $car->brand }} {{ $car->model }}</div>
                                            <div class="text-gray-500 text-xs">{{ $car->year }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6 text-gray-400 capitalize">{{ $car->category }}</td>
                                <td class="p-6 font-tech font-bold">${{ number_format($car->price) }}</td>
                                <td class="p-6">
                                    <span class="bg-white/10 px-2 py-1 text-[10px] uppercase font-bold tracking-wider {{ $car->status === 'available' ? 'text-green-400' : 'text-gray-400' }}">
                                        {{ $car->status }}
                                    </span>
                                </td>
                                <td class="p-6 text-right">
                                    <div class="flex items-center justify-end gap-3 opacity-50 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="text-white hover:text-[var(--color-accent)] font-bold text-xs uppercase">Edit</a>
                                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this vehicle?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-500 hover:text-red-500 font-bold text-xs uppercase">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-12 text-center text-gray-500 uppercase tracking-widest text-xs">
                                    No inventory found. Add a vehicle to get started.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                <div class="bg-[#111] px-4 py-2 border border-white/10 rounded-full">
                    {{ $cars->links() }}
                </div>
            </div>

        </div>
    </div>
</x-site-layout>
