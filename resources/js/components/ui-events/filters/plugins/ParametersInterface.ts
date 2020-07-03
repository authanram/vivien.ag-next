import { Event } from '@/state/models'

interface Parameters {
    dates: string[],
    tags: string[],
    types: string[],
}

export interface ParametersInterface {
    events: Event[],
    parameters: Parameters,
}
