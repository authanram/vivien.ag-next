<template>
    <ui-modal>
        <div class="flex justify-between mb-4">
            <div class="mr-3 px-3 py-2 text-sm w-full">
                {{ getName }} #{{ image.id }}
            </div>
            <div
                class="bg-black bg-opacity-50 cursor-pointer hover:bg-opacity-75 px-3 py-2 rounded-md text-sm text-white"
                @click="dismiss()"
            >
                Schließen
            </div>
        </div>
        <div class="border p-2 rounded-md text-center">
            <img
                :alt="getName"
                :src="srcAttribute"
                class="h-full w-full"
            >
        </div>
    </ui-modal>
</template>

<script lang="ts">
    import {Image} from '@/state/models'

    export default {
        props: {
            dataImage: {required: true, type: Object},
        },

        computed: {
            image (): Image {
                return this.dataImage
            },

            getName (): string {
                return this.image.name
            },

            srcAttribute (): string {
                return this.image.path
            },
        },

        methods: {
            dismiss (): void {
                this.$event.$emit('overlay.destroy')
                this.$emit('reset', null)
            },
        },
    }
</script>
