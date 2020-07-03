import {Fields, Model} from '@/state/models/Model'
import {Tag, Taggable} from '@/state/models'

export default class Image extends Model {
    public static entity = 'images'

    public name: string
    public description: string
    public price: string
    public order_column: string
    public path: string

    // relations
    public tags: Tag[]

    public static fields (): Fields {
        return {
            id: this.attr(null),
            name: this.string(null),
            description: this.string(null),
            price: this.number(null),
            order_column: this.number(null),
            path: this.string(null),

            // relations
            tags: this.morphToMany(Tag, Taggable, 'tag_id', 'taggable_id', 'taggable_type'),
        }
    }
}
