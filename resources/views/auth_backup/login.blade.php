<x-app-layout>
    <!-- Cinematic Hero -->
    <div class="relative h-[80vh] w-full bg-black overflow-hidden flex items-center justify-center">
        <!-- Background -->
        <div class="absolute inset-0">
             <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=2670&auto=format&fit=crop" 
                  alt="Login Background" 
                  class="w-full h-full object-cover opacity-60">
             <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-black/80"></div>
        </div>
        
        <div class="relative z-10 w-full max-w-md px-6">
            <div class="bg-black/90 backdrop-blur-md border border-white/10 p-12 relative overflow-hidden group">
                 <!-- Decorative accent -->
                 <div class="absolute top-0 left-0 w-1 h-full bg-[var(--color-accent)]"></div>

                <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-2 text-center">Welcome Back</h2>
                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-[0.2em] text-center mb-10">Access your private collection</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email -->
                    <div class="mb-6">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Email Address</label>
                        <input type="email" name="email" required class="w-full bg-[#111] border border-white/10 text-white font-bold px-4 py-4 focus:outline-none focus:border-[var(--color-accent)] transition-colors placeholder-gray-700 uppercase" placeholder="ENTER EMAIL">
                    </div>

                    <!-- Password -->
                    <div class="mb-10">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Password</label>
                        <input type="password" name="password" required class="w-full bg-[#111] border border-white/10 text-white font-bold px-4 py-4 focus:outline-none focus:border-[var(--color-accent)] transition-colors placeholder-gray-700 uppercase" placeholder="ENTER PASSWORD">
                    </div>

                    <button type="submit" class="w-full py-4 bg-[var(--color-accent)] text-white font-black uppercase tracking-[0.2em] border border-[var(--color-accent)] hover:bg-white hover:text-black hover:border-white transition-all duration-300">
                        Sign In
                    </button>
                </form>

                <div class="mt-8 text-center border-t border-white/10 pt-6">
                    <a href="{{ route('register') }}" class="text-xs font-bold text-gray-400 uppercase tracking-widest hover:text-white transition-colors">
                        New Client? <span class="text-[var(--color-accent)]">Register Interest</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
