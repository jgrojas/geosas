<header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm border-b border-stone-200">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">
            <a href="{{ route('home') }}" class="flex items-center font-semibold text-stone-800 hover:text-amber-700 transition-colors">
                <img src="{{ asset('img/Logo.png') }}" alt="Geo Creaciones en Madera" class="h-14 lg:h-16 w-auto">
            </a>
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}#services" class="text-stone-600 hover:text-amber-600 transition-colors font-medium">{{ __('messages.nav_services') }}</a>
                <a href="{{ route('home') }}#gallery" class="text-stone-600 hover:text-amber-600 transition-colors font-medium">{{ __('messages.nav_gallery') }}</a>
                <a href="{{ route('home') }}#about" class="text-stone-600 hover:text-amber-600 transition-colors font-medium">{{ __('messages.nav_about') }}</a>
                <a href="{{ route('home') }}#contact" class="text-stone-600 hover:text-amber-600 transition-colors font-medium">{{ __('messages.nav_contact') }}</a>
                <div class="flex items-center gap-1 border-l border-stone-200 pl-6">
                    <a href="{{ route('locale.switch', 'es') }}" class="px-2 py-1 text-sm rounded {{ app()->getLocale() === 'es' ? 'bg-amber-100 text-amber-800 font-medium' : 'text-stone-500 hover:text-stone-700' }}">ES</a>
                    <span class="text-stone-300">|</span>
                    <a href="{{ route('locale.switch', 'en') }}" class="px-2 py-1 text-sm rounded {{ app()->getLocale() === 'en' ? 'bg-amber-100 text-amber-800 font-medium' : 'text-stone-500 hover:text-stone-700' }}">EN</a>
                </div>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('geo.whatsapp_number')) }}?text={{ urlencode(config('geo.whatsapp_message')) }}" target="_blank" rel="noopener" class="inline-flex items-center px-5 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition-colors shadow-sm">{{ __('messages.nav_get_quote') }}</a>
            </div>
            <button type="button" id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-stone-600 hover:bg-stone-100" aria-label="Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-stone-100">
            <div class="pt-4 flex flex-col gap-2">
                <a href="{{ route('home') }}#services" class="px-4 py-2 text-stone-600 hover:bg-stone-50 rounded-lg">{{ __('messages.nav_services') }}</a>
                <a href="{{ route('home') }}#gallery" class="px-4 py-2 text-stone-600 hover:bg-stone-50 rounded-lg">{{ __('messages.nav_gallery') }}</a>
                <a href="{{ route('home') }}#about" class="px-4 py-2 text-stone-600 hover:bg-stone-50 rounded-lg">{{ __('messages.nav_about') }}</a>
                <a href="{{ route('home') }}#contact" class="px-4 py-2 text-stone-600 hover:bg-stone-50 rounded-lg">{{ __('messages.nav_contact') }}</a>
                <div class="flex gap-2 px-4 py-2">
                    <a href="{{ route('locale.switch', 'es') }}" class="px-3 py-1.5 text-sm rounded {{ app()->getLocale() === 'es' ? 'bg-amber-100 text-amber-800' : 'text-stone-500' }}">ES</a>
                    <a href="{{ route('locale.switch', 'en') }}" class="px-3 py-1.5 text-sm rounded {{ app()->getLocale() === 'en' ? 'bg-amber-100 text-amber-800' : 'text-stone-500' }}">EN</a>
                </div>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('geo.whatsapp_number')) }}" target="_blank" rel="noopener" class="mx-4 mt-2 inline-flex justify-center items-center px-5 py-2.5 bg-amber-600 text-white font-medium rounded-lg">{{ __('messages.nav_get_quote') }}</a>
            </div>
        </div>
    </nav>
</header>
<script>document.getElementById('mobile-menu-btn')?.addEventListener('click',function(){document.getElementById('mobile-menu').classList.toggle('hidden')});</script>
