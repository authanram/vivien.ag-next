<template>
    <div>
        <ui-placeholder
            class="mb-4"
            width="90%"
        />
        <ui-placeholder-tags />
        <ui-placeholder
            class="mt-5"
            heading
        />
        <ui-placeholder class="mt-4" />
        <ui-placeholder
            v-if="makeRandomBoolean()"
            random
        />
    </div>
</template>

<script lang="ts">
    export default {
        methods: {
            makeRandom (): number {
                return Math.floor(Math.random() * 3) + 1
            },

            makeRandomBoolean (): boolean {
                return Math.random() >= 0.5
            }
        },
    }
</script>
