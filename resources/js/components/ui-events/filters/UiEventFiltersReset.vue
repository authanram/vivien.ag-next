<template>
    <button
        :class="`active:bg-gray-100 bg-gray-100 hover:bg-gray-200`"
        class="absolute bottom-0 font-medium left-0 p-3 right-0 rounded-b-lg text-sm text-gray-600 w-full"
        @click="reset()"
    >
        Auswahl zurücksetzen
    </button>
</template>

<script lang="ts">
    import RouteMixin from '@/components/mixins/RouteMixin'
    import {sleep} from '@/Helpers'

    export default {
        mixins: [RouteMixin],

        props: {
            accent: {
                required: true,
                type: String,
            },
            parameter: {
                required: true,
                type: String,
            },
        },

        methods: {
            reset (): void {
                this.$event.$emit('overlay.load')

                this.routeRemoveQueryParameter(this.parameter)

                sleep(250).then(() => this.$event.$emit('overlay.destroy'))
            },
        }
    }
</script>
