<template>
    <div class="flex">
        <div class="flex items-center w-10">
            <ui-icon
                class="text-gray-500"
                icon="coffee"
                nudge="-4"
            />
        </div>
        <div class="flex-grow leading-tight text-lg">
            <div>
                <template v-if="event.catering.includes('Einkehren')">
                    {{ event.catering }}
                </template>
                <template v-else>
                    inkl. Verpflegung
                </template>
            </div>
            <div
                v-if="!event.catering.includes('Einkehren')"
                class="leading-5 opacity-75 text-sm"
            >
                {{ event.catering }}
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
