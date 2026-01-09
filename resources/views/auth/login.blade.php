<x-site-layout>
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2 bg-black">
        <!-- Left Side: Cinematic Image -->
        <div class="hidden lg:block relative overflow-hidden group">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[2000ms] group-hover:scale-105" 
                 style="background-image: url('https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?q=80&w=2664&auto=format&fit=crop');">
            </div>
            <div class="absolute inset-0 bg-black/40 bg-gradient-to-t from-black via-transparent to-transparent"></div>
            
            <div class="absolute bottom-12 left-12 right-12 text-white">
                <p class="text-[var(--color-accent)] font-bold tracking-[0.3em] uppercase text-xs mb-4">Legendary Motors</p>
                <h2 class="text-5xl font-black uppercase italic tracking-tighter leading-tight mb-6">
                    Performance <br>Without Compromise.
                </h2>
                <p class="text-gray-300 font-light text-sm max-w-md leading-relaxed">
                    Access your personalized garage, manage reservations, and configure your dream machine.
                </p>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="flex items-center justify-center p-8 lg:p-24 bg-[#050505] relative pt-32 lg:pt-24">
             <div class="w-full max-w-md">
                <!-- Header -->
                <div class="mb-12">
                    <a href="{{ route('home') }}" class="text-2xl font-black uppercase tracking-tighter block mb-12">
                        Legendary<span class="text-[var(--color-accent)]">Motors</span>
                    </a>
                    <h2 class="text-3xl font-black text-white uppercase tracking-tighter mb-2">Welcome Back</h2>
                    <p class="text-gray-500 text-sm font-medium">Please enter your credentials to access your account.</p>
                </div>

                <x-validation-errors class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-500 text-xs font-bold uppercase tracking-wide" />

                @if (session('status'))
                    <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 text-green-500 text-xs font-bold uppercase tracking-wide">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest" for="email">Email</label>
                        <input id="email" class="w-full bg-[#111] border border-white/10 text-white font-bold px-5 py-4 focus:outline-none focus:border-[var(--color-accent)] focus:ring-1 focus:ring-[var(--color-accent)] transition-all placeholder-gray-700 uppercase text-sm" 
                               type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="NAME@EXAMPLE.COM" />
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest" for="password">Password</label>
                            @if (Route::has('password.request'))
                                <a class="text-[10px] font-bold text-[var(--color-accent)] hover:text-white uppercase tracking-widest transition-colors" href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>
                        <input id="password" class="w-full bg-[#111] border border-white/10 text-white font-bold px-5 py-4 focus:outline-none focus:border-[var(--color-accent)] focus:ring-1 focus:ring-[var(--color-accent)] transition-all placeholder-gray-700 uppercase text-sm" 
                               type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    </div>

                    <div class="flex items-center">
                         <label for="remember_me" class="flex items-center cursor-pointer group">
                            <div class="relative flex items-center">
                                <input id="remember_me" type="checkbox" name="remember" class="peer h-4 w-4 bg-[#111] border-white/20 text-[var(--color-accent)] focus:ring-0 rounded-sm cursor-pointer transition-colors checked:bg-[var(--color-accent)] checked:border-[var(--color-accent)]">
                            </div>
                            <span class="ms-3 text-xs font-bold text-gray-500 group-hover:text-white uppercase tracking-widest transition-colors">{{ __('Keep me logged in') }}</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full py-4 bg-white text-black font-black uppercase tracking-[0.2em] hover:bg-[var(--color-accent)] hover:text-white transition-all duration-300 shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_20px_rgba(var(--color-accent-rgb),0.5)] mt-8">
                        {{ __('Sign In') }}
                    </button>
                    
                    <div class="pt-8 mt-8 border-t border-white/10 text-center">
                        <p class="text-xs text-gray-600 font-medium mb-4">Don't have an exclusive access?</p>
                        <a href="{{ route('register') }}" class="inline-block text-xs font-bold text-white uppercase tracking-[0.2em] border-b border-[var(--color-accent)] pb-1 hover:text-[var(--color-accent)] transition-colors">
                            Request Membership
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-site-layout>
