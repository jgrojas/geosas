@extends('layouts.app')

@section('title', config('seo.default_title'))
@section('meta_description', config('seo.default_description'))

@section('content')
{{-- Hero con banner épico - inspirado en Corte Laser Colombia --}}
@push('styles')
<style>
.hero-bg {
    background-image: url("{{ asset('img/hero-1.jpg') }}");
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
}
@media (max-width: 640px) {
    .hero-bg { background-position: center 40%; }
}
</style>
@endpush
<section class="hero-bg relative min-h-[70vh] sm:min-h-[65vh] pt-24 lg:pt-32 pb-16 lg:pb-24 flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0 bg-gradient-to-r from-stone-900/90 via-stone-900/75 to-stone-900/60"></div>
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight tracking-tight drop-shadow-lg break-words">
                {{ __('messages.hero_title') }}
            </h1>
            <p class="mt-4 sm:mt-6 text-base sm:text-lg lg:text-xl text-white leading-relaxed drop-shadow break-words">
                {{ __('messages.hero_subtitle') }}
            </p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('geo.whatsapp_number')) }}?text={{ urlencode(config('geo.whatsapp_message')) }}" target="_blank" rel="noopener" class="inline-flex justify-center items-center px-8 py-4 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all">
                    {{ __('messages.hero_cta_quote') }}
                </a>
                <a href="{{ route('home') }}#contact" class="inline-flex justify-center items-center px-8 py-4 bg-white hover:bg-stone-50 text-stone-800 font-semibold rounded-lg border-2 border-stone-200 hover:border-amber-300 transition-all">
                    {{ __('messages.hero_cta_contact') }}
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Features - Por qué elegirnos (inspirado en Cutr: Pricing, Production, Quality, Management) --}}
<section id="services" class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl lg:text-4xl font-bold text-stone-900 text-center mb-12 lg:mb-16">
            {{ __('messages.trust_title') }}
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="p-6 rounded-2xl bg-stone-50 hover:bg-amber-50/50 transition-colors border border-stone-100">
                <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center text-amber-600 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
                <h3 class="font-semibold text-lg text-stone-900">{{ __('messages.feature_design_title') }}</h3>
                <p class="mt-2 text-stone-600 text-sm">{{ __('messages.feature_design_desc') }}</p>
            </div>
            <div class="p-6 rounded-2xl bg-stone-50 hover:bg-amber-50/50 transition-colors border border-stone-100">
                <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center text-amber-600 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                </div>
                <h3 class="font-semibold text-lg text-stone-900">{{ __('messages.feature_laser_title') }}</h3>
                <p class="mt-2 text-stone-600 text-sm">{{ __('messages.feature_laser_desc') }}</p>
            </div>
            <div class="p-6 rounded-2xl bg-stone-50 hover:bg-amber-50/50 transition-colors border border-stone-100">
                <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center text-amber-600 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                </div>
                <h3 class="font-semibold text-lg text-stone-900">{{ __('messages.feature_mdf_title') }}</h3>
                <p class="mt-2 text-stone-600 text-sm">{{ __('messages.feature_mdf_desc') }}</p>
            </div>
            <div class="p-6 rounded-2xl bg-stone-50 hover:bg-amber-50/50 transition-colors border border-stone-100">
                <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center text-amber-600 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
                <h3 class="font-semibold text-lg text-stone-900">{{ __('messages.feature_quality_title') }}</h3>
                <p class="mt-2 text-stone-600 text-sm">{{ __('messages.feature_quality_desc') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- Galería - 6 cols descripción + 6 cols carrusel --}}
@php
    $galleryImages = [];
    $galleryPath = public_path('img/gallery');
    if (is_dir($galleryPath)) {
        $files = array_diff(scandir($galleryPath), ['.', '..']);
        foreach ($files as $file) {
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($ext, ['png', 'jpg', 'jpeg', 'webp'])) {
                $galleryImages[] = 'img/gallery/' . $file;
            }
        }
        sort($galleryImages);
    }
@endphp
@if(count($galleryImages) > 0)
@push('styles')
<style>
#gallery .gallery-carousel { position: relative; }
#gallery .gallery-prev { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); z-index: 20; }
#gallery .gallery-next { position: absolute; right: 16px; top: 50%; transform: translateY(-50%); z-index: 20; }
#gallery .gallery-dots { position: absolute; bottom: 16px; left: 0; right: 0; display: flex; justify-content: center; gap: 8px; z-index: 20; }
</style>
@endpush
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imgs = @json(array_map(fn($p) => asset($p), $galleryImages));
    const imgEl = document.getElementById('galleryImg');
    const dots = document.querySelectorAll('#gallery .gallery-dot');
    if (!imgEl || imgs.length === 0) return;
    let i = 0;
    function go(n) {
        i = (n + imgs.length) % imgs.length;
        imgEl.src = imgs[i];
        imgEl.alt = 'Producto ' + (i + 1);
        dots.forEach((d, j) => { d.classList.toggle('bg-amber-600', j === i); d.classList.toggle('bg-stone-300', j !== i); });
    }
    setInterval(() => go(i + 1), 3000);
    dots.forEach((d, j) => d.addEventListener('click', () => go(j)));
    document.getElementById('galleryPrev')?.addEventListener('click', () => go(i - 1));
    document.getElementById('galleryNext')?.addEventListener('click', () => go(i + 1));
});
</script>
@endpush
<section id="gallery" class="py-16 lg:py-24 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-stone-900">
                    {{ __('messages.gallery_title') }}
                </h2>
                <p class="mt-4 text-stone-600 text-lg leading-relaxed">
                    {{ __('messages.gallery_description') }}
                </p>
            </div>
            <div class="gallery-carousel relative rounded-2xl overflow-hidden shadow-xl border border-stone-200 bg-white" style="height: 380px;">
                <div class="absolute inset-0 flex items-center justify-center p-16">
                    <img id="galleryImg" src="{{ asset($galleryImages[0]) }}" alt="Producto Geo Creaciones" class="max-h-full max-w-full object-contain">
                </div>
                <button type="button" id="galleryPrev" class="gallery-prev w-11 h-11 rounded-full bg-white border-2 border-stone-200 flex items-center justify-center text-stone-600 hover:text-amber-600 hover:border-amber-400 hover:bg-amber-50 transition-all shadow-md" aria-label="Anterior">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button type="button" id="galleryNext" class="gallery-next w-11 h-11 rounded-full bg-white border-2 border-stone-200 flex items-center justify-center text-stone-600 hover:text-amber-600 hover:border-amber-400 hover:bg-amber-50 transition-all shadow-md" aria-label="Siguiente">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
                <div class="gallery-dots">
                    @foreach($galleryImages as $i => $img)
                    <button type="button" class="gallery-dot w-2.5 h-2.5 rounded-full transition-all cursor-pointer {{ $i === 0 ? 'bg-amber-600' : 'bg-stone-300 hover:bg-stone-400' }}" data-index="{{ $i }}" aria-label="Imagen {{ $i + 1 }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Contacto con mapa e info --}}
<section id="contact" class="py-16 lg:py-24 bg-stone-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold">
                {{ __('messages.cta_title') }}
            </h2>
            <p class="mt-4 text-stone-300 text-lg">
                {{ __('messages.cta_subtitle') }}
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
            <div class="space-y-6">
                <div>
                    <h3 class="font-semibold text-amber-400 mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ __('messages.contact_address') }}
                    </h3>
                    <p class="text-stone-300">{{ config('geo.address') }}</p>
                </div>
                <div>
                    <h3 class="font-semibold text-amber-400 mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        {{ __('messages.contact_email') }}
                    </h3>
                    <a href="mailto:{{ config('geo.email') }}" class="text-stone-300 hover:text-amber-400 transition-colors">{{ config('geo.email') }}</a>
                </div>
                <div>
                    <h3 class="font-semibold text-amber-400 mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        {{ __('messages.contact_phone') }}
                    </h3>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('geo.whatsapp_number')) }}" class="text-stone-300 hover:text-amber-400 transition-colors">{{ preg_replace('/^57(\d{3})(\d{3})(\d{4})$/', '+57 $1 $2 $3', preg_replace('/[^0-9]/', '', config('geo.whatsapp_number'))) ?: config('geo.whatsapp_number') }}</a>
                </div>
                <div>
                    <h3 class="font-semibold text-amber-400 mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        WhatsApp
                    </h3>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('geo.whatsapp_number')) }}?text={{ urlencode(config('geo.whatsapp_message')) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition-colors">
                        {{ __('messages.cta_whatsapp') }}
                    </a>
                </div>
            </div>
            <div class="rounded-xl overflow-hidden shadow-2xl border border-stone-700 h-80 md:h-full min-h-80">
                <iframe src="{{ config('geo.maps_embed_url') }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Ubicación Geo Creaciones"></iframe>
            </div>
        </div>
    </div>
</section>

{{-- About - breve intro --}}
<section id="about" class="py-16 lg:py-24 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-2xl lg:text-3xl font-bold text-stone-900">
                Geo Creaciones en Madera
            </h2>
            <p class="mt-4 text-stone-600 leading-relaxed">
                {{ __('messages.about_text') }}
            </p>
        </div>
    </div>
</section>
@endsection
