import { Fields, Model } from '@/state/models/Model'
import { Quote } from '@/state/models'

export default class Author extends Model {
    public static entity = 'authors'

    public name: string
    public occupation: string
    public url: string

    // relations
    public quotes: Quote[]

    public static fields (): Fields {
        return {
            id: this.attr(null),
            name: this.string(null),
            occupation: this.string(null).nullable(),
            url: this.string(null).nullable(),

            // relations
            quotes: this.hasMany(Quote, 'author_id')
        }
    }
}
