import {Fields, Model, Response} from '@/state/models/Model'
import { CookieConsentProvider } from '@/state/models'

export default class CookieConsentCookie extends Model {
    public static entity = 'cookie_consent_cookies'

    public cookie_name: string
    public cookie_consent_provider_id: number
    public cookie_purpose: string
    public cookie_category: string
    public cookie_type: string
    public cookie_lifetime: number
    public encrypted: boolean
    public required: boolean

    // relations
    public cookie_provider: CookieConsentProvider

    public static fields (): Fields {
        return {
            id: this.attr(null),
            cookie_name: this.string(null),
            cookie_consent_provider_id: this.attr(null),
            cookie_purpose: this.string(null),
            cookie_category: this.string(null),
            cookie_type: this.string(null),
            cookie_lifetime: this.number(null),
            encrypted: this.boolean(null),
            required: this.boolean(null),

            // relations
            cookie_provider: this.belongsTo(CookieConsentProvider, 'cookie_consent_provider_id'),
        }
    }

    public static fetch (): Promise<Response> {
        return CookieConsentCookie.api().get(`/public-api/cookie-consent/fetch`, {
            persistBy: 'insert',
            dataTransformer: ({ data, headers }) => data
        })
    }
}
