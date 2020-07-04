import { Fields, Model, Response } from '@/state/models/Model'
import { EventLocation, EventType, Tag, Taggable } from '@/state/models'

export default class Event extends Model {
    public static entity = 'events'

    public event_location_id: number
    public event_type_id: number
    public description: string
    public date_from: string
    public location: string
    public maximum_attendees: number
    public reserved_seats: number
    public price: number
    public price_note: string
    public catering: string
    public lead: string

    // relations
    public event_type: EventType
    public event_location: EventLocation
    public tags: Tag[]

    // custom
    public avatar_path: string
    public created_at_readable: string
    public date_duration: string
    public date_duration_days: number
    public date_from_object: object
    public date_to_object: object
    public is_filtered: boolean
    public is_recent: boolean

    public static fields (): Fields {
        return {
            id: this.attr(null),
            event_location_id: this.attr(null),
            event_type_id: this.attr(null),
            description: this.string(null),
            date_from: this.string(null),
            location: this.string(null),
            maximum_attendees: this.number(null),
            reserved_seats: this.number(null),
            price: this.number(null),
            price_note: this.string(null),
            catering: this.string(null),
            lead: this.string(null),

            // relations
            event_location: this.belongsTo(EventLocation, 'event_location_id'),
            event_type: this.belongsTo(EventType, 'event_type_id'),
            tags: this.morphToMany(Tag, Taggable, 'tag_id', 'taggable_id', 'taggable_type'),

            // custom
            avatar_path: this.string(null),
            created_at_readable: this.string(null),
            date_duration: this.string(null),
            date_duration_days: this.number(null),
            date_from_object: this.attr(null),
            date_to_object: this.attr(null),
            is_filtered: this.boolean(false),
            is_recent: this.boolean(false),
        }
    }

    public get hasCatering (): boolean {
        return this['catering'] !== 'nein'
    }

    public get hasPriceNote (): boolean {
        return this['price_note'] !== 'null'
    }

    public get from (): object {
        return this['date_from_object']
    }

    public get to (): object {
        return this['date_to_object']
    }

    public static fetch (): Promise<Response> {
        return Event.api().get(`/public-api/events/fetch`, {
            persistBy: 'insertOrUpdate',
            dataTransformer: ({ data, headers }) => {
                EventLocation.insertOrUpdate({ data: data['eventLocations'] })
                EventType.insertOrUpdate({data: data['eventTypes']})
                Taggable.insertOrUpdate({data: data['taggables']})
                Tag.insertOrUpdate({data: data['tags']})

                return data.events
            },
        })
    }
}
