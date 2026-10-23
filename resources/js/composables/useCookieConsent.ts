import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import type { CookieConsentConfig } from '@/types/public';

export type CookieConsent = Record<string, boolean>;

const DEFAULT_CONFIG: CookieConsentConfig = {
    name: 'vivienag_cookie_consent',
    lifetime: 365 * 20,
    consented: false,
    secure: false,
    sameSite: null,
    domain: null,
};

export function useCookieConsent() {
    const page = usePage();

    const config = computed(
        () =>
            (page.props.cookieConsent as CookieConsentConfig | undefined) ??
            DEFAULT_CONFIG,
    );

    function read(): CookieConsent {
        if (typeof document === 'undefined') {
            return {};
        }

        const prefix = `${config.value.name}=`;
        const raw = document.cookie
            .split('; ')
            .find((cookie) => cookie.startsWith(prefix));

        try {
            return raw
                ? (JSON.parse(
                      decodeURIComponent(raw.slice(prefix.length)),
                  ) as CookieConsent)
                : {};
        } catch {
            return {};
        }
    }

    function write(consent: CookieConsent): void {
        const { name, lifetime, secure, sameSite, domain } = config.value;
        const expires = new Date(Date.now() + lifetime * 86400000);

        document.cookie = [
            `${name}=${encodeURIComponent(JSON.stringify(consent))}`,
            `expires=${expires.toUTCString()}`,
            'path=/',
            domain && `domain=${domain}`,
            sameSite && `samesite=${sameSite}`,
            secure && 'secure',
        ]
            .filter(Boolean)
            .join('; ');
    }

    return { config, read, write };
}
