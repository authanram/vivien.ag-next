<template>
    <div>
        <div
            v-if="isMum || isMumAndDad"
            class="flex items-center"
        >
            <div class="h-16 mr-5 overflow-hidden rounded-full w-16 shadow-md">
                <img
                    :alt="isMumAndDad ? 'Sybille u. Robert Seuffer' : 'Sybille Seuffer'"
                    :src="`${item.avatar_path}/${isMumAndDad ? 'sybille-robert' : 'sybille'}-seuffer.jpg`"
                    :title="isMumAndDad ? 'Sybille u. Robert Seuffer' : 'Sybille Seuffer'"
                />
            </div>
            <div class="text-lg">
                {{ isMumAndDad ? 'Sybille u. Robert' : 'Sybille' }} Seuffer
                <div class="opacity-75 text-sm">
                    Leitung
                </div>
            </div>
        </div>
        <template v-for="(lead, index) in leads">
            <div
                v-if="!includesMumOrDad(lead)"
                :key="index"
                class="flex items-center mt-4"
            >
                <div class="flex bg-teal-500 items-center justify-center h-16 mr-5 overflow-hidden rounded-full w-16">
                    <span class="font-semibold leading-tight text-white text-2xl">
                        <ui-icon icon="user" />
                    </span>
                </div>
                <div class="text-lg">
                    {{ lead.trim() }}
                    <div class="opacity-75 text-sm">
                        Leitung
                    </div>
                </div>
            </div>
        </template>
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
            leads (): string[] {
                return this.event.lead.split(',')
            },
            isMum (): boolean {
                return this.event.lead.toLowerCase().includes('sybille')
            },
            isMumAndDad (): boolean {
                return this.isMum && this.event.lead.toLowerCase().includes('robert')
            },
        },

        methods: {
            includesMumOrDad (lead: string) {
                return lead.toLowerCase().includes('sybille')
                    || lead.toLowerCase().includes('robert')
            }
        },
    }
</script>
