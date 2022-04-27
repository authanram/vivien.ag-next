<template>
    <div class="lg:flex w-full">

        <div class="xl:w-7/12 w-full">

            <ui-events
                :accent="accent"
                :items="events"
                :loading="loading"
            ></ui-events>

        </div>

        <div class="hidden lg:block lg:pl-6 xl:pl-12 xl:w-5/12 w-full">

            <div class="relative">
                <ui-card
                    :class="{ 'pb-16' : routeHasQueryParameter('types') }"
                    class="p-6 pt-8"
                >
                    <ui-event-filters-type
                        :accent="accent"
                        :items="events"
                        :loading="loading"
                        :types="types"
                    ></ui-event-filters-type>
                </ui-card>
                <ui-event-filters-reset
                    v-if="!loading && routeHasQueryParameter('types')"
                    :accent="accent"
                    parameter="types"
                />
            </div>

            <ui-card v-if="false">
                <ui-event-filters-date
                    :accent="accent"
                    :items="dates"
                    :loading="loading"
                ></ui-event-filters-date>
            </ui-card>

            <div class="relative">
                <ui-card :class="routeHasQueryParameter('tags') ? 'pb-16' : 'pb-6'">
                    <ui-event-filters-tags
                        :accent="accent"
                        :items="tags"
                        :loading="loading"
                    ></ui-event-filters-tags>
                </ui-card>
                <ui-event-filters-reset
                    v-if="!loading && routeHasQueryParameter('tags')"
                    :accent="accent"
                    parameter="tags"
                />
            </div>

            <ui-card v-if="false">
                {{ query }}
            </ui-card>

        </div>

    </div>
</template>

<script lang="ts">
    import * as model from '@/state/models'
    import {sleep} from '@/Helpers'
    import FiltersMixin from '@/components/ui-events/filters/FiltersMixin'
    import RouteMixin from '@/components/mixins/RouteMixin'

    export default {
        mixins: [FiltersMixin, RouteMixin],

        components: {
            'ui-event-filters-reset': () => import('@/components/ui-events/filters/UiEventFiltersReset.vue'),
            'ui-event-filters-tags': () => import('@/components/ui-events/filters/UiEventFiltersTags.vue'),
            'ui-event-filters-type': () => import('@/components/ui-events/filters/UiEventFiltersType.vue'),
            'ui-events': () => import('@/components/ui-events/UiEvents.vue'),
        },

        props: {
            accent: {
                required: true,
                type: String,
            },
            query: {
                default: null,
                required: false,
                type: Object,
            },
        },

        watch: {
            '$route': 'filter'
        },

        computed: {
            dates (): string[] {
                return this.getFilteredDates.length
                    ? this.getFilteredDates
                    :[]
            },

            events (): model.Event[] {
                return this.getFilteredEvents.length
                    ? this.getFilteredEvents
                    :model.Event
                          .query()
                          .with('event_location')
                          .with('event_type')
                          .with('event_type.color')
                          .with('event_type.icon')
                          .with('tags')
                          .with('tags.color')
                          .with('tags.icon')
                          .orderBy('date_from')
                          .get()
            },

            loading (): boolean {
                return this.fetching || !this.events.length || !this.tags.length
            },

            tags (): model.Tag[] {
                return this.getFilteredTags.length
                    ? this.getFilteredTags
                    :model.Tag
                          .query()
                          .where('type', 'event')
                          .with('color')
                          .get()
            },

            types (): model.EventType[] {
                return this.getFilteredTypes.length
                    ? this.getFilteredTypes
                    :model.EventType
                          .query()
                          .with('color')
                          .with('events')
                          .orderBy('name')
                          .get()
            },
        },

        data (): object {
            return {
                fetching: true,
            }
        },

        methods: {
            filter (): void {
                this.filtersApply(this.events)
            },
        },

        created (): void {
            model.Event.fetch().then(() => {
                this.fetching = false
                this.$event.$emit('overlay.destroy')
                this.filter()
            })
        },

        mounted (): void {
            this.$event.$on('event.filters', (payload) => {
                this.$event.$emit('overlay.load')

                this.routeToggleQueryParameter(payload.key, String(payload.value))

                sleep(250).then(() => this.$event.$emit('overlay.destroy'))
            })
        },

        beforeDestroy (): void {
            this.$event.$off('event.filters')
        },
    }
</script>
