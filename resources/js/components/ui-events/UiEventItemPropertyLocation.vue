<template>
    <div class="flex">
        <div class="flex items-center w-10">
            <ui-icon
                class="text-gray-500"
                icon="mapPin"
                nudge="-1"
            />
        </div>
        <div class="flex-grow items-center leading-tight md:text-lg">
            <div>
                {{ name || address }}
            </div>
            <div
                v-if="name && address !== '-' && address !== 'Geißwiesen 24/1'"
                class="leading-5 opacity-75 pt-1 text-sm"
            >
                {{ address }}
            </div>
            <div
                v-if="zipAndTown"
                class="leading-4 opacity-75 pt-1 text-sm"
            >
                {{ zipAndTown }}
                <span
                    v-if="url"
                    class="block md:inline md:mt-0 mt-2 text-xs"
                >(<a
                    :class="`hover:underline text-${color}-600`"
                    :href="url"
                    target="_blank"
                >Karte anzeigen</a>)</span>
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
                return this.event.event_location.name
            },
            address (): string {
                return (this.event.event_location.address.split(', '))[0]
            },
            zipAndTown (): string {
                return (this.event.event_location.address.split(', '))[1] || ''
            },
            url (): string | null {
                return this.event.event_location.url || null
            },
        },
    }
</script>
