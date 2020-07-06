<template>
    <div
        v-show="overlay.active"
        class="absolute h-full w-full z-10"
    >
        <div
            :class="loading ? 'bg-white bg-opacity-75' : 'bg-black bg-opacity-50 cursor-pointer'"
            class="absolute h-full w-full z-20"
            @click="cancel()"
        />
        <portal-target name="confirm" />
        <portal-target name="overlay" />
        <ui-modal v-if="loading">
            <slot />
        </ui-modal>
    </div>
</template>

<script lang="ts">
    import Overlay from '@/components/mixins/Overlay'

    export default {
        mixins: [Overlay],

        computed: {
            loading (): boolean {
                return this.$store.state.entities.overlays._loading
            },
        },

        data () {
            return {
                callbackCancel: () => null,
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

                document.addEventListener('keyup', this.handleEscape)
            },

            deactivate (): void {
                const body = document.body
                const page = document.querySelector('.page') as HTMLDivElement

                body.style.overflowY = 'scroll'
                page.style.overflowY = 'hidden'
                page.classList.remove('blur')

                this.registerKeyupEscape()
            },

            cancel (): void {
                try {
                    this.callbackCancel()()
                } catch (e) {
                    //
                }
            },

            registerKeyupEscape (): void {
                document.addEventListener('keyup', this.handleEscape)
            },

            unregisterKeyupEscape (): void {
                document.removeEventListener('keyup', this.handleEscape)
            },

            handleEscape (e): void {
                if (e.code !== 'Escape') {
                    return
                }

                this.unregisterKeyupEscape()
                this.cancel()
            },
        },

        mounted (): void {
            this.$event.$on('overlay.create', (payload = {
                callbackCancel: null,
                transition: true,
            }) => {
                this.activate()
                this.callbackCancel = payload.callbackCancel
                this.transition = payload.transition
                this.overlay.create()
            })

            this.$event.$on('overlay.update', (payload: object) => {
                Object.keys(payload).forEach((key: string) => {
                    this[key] = payload[key]
                })
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

        beforeDestroy (): void {
            this.$event.$off('overlay.create')
            this.$event.$off('overlay.update')
            this.$event.$off('overlay.destroy')
            this.$event.$off('overlay.load')
        },
    }
</script>
