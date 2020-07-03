<template>
    <component
        :class="classAttribute"
        :href="href || false"
        :is="href ? 'a' : 'button'"
        @click="$emit('clicked')"
    >
        <ripple contain />
        <div class="inline-flex items-center">
            <span>
                {{ text }}
            </span>
            <button
                v-if="close"
                aria-label="Remove large badge"
                :class="`text-${color}-600`"
                class="flex-shrink-0 focus:outline-none focus:text-indigo-700 inline-flex items-center ml-1.5"
                type="button"
            >
                <span class="font-xs">
                    ✗
                </span>
            </button>
        </div>
    </component>
</template>

<script lang="ts">
    export default {
        props: {
            close: {
                default: false,
                type: Boolean,
            },
            color: {
                default: 'gray',
                type: String,
            },
            text: {
                required: true,
                type: String,
            },
            href: {
                default: null,
                type: String,
            },
        },

        computed: {
            classAttribute (): string {
                return `bg-${this.color}-200 focus:outline-none hover:text-${this.color}-500 hover:shadow tag text-${this.color}-600`
            },
        },
    }
</script>
