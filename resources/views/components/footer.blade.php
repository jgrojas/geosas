<footer class="bg-stone-900 text-stone-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
            <div>
                <a href="{{ route('home') }}" class="inline-block mb-4">
                    <img src="{{ asset('img/Logo.png') }}" alt="Geo Creaciones en Madera" class="h-12 lg:h-14 w-auto opacity-95 hover:opacity-100 transition-opacity">
                </a>
                <p class="text-stone-400 text-sm">{{ __('messages.footer_tagline') }}</p>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-4">{{ __('messages.footer_services') }}</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}#services" class="hover:text-amber-400 transition-colors">Diseño personalizado</a></li>
                    <li><a href="{{ route('home') }}#services" class="hover:text-amber-400 transition-colors">Corte láser</a></li>
                    <li><a href="{{ route('home') }}#services" class="hover:text-amber-400 transition-colors">Grabado láser</a></li>
                    <li><a href="{{ route('home') }}#services" class="hover:text-amber-400 transition-colors">MDF y acrílico (hasta 9 mm)</a></li>
                    <li><a href="{{ route('home') }}#services" class="hover:text-amber-400 transition-colors">Prototipos y producción</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-4">{{ __('messages.footer_contact') }}</h3>
                <div class="space-y-2 text-sm">
                    <p class="text-stone-400">{{ config('geo.address') }}</p>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('geo.whatsapp_number')) }}" class="block text-amber-400 hover:text-amber-300 transition-colors">{{ preg_replace('/^57(\d{3})(\d{3})(\d{4})$/', '+57 $1 $2 $3', preg_replace('/[^0-9]/', '', config('geo.whatsapp_number'))) ?: config('geo.whatsapp_number') }}</a>
                    <a href="mailto:{{ config('geo.email') }}" class="block text-amber-400 hover:text-amber-300 transition-colors">{{ config('geo.email') }}</a>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('geo.whatsapp_number')) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 text-amber-400 hover:text-amber-300 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-12 pt-8 border-t border-stone-800 text-center text-sm text-stone-500">
            &copy; {{ date('Y') }} Geo Creaciones en Madera. {{ __('messages.footer_rights') }}
        </div>
    </div>
</footer>
