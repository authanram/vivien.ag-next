import { Event, Tag } from '@/state/models'
import { ParametersInterface } from './ParametersInterface.js'

export const filter = (data: ParametersInterface): object => {
    const fn = (event: Event) => event.tags.filter(
        (tag: Tag) => data.parameters.tags.includes(tag.name.de)
    ).length

    return {
        filteredEvents: data.parameters.tags
            ? data.events.filter(fn)
            : []
    }
}
