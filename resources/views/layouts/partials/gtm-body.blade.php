@if (!app()->environment('local') && (cookieConsent('all') || cookieConsent('statistiken')))
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('env.GTM_ID') }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
@endif
