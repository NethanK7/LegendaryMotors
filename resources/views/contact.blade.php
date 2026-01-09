<x-site-layout>
    <!-- Cinematic Header - Contact -->
    <div class="relative h-[60vh] w-full bg-black overflow-hidden flex items-end pb-24 group">
        <div class="absolute inset-0">
             <img src="https://images.unsplash.com/photo-1617788138017-80ad40651399?q=80&w=2670&auto=format&fit=crop" 
                  alt="Contact Us" 
                  class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-[2000ms]">
             <div class="absolute inset-0 bg-gradient-to-t from-white dark:from-black via-transparent to-transparent"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6">
            <h2 class="text-[var(--color-accent)] font-bold tracking-[0.5em] text-sm md:text-base uppercase mb-4 animate-fade-in-up">Get in Touch</h2>
            <h1 class="text-6xl md:text-9xl font-black text-black dark:text-white uppercase tracking-tighter leading-none animate-fade-in-up delay-100">
                Contact
            </h1>
        </div>
    </div>

    <!-- Content Section -->
    <section class="bg-white dark:bg-black text-black dark:text-white py-32 transition-colors duration-300">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24">
                <!-- Left: Info -->
                <div class="space-y-16">
                    <div>
                        <h3 class="text-4xl font-black uppercase mb-8">Headquarters</h3>
                        <p class="text-gray-600 dark:text-gray-400 font-bold uppercase tracking-widest leading-loose">
                            Legendary Motors International<br>
                            123 Automotive Blvd<br>
                            Los Angeles, CA 90001<br>
                            United States
                        </p>
                    </div>
                    
                    <div class="border-t border-gray-200 dark:border-white/10 pt-16">
                         <h3 class="text-2xl font-black uppercase mb-8">Direct Lines</h3>
                         <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                             <div>
                                 <span class="block text-xs font-bold text-[var(--color-accent)] uppercase tracking-widest mb-2">Sales Department</span>
                                 <span class="block text-2xl font-black">+1 (555) 123-4567</span>
                             </div>
                             <div>
                                 <span class="block text-xs font-bold text-[var(--color-accent)] uppercase tracking-widest mb-2">Service & Support</span>
                                 <span class="block text-2xl font-black">+1 (555) 987-6543</span>
                             </div>
                         </div>
                    </div>

                    <div class="border-t border-gray-200 dark:border-white/10 pt-16">
                        <h3 class="text-2xl font-black uppercase mb-8">Opening Hours</h3>
                        <ul class="space-y-4 text-gray-600 dark:text-gray-400 font-bold uppercase tracking-widest text-sm">
                            <li class="flex justify-between border-b border-gray-100 dark:border-white/5 pb-4">
                                <span>Mon - Fri</span>
                                <span class="text-black dark:text-white">09:00 - 18:00</span>
                            </li>
                             <li class="flex justify-between border-b border-gray-100 dark:border-white/5 pb-4">
                                <span>Saturday</span>
                                <span class="text-black dark:text-white">10:00 - 16:00</span>
                            </li>
                             <li class="flex justify-between border-b border-gray-100 dark:border-white/5 pb-4">
                                <span>Sunday</span>
                                <span class="text-[var(--color-accent)]">Closed</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Right: Form (Glass) -->
                <div class="bg-gray-50 dark:bg-[#111] p-12 border border-gray-200 dark:border-white/5 relative shadow-xl dark:shadow-none transition-colors duration-300">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-[var(--color-accent)]/10 blur-3xl"></div>
                    
                    @if (session('status'))
                        <div class="mb-8 p-4 bg-green-500/10 border border-green-500 text-green-500 font-bold uppercase text-xs tracking-widest">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-12">
                            <h3 class="text-2xl font-black uppercase mb-2">Send Message</h3>
                            <p class="text-gray-500 text-xs font-bold uppercase tracking-widest">We respond within 24 hours</p>
                        </div>

                         <div class="mb-8">
                            <label class="block text-xs font-bold text-[var(--color-accent)] uppercase tracking-widest mb-2">Subject</label>
                            <select name="subject" class="w-full bg-white dark:bg-black border border-gray-200 dark:border-white/10 text-black dark:text-white font-bold px-4 py-4 focus:outline-none focus:border-[var(--color-accent)] transition-colors uppercase appearance-none">
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Vehicle Purchase">Vehicle Purchase</option>
                                <option value="Service Request">Service Request</option>
                            </select>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-8 mb-8">
                             <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">First Name</label>
                                <input type="text" name="first_name" required class="w-full bg-white dark:bg-black border border-gray-200 dark:border-white/10 text-black dark:text-white font-bold px-4 py-4 focus:outline-none focus:border-[var(--color-accent)] transition-colors placeholder-gray-400 dark:placeholder-gray-800 uppercase" placeholder="NAME"
                                value="{{ Auth::check() ? explode(' ', Auth::user()->name)[0] : old('first_name') }}">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Last Name</label>
                                <input type="text" name="last_name" required class="w-full bg-white dark:bg-black border border-gray-200 dark:border-white/10 text-black dark:text-white font-bold px-4 py-4 focus:outline-none focus:border-[var(--color-accent)] transition-colors placeholder-gray-400 dark:placeholder-gray-800 uppercase" placeholder="SURNAME"
                                value="{{ Auth::check() && str_contains(Auth::user()->name, ' ') ? explode(' ', Auth::user()->name, 2)[1] : old('last_name') }}">
                            </div>
                        </div>

                        <div class="mb-8">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Email Address</label>
                            <input type="email" name="email" required class="w-full bg-white dark:bg-black border border-gray-200 dark:border-white/10 text-black dark:text-white font-bold px-4 py-4 focus:outline-none focus:border-[var(--color-accent)] transition-colors placeholder-gray-400 dark:placeholder-gray-800 uppercase" placeholder="EMAIL@EXAMPLE.COM"
                            value="{{ Auth::check() ? Auth::user()->email : old('email') }}">
                        </div>

                        <div class="mb-12">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Message</label>
                            <textarea name="message" rows="4" required class="w-full bg-white dark:bg-black border border-gray-200 dark:border-white/10 text-black dark:text-white font-bold px-4 py-4 focus:outline-none focus:border-[var(--color-accent)] transition-colors placeholder-gray-400 dark:placeholder-gray-800 uppercase" placeholder="TYPE YOUR MESSAGE..."></textarea>
                        </div>

                        <button type="submit" class="w-full py-5 bg-[var(--color-accent)] text-white font-black uppercase tracking-[0.2em] border border-[var(--color-accent)] hover:bg-black dark:hover:bg-white hover:text-white dark:hover:text-black hover:border-black dark:hover:border-white transition-all duration-300">
                            Send Request
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-site-layout>
