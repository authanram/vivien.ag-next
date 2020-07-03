import { Fields, Model } from '@/state/models/Model'

export default class Message extends Model {
    public static entity = 'messages'

    public messages: string[]
    public type: string

    public static fields (): Fields {
        return {
            id: this.attr(null),
            messages: this.attr(null),
            type: this.string(null).nullable(),
        }
    }
}
