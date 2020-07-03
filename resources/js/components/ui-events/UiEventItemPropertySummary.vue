<template>
    <div class="flex">
        <div class="w-10">
            <div
                :class="`bg-${color}-600`"
                class="h-4 mt-1 rounded w-4"
            />
        </div>
        <div class="flex-col flex-grow">
            <span
                :class="`text-${color}-600`"
                class="font-semibold leading-tight text-xl tracking-tight xl:text-2xl"
                style="padding-right:2px"
            >
                {{ name }}
            </span>
            <span
                v-if="nameExtension"
                class="text-sm"
            >
                {{ nameExtension }}
            </span>
            <div class="text-sm leading-5">
                {{ event.from.day }} {{ event.from.month_full }} {{ event.from.year }}
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
        },

        computed: {
            event (): Event {
                return this.item
            },

            name (): string {
                return this.event.event_type.name.split(', ')[0]
            },

            nameExtension (): string {
                return this.event.event_type.name.split(', ')[1]
            },
        },
    }
</script>
