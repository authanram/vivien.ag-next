<template>
    <div class="flex items-center">
        <div class="relative z-10">
            <button
                :aria-expanded="active"
                aria-label="dropdown"
                class="focus:bg-gray-100 focus:outline-none focus:text-gray-500 hover:bg-gray-100 hover:text-gray-500 justify-center p-2 rounded-md text-gray-400"
                @click="toggle"
            >
                <svg
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        :d="active ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'"
                    />
                </svg>
            </button>
            <div
                v-if="active"
                v-click-outside="clickOutside"
                class="absolute border border-gray-100 mt-1 origin-top-right right-0 rounded-md shadow-lg w-48 z-10"
            >
                <div
                    aria-labelledby="dropdown"
                    aria-orientation="vertical"
                    class="bg-white overflow-hidden rounded-md"
                    role="menu"
                >
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    import vClickOutside from 'v-click-outside/src/index'

    export default {
        directives: {
            clickOutside: vClickOutside.directive
        },

        data: function (): object {
            return {
                active: false,
            }
        },

        methods: {
            clickOutside (): Function {
                return this.$isTouch() ? () => false : this.close()
            },

            close (): void {
                this.active = false
            },

            toggle (): void {
                this.active = !this.active
            },
        },
    }
</script>
