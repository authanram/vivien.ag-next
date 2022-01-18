<template>
    <modal @modal-close="handleClose">
        <form
            @submit.prevent="handleConfirm"
            slot-scope="props"
            class="bg-white rounded-lg shadow-lg overflow-hidden"
            style="width: 460px"
        >
            <div class="p-8">
                <slot />
            </div>
            <div class="bg-30 px-6 py-3 flex">
                <div class="ml-auto">
                    <button type="button" data-testid="cancel-button" dusk="cancel-general-button" @click.prevent="handleClose" class="btn text-80 font-normal h-9 px-3 mr-3 btn-link">{{__('Cancel')}}</button>
                    <button id="confirm-delete-button" ref="confirmButton" data-testid="confirm-button" type="submit" class="btn btn-default btn-primary" v-text="labelConfirm" />
                </div>
            </div>
        </form>
    </modal>
</template>

<script>
export default {
    name: 'ModalConfirm',

    props: ['labelConfirm'],

    methods: {
        handleClose() {
            this.$emit('close');
        },

        handleConfirm() {
            this.$emit('confirm');
        },
    },

    mounted() {
        this.$refs.confirmButton.focus();
    },
}
</script>
