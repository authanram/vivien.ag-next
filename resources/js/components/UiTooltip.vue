<template>
    <div class="flex-col inline-flex items-center text-center">
        <div
            @mouseover="active=true"
            @mouseout="active=false"
        >
            <span class="cursor-default inline-block relative z-10">
                <slot />
            </span>
        </div>
        <transition name="fade">
            <div
                v-if="active"
                :style="`bottom:calc(100% + ${nudge}px)`"
                class="absolute"
                style="transition-delay: .1s"
            >
                <div class="relative">
                    <div class="bg-black bg-opacity-75 px-2 py-1 relative right-0 rounded text-white text-xs">
                        <span v-html="tooltip" />
                        <slot name="tooltip" />
                        <svg
                            class="absolute left-0 text-black w-full"
                            style="bottom:-7px;height:7px;"
                            viewBox="0 0 255 255"
                            x="0px"
                            xml:space="preserve"
                            y="0px"
                        >
                            <polygon
                                class="fill-current"
                                points="0,0 127.5,127.5 255,0"
                            />
                        </svg>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script lang="ts">
    export default {
        props: {
            nudge: {
                default: 3,
                required: false,
                type: Number,
            },
            tooltip: {
                default: null,
                required: false,
                type: String,
            }
        },

        data: function (): object {
            return {
                active: false,
            }
        },
    }
</script>
