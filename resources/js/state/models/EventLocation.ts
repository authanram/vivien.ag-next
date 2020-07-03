import { Fields, Model, Response } from '@/state/models/Model'
import { Event } from '@/state/models'

export default class EventLocation extends Model {
    public static entity = 'event_locations'

    public name: string
    public description: string
    public address: string
    public url: string

    // relations
    public events: Event[]

    public static fields (): Fields {
        return {
            id: this.attr(null),
            name: this.string(null),
            description: this.string(null),
            address: this.string(null),
            url: this.string(null),

            // relations
            events: this.hasMany(Event, 'event_id'),
        }
    }

    public static fetch (parameters: string = ''): Promise<Response> {
        return EventLocation.api().get(`/public-api/event-locations/fetch${parameters}`, {
            persistBy: 'insert',
            dataTransformer: ({ data, headers }) => data
        })
    }
}
