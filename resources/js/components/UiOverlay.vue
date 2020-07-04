<template>
    <div
        v-show="overlay.active"
        class="absolute h-full w-full z-40"
    >
        <div
            :class="[
                { 'cursor-pointer': callbackOutsideClick },
                overlay.loading ? 'bg-white bg-opacity-75' : 'bg-black bg-opacity-50',
            ]"
            class="absolute h-full w-full z-50"
            @click="outsideClick()"
        />
        <div
            v-if="overlay.loading"
            class="absolute h-full w-full z-20"
        >
            <slot name="loading" />
        </div>
    </div>
</template>

<script lang="ts">
    import Overlay from '@/components/mixins/Overlay'

    export default {
        mixins: [Overlay],

        data () {
            return {
                callbackOutsideClick: null,
                transition: false,
            }
        },

        methods: {
            activate (): void {
                const body = document.body
                const page = document.querySelector('.page') as HTMLDivElement

                body.style.overflowY = 'hidden'
                page.style.overflowY = 'scroll'
                page.classList.add('blur')
            },

            deactivate (): void {
                const body = document.body
                const page = document.querySelector('.page') as HTMLDivElement

                body.style.overflowY = 'scroll'
                page.style.overflowY = 'hidden'
                page.classList.remove('blur')
            },

            outsideClick (): void {
                // console.log('xxx')
            }
        },

        mounted (): void {
            this.$event.$on('overlay.create', (payload = {
                callbackOutsideClick: null,
                transition: true,
            }) => {
                this.activate()
                this.callbackOutsideClick = payload.callbackOutsideClick
                this.transition = payload.transition
                this.overlay.create()
            })

            this.$event.$on('overlay.destroy', () => {
                this.deactivate()
                this.overlay.destroy()
            })

            this.$event.$on('overlay.load', () => {
                this.activate()
                this.overlay.load()
            })
        },
    }
</script>
