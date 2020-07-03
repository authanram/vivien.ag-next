import { Event } from '@/state/models'
import { ParametersInterface } from './ParametersInterface.js'

export const filter = (data: ParametersInterface): object => {
    const fn = (event: Event) => data.parameters.types.includes(String(event.event_type_id))

    return {
        filteredEvents: data.parameters.types
            ? data.events.filter(fn)
            : []
    }
}
