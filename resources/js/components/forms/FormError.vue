<template>
    <p
        v-if="_error"
        class="italic pt-2 text-red-500 text-xs"
        v-text="_error"
    />
</template>

<script lang="ts">
    export default {
        props: {
            error: {default: () => null, type: [Array, String]},
        },

        computed: {
            _error (): string | null {
                if (!this.error) {
                    return null
                }

                return this.error.length > 0
                    ? this.error[0]
                    : this.error
            }
        },
    }
</script>
