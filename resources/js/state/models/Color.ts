import { Fields, Model, Response } from '@/state/models/Model'
import { EventType, MenuItem, Tag } from '@/state/models'

export default class Color extends Model {
    public static entity = 'colors'

    public color: string

    // relations
    public event_types: EventType[]
    public menu_items: MenuItem[]
    public tags: Tag[]

    public static fields (): Fields {
        return {
            id: this.attr(null),
            color: this.string(null),

            // relations
            event_types: this.hasMany(EventType, 'color_id'),
            menu_items: this.hasMany(MenuItem, 'color_id'),
            tags: this.hasMany(Tag, 'color_id'),
        }
    }

    public static fetch (parameters: string = ''): Promise<Response> {
        return Color.api().get(`/public-api/colors/fetch${parameters}`, {
            persistBy: 'insert',
            dataTransformer: ({ data, headers }) => data
        })
    }
}
