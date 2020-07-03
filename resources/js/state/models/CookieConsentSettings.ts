import { Fields, Model } from '@/state/models/Model'

export default class CookieConsentSettings extends Model {
    public static entity = 'cookie_consent_settings'

    public cookie_data: string

    public static fields (): Fields {
        return {
            id: this.attr(null),
            cookie_data: this.attr(null),
        }
    }

    public cookieData (): object
    {
        return this['cookie_data']
            ? JSON.parse(this['cookie_data'])
            : {}
    }
}
