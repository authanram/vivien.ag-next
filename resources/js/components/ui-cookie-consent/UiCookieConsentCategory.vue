<template>
    <div class="border-t flex items-center justify-between h-12 pl-8 pr-16">
        <div class="font-semibold leading-none">
            {{ category }}
        </div>
        <div
            class="pr-1"
            style="margin-right:3px;"
        >
            <ui-toggle
                :checked="toggleValue || getCookieValue"
                :disabled="toggleDisabled"
                color="text-green-700"
                @changed="(value) => $emit('changed', value)"
            />
        </div>
    </div>
</template>

<script lang="ts">
    export default {
        props: {
            category: {
                required: true,
                type: String,
            },
            cookieName: {
                required: true,
                type: String,
            },
            toggleDisabled: {
                default: null,
                type: Boolean,
            },
            toggleValue: {
                default: null,
                type: Boolean,
            },
        },

        computed: {
            getCookieValue (): boolean {
                const cookie = window['jscookie'].get(this.cookieName)

                if (!cookie) {
                    return false
                }

                const cookieParsed = JSON.parse(cookie)

                return cookieParsed['all'] || cookieParsed[this.category.toLowerCase()]
            },
        },
    }
</script>
