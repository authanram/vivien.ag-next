<style>
    .ui-placeholder-heading .vue-content-placeholders-heading__title {
        border-radius: 12px;
        height: 22px;
    }
    .ui-placeholder-heading .vue-content-placeholders-heading__subtitle,
    .ui-placeholder-heading .vue-content-placeholders-text__line {
        display: none !important;
    }
</style>

<template>
    <content-placeholders
        :style="styleAttribute"
        rounded
    >
        <content-placeholders-heading
            :class="classAttribute"
            :lines="1"
            class="ui-placeholder-heading"
        />
    </content-placeholders>
</template>

<script lang="ts">
    export default {
        props: {
            random: {
                default: false,
                type: Boolean,
            },
            width: {
                default: null,
                type: String,
            },
        },

        computed: {
            classAttribute (): string | null {
                if (!this.random) {
                    return null
                }

                const widths = [
                    'w-1/2',
                    'w-2/3',
                    'w-3/4',
                    'w-full',
                ]

                return widths[Math.floor(Math.random() * 4) + 1]
            },

            styleAttribute (): string | boolean {
                return this.width ? `width:${this.width};` : false
            },
        },
    }
</script>
