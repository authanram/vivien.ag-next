<style>
    .ui-placeholder-tags .vue-content-placeholders-text__line {
        line-height: 1em;
        margin-top: 1px;
        width: calc(100% - 5px);

        &.vue-content-placeholders-text__line {
            margin-bottom: 8px;
        }
    }
</style>

<template>
    <div class="inline">
        <ui-placeholder-heading
            class="mb-4"
            random
        />
        <ui-placeholder
            v-for="n in makeRandom()"
            :key="n"
            :class="['w-1/3', 'w-1/4', 'w-1/5'][Math.floor((Math.random() * 4))]"
            class="ui-placeholder-tags inline-block"
        />
    </div>
</template>

<script lang="ts">
    export default {
        props: {
            length: {
                default: 3,
                required: false,
                type: Number,
            },
        },

        methods: {
            makeRandom (): number {
                return Math.floor(Math.random() * this.length) + 1
            }
        },
    }
</script>
