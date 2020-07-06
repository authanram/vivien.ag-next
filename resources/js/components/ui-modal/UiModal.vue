<template>
    <portal to="overlay">
        <div class="fixed h-full no-select pointer-events-none w-full z-30">
            <div class="relative h-full overflow-y-scroll">
                <div class="h-full table w-full">
                    <div class="align-bottom h-full md:align-middle table-cell w-full">
                        <div class="flex justify-center">
                            <div
                                v-if="!$store.state.entities.overlays._loading"
                                class="bg-white border border-gray-100 md:my-10 md:max-w-lg md:p-6 md:pt-5 md:w-full pb-4 pointer-events-auto pt-2 px-4 rounded-lg shadow-lg"
                            >
                                <div
                                    aria-labelledby="modal-headline"
                                    aria-modal="true"
                                    role="dialog"
                                >
                                    <ui-modal-confirm
                                        v-if="cancelConfirmation"
                                        label-cancel="Zurück"
                                        @confirmed="callbackCancel(true)"
                                        @dismissed="cancelConfirmation = false"
                                    />
                                    <div class="sm:flex sm:items-start">
                                        <div class="mt-3 sm:mt-0 sm:text-left">
                                            <span
                                                v-if="$slots.headline"
                                                class="font-medium leading-6 text-gray-900 text-lg"
                                            >
                                                <slot name="headline" />
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <slot v-show="!$slots.dismiss" />
                                <template v-if="labelCancel || labelSubmit">
                                    <div class="flex md:justify-start justify-end mt-6 sm:border-gray-200 sm:border-t sm:pt-6">
                                        <form-button
                                            v-if="labelSubmit"
                                            :accent="accent"
                                            :disabled="processing"
                                            class="md:mr-2 md:order-first order-last"
                                            @clicked="callbackSubmit()"
                                        >
                                            {{ labelSubmit }}
                                        </form-button>
                                        <form-button
                                            v-if="labelCancel"
                                            :disabled="processing"
                                            class="mr-2 md:mr-0"
                                            secondary
                                            @clicked="callbackCancel()"
                                        >
                                            {{ labelCancel }}
                                        </form-button>
                                    </div>
                                </template>
                            </div>
                            <template v-else>
                                <slot />
                            </template>
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
            accent: {default: 'teal', type: String},
            callbackCancel: {default: (force: boolean) => null, type: Function},
            callbackSubmit: {default: () => {}, type: Function},
            labelCancel: {default: null, type: String},
            labelSubmit: {default: null, type: String},
            persistent: {default: false, type: Boolean},
            processing: {default: false, type: Boolean},
        },

        data (): object {
            return {cancelConfirmation: false}
        },

        created (): void {
            this.$event.$on('overlay.dismiss', () => {
                if (this.cancelConfirmation) {
                    return
                }

                this.cancelConfirmation = true
            })

            this.$event.$emit('overlay.create', {
                callbackCancel: this.callbackCancel,
            })
        },

        beforeDestroy (): void {
            this.$event.$off('overlay.dismiss')
        }
    }
</script>
