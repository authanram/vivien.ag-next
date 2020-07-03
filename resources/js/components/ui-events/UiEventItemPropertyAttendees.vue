<template>
    <div class="flex">
        <div class="flex items-center w-10">
            <ui-icon
                class="text-gray-500"
                icon="users"
                nudge="-2"
            />
        </div>
        <div class="flex-grow leading-tight text-lg">
            <div>
                {{ event.maximum_attendees }} Teilnehmer
                <span class="leading-5 opacity-75 text-sm">maximal</span>
            </div>
            <div
                v-if="event.reserved_seats"
                class="opacity-75 text-sm"
            >
                {{ event.reserved_seats }} Reservierungen
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    import { Event } from '@/state/models'

    export default {
        props: {
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
                return this.event.event_type.name.split(', ')[1] || null
            },
        },
    }
</script>
