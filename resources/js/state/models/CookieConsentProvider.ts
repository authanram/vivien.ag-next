import { Fields, Model } from '@/state/models/Model'
import { CookieConsentCookie } from '@/state/models'

export default class CookieConsentProvider extends Model {
    public static entity = 'cookie_consent_providers'

    public name: string
    public url: string

    // relations
    public cookies: CookieConsentCookie[]

    public static fields (): Fields {
        return {
            id: this.attr(null),
            name: this.string(null),
            url: this.string(null),

            // relations
            cookies: this.hasMany(CookieConsentCookie, 'cookie_consent_provider_id'),
        }
    }
}
