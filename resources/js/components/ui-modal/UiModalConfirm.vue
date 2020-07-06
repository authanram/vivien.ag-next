<template>
    <portal to="confirm">
        <div class="fixed h-full no-select w-full z-40">
            <div class="absolute bg-opacity-75 bg-white bottom-0 left-0 right-0 top-0">
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
                                {{ labelConfirm }}
                            </form-button>
                            <form-button
                                v-if="labelCancel"
                                secondary
                                @clicked="$emit('dismissed')"
                            >
                                {{ labelCancel }}
                            </form-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </portal>
</template>

<script lang="ts">
    export default {
        props: {
            headline: {default: 'Bist du sicher?', type: String},
            caption: {default: 'Alle Eingaben werden dabei verworfen.', type: String},
            labelConfirm: {default: 'Eingaben verwerfen', type: String},
            labelCancel: {default: null, type: String},
            danger: {default: false, type: Boolean},
            success: {default: false, type: Boolean},
        },

        computed: {
            color (): string {
                return this.success ? 'green' : 'red'
            },
        },

        methods: {
            registerKeyupEvents (): void {
                document.addEventListener('keyup', this.handleEnter)
                document.addEventListener('keyup', this.handleEscape)
            },

            unregisterKeyupEvents (): void {
                document.removeEventListener('keyup', this.handleEnter)
                document.removeEventListener('keyup', this.handleEscape)
            },

            handleEnter (e): void {
                if (e.code !== 'Enter') {
                    return
                }

                this.$emit('confirmed')
            },

            handleEscape (e): void {
                if (e.code !== 'Escape') {
                    return
                }

                if (this.success) {
                    this.$emit('confirmed')
                    return
                }

                this.$emit('dismissed')
            },
        },

        mounted (): void {
            this.registerKeyupEvents()
        },

        beforeDestroy (): void {
            this.unregisterKeyupEvents()
        }
    }
</script>
