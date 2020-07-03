import { Fields, Model } from '@/state/models/Model'
import { Tag, Taggable } from '@/state/models'

export default class Attachment extends Model {
    public static entity = 'attachments'

    public file: string
    public name: string

    // relations
    public tags: Tag[]

    public static fields (): Fields {
        return {
            id: this.attr(null),
            file: this.string(null),
            name: this.string(null),

            // relations
            tags: this.morphToMany(Tag, Taggable, 'tag_id', 'taggable_id', 'taggable_type').as('pivot'),
        }
    }
}
