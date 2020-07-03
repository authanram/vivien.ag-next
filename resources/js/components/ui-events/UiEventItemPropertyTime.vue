<template>
    <div class="flex">
        <div class="flex items-center w-10">
            <ui-icon
                v-if="icon"
                class="text-gray-500"
                icon="clock"
                nudge="-1"
            />
        </div>
        <div class="md:flex flex-grow items-center leading-tight text-lg">
            <div class="flex-grow">
                <template v-if="!event.date_duration_days">
                    {{ event.from.hours }}:{{ event.from.minutes }} - {{ event.to.hours }}:{{ event.to.minutes }} Uhr
                </template>
                <template v-else>
                    {{ date.hours }}:{{ date.minutes }},
                    <span class="mt-1 opacity-75 text-sm">
                        {{ date.day }} {{ date.month_full }} {{ date.year }}
                    </span>
                </template>
            </div>
            <div
                v-if="!to"
                class="md:text-right md:mt-0 mt-2"
            >
                <div :class="`inline-block bg-${color}-600 p-1 px-2 text-sm text-white rounded`">
                    {{ event.date_duration }}
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    import { Event } from '@/state/models'

    export default {
        props: {
            color: {
                required: true,
                type: String,
            },
            item: {
                required: true,
                type: Object,
            },
            icon: {
                default: false,
                required: false,
                type: Boolean,
            },
            to: {
                default: false,
                required: false,
                type: Boolean,
            },
        },

        computed: {
            event (): Event {
                return this.item
            },
            date (): string {
                return this.to ? this.event.to : this.event.from
            }
        },
    }
</script>
