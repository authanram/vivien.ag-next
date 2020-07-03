@if ($cookieConsentConfig['enabled'] && ! $alreadyConsentedWithCookies)

    @include('cookieConsent::dialogContents')
    @php($cookie = $cookieConsentConfig['cookie_name'])

    <script>

        window.laravelCookieConsent = (function () {
            const COOKIE_DOMAIN = '{{ config('session.domain') ?? request()->getHost() }}';

            function consentSetCookie(params) {
                eval('var consentStringValue = ' + params)

                window.jscookie.set('{{ $cookie }}', JSON.stringify(consentStringValue), {
                    domain: COOKIE_DOMAIN,
                    expires: {{ $cookieConsentConfig['cookie_lifetime'] }},
                    path: "/{{ (config('session.secure') ? 'secure' : null) }}",
                    samesite: "{{ config('session.same_site') ?: null }}",
                    secure: "{{ config('session.secure') ?: false }}",
                });

                window.axios.post('{{ routeIfExists('cookie-consent.update-preferences') }}', {
                    value: JSON.parse(JSON.stringify(consentStringValue)),
                });
            }

            function consentHideCookieDialog() {
                const dialogs = document.getElementsByClassName('js-cookie-consent');

                for (let i = 0; i < dialogs.length; ++i) {
                    dialogs[i].style.display = 'none';
                }
            }

            function consentCookieExists() {
                return (document.cookie.split('; ').indexOf('{{ $cookieConsentConfig['cookie_name'] }}') !== -1);
            }

            if (consentCookieExists()) {
                consentHideCookieDialog();
            }

            const buttons = document.getElementsByClassName('js-cookie-consent-button');

            for (let i = 0; i < buttons.length; ++i) {
                const params = buttons[i].getAttribute('data-callback-params');

                if (params) {
                    buttons[i].addEventListener('click', function () {
                        consentSetCookie(params);
                        consentHideCookieDialog();
                    });
                } else {
                    throw new Error('Missing attribute "data-callback-params" for element: '+ buttons[i].outerHTML);
                }
            }

            return {
                consentCookieExists: consentCookieExists,
                consentHideCookieDialog: consentHideCookieDialog,
                consentSetCookie: consentSetCookie,
            };
        })();
    </script>

@endif
