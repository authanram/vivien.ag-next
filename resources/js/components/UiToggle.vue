<template>
    <span
        class="inline-block"
        style="padding-top:3px;"
    >
        <span
            :aria-checked="isChecked ? 'true' : 'false'"
            :class="[isChecked ? backgroundChecked : background, { 'opacity-50 pointer-events-none': disabled }]"
            :tabindex="tabIndex !== -1 ? tabIndex : false"
            class="bg-gray-200 border-2 border-transparent cursor-pointer duration-200 ease-in-out flex-shrink-0 focus:outline-none focus:shadow-outline h-5 inline-flex relative rounded-full transition-colors w-10"
            role="checkbox"
            @click="toggle()"
            @keydown.space.prevent="toggle()"
        >
            <span
                :class="{ 'translate-x-5': isChecked, 'translate-x-0': !isChecked }"
                class="bg-white duration-200 ease-in-out h-4 inline-block relative rounded-full shadow transform transition translate-x-0 w-4"
                aria-hidden="true"
            >
                <span
                    v-if="!isChecked"
                    :class="{ 'duration-100 ease-out opacity-0': isChecked, 'duration-200 ease-in opacity-100': !isChecked }"
                    class="absolute duration-200 ease-in flex h-full inset-0 items-center justify-center opacity-100 transition-opacity w-full"
                >
                    <svg
                        class="h-3 text-gray-400 w-3"
                        fill="none"
                        viewBox="0 0 12 12"
                    >
                        <path
                            d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            stroke="currentColor"
                        />
                    </svg>
                </span>
                <span
                    :class="{ 'duration-200 ease-in opacity-100': isChecked, 'duration-100 ease-out opacity-0': !isChecked }"
                    class="absolute duration-100 ease-out flex h-full inset-0 items-center justify-center opacity-0 transition-opacity w-full"
                >
                    <svg
                        :class="color"
                        class="h-3 w-3"
                        fill="currentColor"
                        viewBox="0 0 12 12"
                    >
                        <path
                            d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z"
                        />
                    </svg>
                </span>
            </span>
        </span>
    </span>
</template>

<script lang="ts">
    export default {
        props: {
            background: {
                default: 'bg-gray-200',
                type: String,
            },
            backgroundChecked: {
                default: 'bg-green-600',
                type: String,
            },
            checked: {
                default: false,
                type: Boolean,
            },
            color: {
                default: 'text-gray-600',
                type: String,
            },
            disabled: {
                default: false,
                type: Boolean,
            },
            tabIndex: {
                default: -1,
                type: Number,
            },
        },

        watch: {
            isChecked: function (value): void {
                this.$emit('changed', value)
            },
        },

        data: function (): object {
            return {
                isChecked: this.checked,
            }
        },

        methods: {
            toggle (): void {
                if (this.disabled) {
                    return
                }

                this.isChecked = !this.isChecked
            },
        },
    }
</script>
