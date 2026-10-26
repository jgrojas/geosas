@if(filled(config('services.google_analytics.id')))
@php($gaId = config('services.google_analytics.id'))
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', @json($gaId));

    document.addEventListener('click', function (e) {
        var link = e.target.closest('a[href*="wa.me"]');
        if (!link || typeof gtag !== 'function') return;
        gtag('event', 'whatsapp_click', {
            event_category: 'engagement',
            event_label: link.getAttribute('aria-label') || 'WhatsApp',
            link_url: link.href
        });
    });
</script>
@endif
