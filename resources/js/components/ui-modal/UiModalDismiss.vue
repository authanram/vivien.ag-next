<template>
    <div class="absolute bg-opacity-75 bg-white bottom-0 left-0 right-0 top-0 z-20">
        <div class="flex h-full items-center justify-center w-full">
            <div class="flex-none my-10">
                <div
                    :class="`border-${color}-500`"
                    class="bg-white border p-8 rounded-lg shadow-xl"
                >
                    <div class="mb-4">
                        <div
                            :class="`text-${color}-600`"
                            class="font-medium mb-1 text-xl"
                        >
                            <div
                                v-if="headline && !$slots.headline"
                                v-text="headline"
                            />
                            <slot name="headline" />
                        </div>
                        <div
                            v-if="caption && !$slots.caption"
                            v-text="caption"
                        />
                        <slot name="caption" />
                    </div>
                    <form-button
                        :accent="color"
                        class="mr-2"
                        @clicked="$emit('confirmed')"
                    >
                        {{ actionConfirm }}
                    </form-button>
                    <form-button
                        v-if="actionCancel"
                        secondary
                        @clicked="$emit('dismissed')"
                    >
                        {{ actionCancel }}
                    </form-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    export default {
        props: {
            headline: {default: 'Bist du sicher?', type: String},
            caption: {default: 'Alle Eingaben werden dabei verworfen.', type: String},
            actionConfirm: {default: 'Eingaben verwerfen', type: String},
            actionCancel: {default: null, type: String},
            danger: {default: false, type: Boolean},
            success: {default: false, type: Boolean},
        },

        computed: {
            color (): string {
                return this.success ? 'green' : 'red'
            },
        },
    }
</script>
