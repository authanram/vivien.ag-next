import { Fields, Model } from '@/state/models/Model'
import { Tag, Taggable } from '@/state/models'

export default class Post extends Model {
    public static entity = 'posts'

    public title: string
    public slug: string
    public body: string
    public published_at: string
    public published_at_readable: string

    // relations
    public tags: Tag[]

    public static fields (): Fields {
        return {
            id: this.attr(null),
            title: this.string(null),
            slug: this.string(null),
            body: this.string(null),
            published_at: this.string(false),
            published_at_readable: this.string(null),

            // relations
            tags: this.morphToMany(Tag, Taggable, 'tag_id', 'taggable_id', 'taggable_type'),
        }
    }
}
