<style>
    .timeline-text {
        text-shadow: white 0 0 7px;
    }
</style>

<template>
    <div class="flex justify-center mt-3">
        <div class="mt-5 relative w-full">
            <div
                :class="`absolute bg-white bg-opacity-50 h-12 mt-4 rounded-full w-12 z-0`"
                style="left:50%; transform:translate(-50%,-50%);"
            />
            <div
                :class="`absolute bg-${color}-500 bg-opacity-30 h-12 mt-4 rounded-full w-12 z-0`"
                style="left:50%; transform:translate(-50%,-50%);"
            />
            <div class="-mt-6 leading-none relative text-center z-10">
                <div :class="`font-semibold leading-none text-5xl text-${color}-600 timeline-text`">
                    {{ Number(event.from.day) }}
                </div>
                <div class="-mt-1 font-semibold leading-none text-xl timeline-text">
                    {{ event.from.month_full }}
                </div>
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

            color (): string {
                return this.event.event_type.color.color || ''
            },
        },
    }
</script>
