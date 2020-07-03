<template>
    <intersect
        :root-margin="rootMargin"
        :root="root"
        :threshold="threshold"
        @enter="enter"
        @leave="leave"
    >
        <slot />
    </intersect>
</template>

<script lang="ts">
    import Intersect from './mixins/Intersect'

    export default {
        name: 'ui-intersect',

        components: { Intersect },

        props: {
            event: {
                default: null,
                required: false,
                type: String,
            },
            intersect: {
                default: true,
                required: false,
                type: Boolean,
            },
            threshold: {
                type: Array,
                required: false,
                default: () => [0, 0.2]
            },
            root: {
                type: typeof HTMLElement !== 'undefined' ? HTMLElement : Object,
                required: false,
                default: () => null
            },
            rootMargin: {
                type: String,
                required: false,
                default: () => '0px 0px 0px 0px'
            }
        },

        data: function (): object {
            return {
                hasIntersected: false,
                hasIntersectedOnce: false,
            }
        },

        methods: {
            enter () {
                if (this.intersect) {
                    this.hasIntersected = true
                    this.hasIntersectedOnce = true

                    this.$emit('intersect')

                    if (!this.event) {
                        return
                    }

                    this.$emit(`intersect.${this.event}`, this.hasIntersected)
                }
            },

            leave () {
                if (this.intersect) {
                    this.hasIntersected = false

                    if (!this.event) {
                        return
                    }

                    this.$emit(`intersect.${this.event}`, this.hasIntersected)
                }
            },
        },
    }
</script>
