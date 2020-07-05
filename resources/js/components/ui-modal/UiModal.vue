<template>
    <portal to="overlay">
        <div class="fixed h-full w-full z-30">
            <div class="relative h-full overflow-y-scroll">
                <div class="h-full table w-full">
                    <div class="align-middle h-full table-cell w-full">
                        <div class="flex justify-center">
                            <div
                                v-if="!$store.state.entities.overlays._loading"
                                class="bg-white border border-gray-100 md:my-10 md:max-w-lg md:p-6 md:w-full pb-4 pt-5 px-4 rounded-lg shadow-lg"
                            >
                                <div
                                    aria-labelledby="modal-headline"
                                    aria-modal="true"
                                    role="dialog"
                                >
                                    <ui-modal-dismiss
                                        v-if="cancelConfirmation"
                                        action-cancel="Zurück"
                                        @confirmed="callbackCancel()"
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
                                    <div
                                        :class="`text-${align}`"
                                        class="mt-6 sm:border-gray-200 sm:border-t sm:pt-6"
                                    >
                                        <form-button
                                            v-if="labelSubmit"
                                            :accent="accent"
                                            :disabled="processing"
                                            class="mr-2"
                                            @clicked="callbackSubmit()"
                                        >
                                            {{ labelSubmit }}
                                        </form-button>
                                        <form-button
                                            v-if="labelCancel"
                                            :disabled="processing"
                                            secondary
                                            @clicked="cancelConfirmation = true"
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
            align: {default: 'left', type: String},
            callbackCancel: {default: () => {}, type: Function},
            callbackSubmit: {default: () => {}, type: Function},
            labelCancel: {default: null, type: String},
            labelSubmit: {default: null, type: String},
            processing: {default: false, type: Boolean},
        },

        data (): object {
            return {
                cancelConfirmation: false,
                delayed: true,
            }
        },

        mounted (): void {
            this.$nextTick(() => {
                this.delayed = false
            })
        },
    }
</script>
