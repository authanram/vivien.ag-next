import { Event } from '@/state/models'
import { ParametersInterface } from './ParametersInterface.js'

export const filter = (data: ParametersInterface): object => {
    const fn = (event: Event) => true

    return {
        filteredEvents: data.parameters.dates
            ? data.events.filter(fn)
            : []
    }
}
