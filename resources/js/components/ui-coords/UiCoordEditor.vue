<template>
    <ui-modal>
        <div class="bg-white border border-gray-100 p-4 rounded shadow-lg">
            edit: {{ coord }}
        </div>
    </ui-modal>
</template>

<script lang="ts">
    import {ImageCoord} from '@/state/models'

    export default {
        props: {
            dataCoord: {required: true, type: Object},
        },

        computed: {
            coord (): ImageCoord {
                return this.dataCoord
            },
        },

        mounted (): void {
            // console.log('edit')
        },
    }
</script>
