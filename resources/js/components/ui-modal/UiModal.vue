<template>
    <portal to="overlay">
        <div class="fixed z-50 h-full w-full">
            <div class="h-full overflow-y-scroll">
                <div class="h-full table w-full">
                    <div class="align-middle h-full table-cell w-full">
                        <div class="flex justify-center">
                            <div :class="{ 'bg-white border border-gray-100 md:my-10 md:max-w-lg md:p-6 md:w-full pb-4 pt-5 px-4 rounded-lg shadow-lg': !loading }">
                                <div
                                    aria-labelledby="modal-headline"
                                    aria-modal="true"
                                    role="dialog"
                                >
                                    <slot name="dismiss" />
                                    <ui-modal-dismiss
                                        v-if="cancelConfirmation"
                                        action-cancel="Zurück"
                                        @confirmed="callbackCancel()"
                                        @dismissed="cancelConfirmation = false"
                                    />
                                    <div class="sm:flex sm:items-start">
                                        <div class="mt-3 sm:mt-0 sm:text-left">
                                            <span
                                                v-if="this.$slots.headline"
                                                class="font-medium leading-6 text-gray-900 text-lg"
                                            >
                                                <slot name="headline" />
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <slot />
                                <template v-if="labelCancel || labelSubmit">
                                    <div
                                        :class="`text-${align}`"
                                        class="mt-6 sm:border-gray-200 sm:border-t sm:pt-6"
                                    >
                                        <form-button
                                            v-if="labelSubmit"
                                            :accent="accent"
                                            :disabled="loading"
                                            class="mr-2"
                                            @clicked="callbackSubmit()"
                                        >
                                            {{ labelSubmit }}
                                        </form-button>
                                        <form-button
                                            v-if="labelCancel"
                                            :disabled="loading"
                                            secondary
                                            @clicked="cancelConfirmation = true"
                                        >
                                            {{ labelCancel }}
                                        </form-button>
                                    </div>
                                </template>
                            </div>
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
            loading: {default: false, type: Boolean},
        },

        data (): object {
            return {
                delayed: true,
                cancelConfirmation: false,
            }
        },

        mounted (): void {
            this.$nextTick(() => {
                this.delayed = false
            })
        },
    }
</script>
