<style>
    .ui-placeholder-item .vue-content-placeholders-heading__title,
    .ui-placeholder-item .vue-content-placeholders-heading__subtitle,
    .ui-placeholder-item .vue-content-placeholders-text__line {
        border-radius: 12px;
        height: 22px;
    }
</style>

<template>
    <content-placeholders
        :style="styleAttribute"
        rounded
    >
        <component
            :class="classAttribute"
            :is="is"
            :lines="Number(lines)"
            class="ui-placeholder-item"
        />
    </content-placeholders>
</template>

<script lang="ts">
    export default {
        props: {
            heading: {
                default: false,
                type: Boolean,
            },
            lines: {
                default: "1",
                type: String,
            },
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
                    !this.heading ? 'w-1/3' : 'w-1/2',
                    !this.heading ? 'w-1/2' : 'w-2/3',
                    'w-3/4',
                    'w-full',
                ]

                return widths[Math.floor(Math.random() * 4) + 1]
            },

            styleAttribute (): string | boolean {
                return this.width ? `width:${this.width};` : false
            },

            is (): string {
                return this.heading
                    ? 'content-placeholders-heading'
                    : 'content-placeholders-text'
            },
        },
    }
</script>
