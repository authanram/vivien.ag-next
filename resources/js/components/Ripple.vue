<style>
    .grow-enter-active,
    .grow-enter-to-active {
        transition: all 750ms ease-out;
    }

    .grow-leave-active,
    .grow-leave-to-active {
        transition: all 450ms ease-out;
    }

    .grow-enter {
        opacity: 1;
        transform: scale(0);
    }

    .grow-enter-to {
        opacity: 1;
        transform: scale(4);
    }

    .grow-leave {
        opacity: 1;
        transform: scale(4);
    }

    .grow-leave-to {
        opacity: 0;
        transform: scale(4);
    }
</style>

<template>
    <span :class="{ 'absolute top-0 right-0 bottom-0 left-0' : contain, 'block relative' : !contain }">
        <span
            ref="container"
            :class="{ 'h-full w-full' : contain }"
            :style="styleAttributeRipple"
            class="block overflow-hidden pointer relative rounded z-1"
            @mousedown="addRipple"
        >
            <transition-group
                class="absolute bottom-0 left-0 pointer-events-none right-0 top-0 z-0"
                name="grow"
                tag="span"
            >
                <span
                    v-for="ripple in ripples"
                    :key="ripple.id"
                    :style="{
                        backgroundColor: colorAttribute,
                        height: ripple.height,
                        left: ripple.left,
                        top: ripple.top,
                        width: ripple.width,
                    }"
                    class="absolute h-full pointer-events-none opacity-0 w-full"
                    style="border-radius: 50%;"
                ></span>
            </transition-group>
            <span
                :style="styleAttributeSlot"
                class="block"
            >
                <slot></slot>
            </span>
        </span>
    </span>
</template>

<script lang="ts">
    export default {
        props: {
            color: {
                default: null,
                required: false,
                type: String,
            },
            contain: {
                default: false,
                required: false,
                type: Boolean,
            },
            dark: {
                default: false,
                required: false,
                type: Boolean,
            },
            nudge: {
                default: null,
                required: false,
                type: String,
            },
        },

        data: function (): object {
            return {
                ripples: [],
            }
        },

        computed: {
            colorAttribute () {
                const { r, g, b, a } = this.hexToRgba(this.color ? this.color : (this.dark ? '000000' : 'ffffff'))
                return `rgba(${r}, ${g}, ${b}, ${this.dark ? a : (a * 10)})`
            },

            styleAttributeRipple () {
                return this.nudge ? `margin:-${this.nudge}px;` : false
            },

            styleAttributeSlot () {
                return this.nudge ? `margin:${this.nudge}px` : false
            },
        },

        methods: {
            addRipple (e) {
                const { left, top } = this.$refs.container.getBoundingClientRect()

                this.ripples.push({
                    id: Date.now(),
                    height: `${this.rippleWidth}px`,
                    left: `${e.clientX - left - this.halfRippleWidth}px`,
                    top: `${e.clientY - top - this.halfRippleWidth}px`,
                    width: `${this.rippleWidth}px`,
                })
            },

            hexToRgba (hex: string, alpha = .035) {
                const matches = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex)

                if (!matches) {
                    return null
                }

                return {
                    r: parseInt(matches[1], 16),
                    g: parseInt(matches[2], 16),
                    b: parseInt(matches[3], 16),
                    a: alpha,
                };
            },

            purgeRipples () {
                this.ripples = []
            }
        },

        mounted () {
            const width = this.$refs.container.offsetWidth
            const height = this.$refs.container.offsetHeight
            this.rippleWidth = width > height ? width:height
            this.halfRippleWidth = this.rippleWidth / 2

            window.addEventListener("mouseup", this.purgeRipples)
        },

        beforeDestroy () {
            window.removeEventListener("mouseup", this.purgeRipples)
        },
    }
</script>
