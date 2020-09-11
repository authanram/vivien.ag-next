<template>
    <ui-modal :callback-cancel="() => dismiss">
        remove
    </ui-modal>
</template>

<script lang="ts">
    export default {
        props: {
            dataId: {required: true, type: Number},
        },

        mounted (): void {
            // console.log('remove')
        },

        methods: {
            dismiss (): void {
                this.$event.$emit('overlay.destroy')
                this.$emit('dismissed')
            },
        },
    }
</script>
