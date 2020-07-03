import { Fields, Model, Response } from '@/state/models/Model'
import { Color, Event } from '@/state/models'

export default class EventType extends Model {
    public static entity = 'event_types'

    public color_id: number
    public name: string
    public description: string

    // relations
    public color: Color
    public events: Event[]

    // custom
    public is_recent: boolean

    public static fields (): Fields {
        return {
            id: this.attr(null),
            color_id: this.attr(null),
            name: this.string(null),
            description: this.string(null),

            // relations
            color: this.belongsTo(Color, 'color_id'),
            events: this.hasMany(Event, 'event_type_id'),

            // custom
            is_recent: this.boolean(false),
        }
    }

    public get getName (): string {
        return this.name.split(', ')[0]
    }

    public get getNameCaption (): string {
        return this.name.split(', ')[1]
    }

    public get getCountEvents (): number {
        return this.events.length
    }

    public static fetch (parameters: string = ''): Promise<Response> {
        return EventType.api().get(`/public-api/event-types/fetch${parameters}`, {
            persistBy: 'insert',
            dataTransformer: ({ data, headers }) => data
        })
    }
}
