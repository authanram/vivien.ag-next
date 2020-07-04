import { Fields, Model, Response } from '@/state/models/Model'

import {
    //Attachment,
    Color,
    Event,
    Image,
    Post,
    Taggable,
} from '@/state/models'

export default class Tag extends Model {
    public static entity = 'tags'

    public name: { de: string }
    public slug: { de: string }
    public type: string
    public order_column: number

    // relations
    public color: Color
    //public attachments: Attachment[]
    public events: Event[]
    public images: Image[]
    public posts: Post[]

    public static fields (): Fields {
        return {
            id: this.attr(null),
            name: this.attr(null),
            slug: this.attr(null),
            type: this.string(null),
            order_column: this.number(null),
            color_id: this.attr(null),

            // relations
            color: this.belongsTo(Color, 'color_id'),
            //attachments: this.morphedByMany(Attachment, Taggable, 'tag_id', 'taggable_id', 'taggable_type'),
            events: this.morphedByMany(Event, Taggable, 'tag_id', 'taggable_id', 'taggable_type'),
            images: this.morphedByMany(Image, Taggable, 'tag_id', 'taggable_id', 'taggable_type'),
            posts: this.morphedByMany(Post, Taggable, 'tag_id', 'taggable_id', 'taggable_type'),
        }
    }

    public static fetch (parameters: string = ''): Promise<Response> {
        return Tag.api().get(`/public-api/tags/fetch${parameters}`, {
            persistBy: 'insert',
            dataTransformer: ({ data, headers }) => data
        })
    }
}
