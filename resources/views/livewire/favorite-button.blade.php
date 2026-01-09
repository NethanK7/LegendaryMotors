<div class="inline-block relative z-30">
    <button wire:click.stop="toggle" 
            class="p-2 rounded-full transition-transform active:scale-95 group focus:outline-none">
        
        @if($isFavorited)
            <!-- Filled Heart -->
            <svg class="w-6 h-6 text-[var(--color-accent)] animate-pulse-once" fill="currentColor" stroke="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
        @else
            <!-- Outline Heart -->
            <svg class="w-6 h-6 text-gray-400 group-hover:text-[var(--color-accent)] transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
        @endif
    </button>
</div>
