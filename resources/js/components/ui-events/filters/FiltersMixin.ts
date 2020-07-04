import { Event, EventType, Tag } from '@/state/models'
import RouteMixin from '@/components/mixins/RouteMixin'
import { filters } from './plugins/plugins'

export default {
    mixins: [RouteMixin],

    computed: {
        getFilteredDates (): string[] {
            return this.filteredDates
        },

        getFilteredEvents (): Event[] {
            return this.filteredEvents
        },

        getFilteredTags (): Tag[] {
            return this.filteredTags
        },

        getFilteredTypes (): EventType[] {
            return this.filteredTypes
        },
    },

    data: () => ({
        filteredDates: [],
        filteredEvents: [],
        filteredTags: [],
        filteredTypes: [],
        originEvents: null,
    }),

    methods: {
        filtersApply (events: Event[]): void {
            this.originEvents = this.originEvents || events

            this.filteredDates = []
            this.filteredEvents = []
            this.filteredTags = []
            this.filteredTypes = []

            const data = {
                events: this.originEvents,
                parameters: {
                    dates: this.routeGetQueryParameter('dates'),
                    tags: this.routeGetQueryParameter('tags'),
                    types: this.routeGetQueryParameter('types'),
                },
            }

            filters.forEach((filter: Function) => {
                const result = filter(data)

                Object.keys(result).forEach((key: string) => {
                    result[key].forEach((resultSubject) => {
                        if (!this[key].filter((filteredSubject) => filteredSubject.id === resultSubject.id).length) {
                            this[key].push(resultSubject)
                        }
                    })
                })
            })
        },
    },
}
