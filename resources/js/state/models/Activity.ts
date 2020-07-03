import { Fields, Model, Response } from '@/state/models/Model'
import { Event, EventLocation, EventType, Post, Tag, Taggable } from '@/state/models'

export default class Activity extends Model {
    public static entity = 'activities'

    public entity: string

    public static fields (): Fields {
        return {
            id: this.attr(null),
            entity: this.string(null),
        }
    }

    public static recent(): Promise<Response> {
        return Activity.api().get('/public-api/activities/recent', {
            persistBy: 'insert',
            dataTransformer: ({ data }) => {
                Event.insert({ data: data['events'] })
                EventLocation.insert({ data: data['eventLocations'] })
                EventType.insert({ data: data['eventTypes'] })
                Post.insert({ data: data['posts'] })
                Taggable.insert({ data: data['taggables'] })
                Tag.insert({ data: data['tags'] })

                return data['activities']
            }
        })
    }
}
