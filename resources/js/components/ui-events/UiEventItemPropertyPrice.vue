<template>
    <div class="flex">
        <div class="flex items-center w-10">
            <ui-icon
                class="text-gray-500"
                icon="creditCard"
                nudge="-2"
                size="25"
                style="margin-left:-1px;opacity:.85;"
            />
        </div>
        <div class="flex-grow leading-tight text-lg">
            <div>
                {{ event.price.toFixed(2) }} &euro;
            </div>
            <div
                v-if="event.hasPriceNote"
                class="leading-5 opacity-75 text-sm"
            >
                {{ event.price_note }}
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
        },
    }
</script>
