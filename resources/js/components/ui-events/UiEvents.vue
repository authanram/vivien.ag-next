<template>
    <div>
        <template v-for="(event, index) in loading ? [{}, {}, {}] : events">
            <ui-intersect
                @intersect="intersectedIndexes.push(index)"
                rootMargin="20px"
            >
                <div class="flex margin">
                    <transition name="fade">
                        <div
                            v-if="intersectedIndexes.includes(index)"
                            class="flex flex-col hidden xl:block relative xl:w-1/4"
                        >
                            <div
                                v-if="event.from"
                                class="flex justify-center margin px-3"
                            >
                                <ui-event-timeline-item :item="event" />
                                <div
                                    v-if="index < events.length - 1"
                                    class="absolute flex h-full justify-center top-0 w-full"
                                >
                                    <div class="mt-24 pt-7">
                                        <div
                                            class="bg-gray-200 h-full"
                                            style="width:1px"
                                        ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>
                    <div class="xl:w-3/4 w-full">
                        <div style="min-height:284px">
                            <transition name="fade">
                                <ui-event-item
                                    v-if="intersectedIndexes.includes(index)"
                                    :key="index"
                                    :item="event"
                                />
                            </transition>
                        </div>
                    </div>
                </div>
            </ui-intersect>
        </template>
    </div>
</template>

<script lang="ts">
    import Event from '@/state/models/Event'
    import DefaultPropertiesMixin from '@/components/ui-events/DefaultPropertiesMixin'

    export default {
        mixins: [DefaultPropertiesMixin],

        components: {
            'ui-event-item': () => import('@/components/ui-events/UiEventItem.vue'/* webpackChunkName: "ui-event-item" */),
            'ui-event-timeline-item': () => import('@/components/ui-events/UiEventTimelineItem.vue'/* webpackChunkName: "ui-event-timeline-item" */),
        },

        data: function (): object {
            return {
                intersectedIndexes: [],
            }
        },

        computed: {
            events (): Event[] {
                return this.items
            },
        },
    }
</script>
