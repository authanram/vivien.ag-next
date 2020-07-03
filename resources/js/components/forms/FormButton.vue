<template>
    <div
        :class="{ 'shadow': !secondary }"
        class="inline-block rounded-md"
    >
        <button
            :id="name || false"
            :class="[classAttribute, {'opacity-50': disabled}]"
            :name="name || false"
            :disabled="disabled"
            class="focus:outline-none px-5 rounded-md relative tracking-wide z-10"
            type="button"
            v-bind="$attrs"
            @click="$emit('clicked')"
        >
            <ripple
                :dark="secondary"
                contain
            />
            <span
                class="inline-flex items-center"
                style="height:40px;padding-top:2px;"
            >
                <slot />
            </span>
        </button>
    </div>
</template>

<script lang="ts">
    import FieldMixin from './FieldMixin'

    export default {
        mixins: [FieldMixin],

        computed: {
            classAttribute (): string {
                return !this.secondary
                    ? `bg-${this.accent}-600 hover:bg-${this.accent}-500 text-white`
                    : 'bg-white border border-gray-300 focus:border-gray-300 hover:bg-gray-100 hover:text-gray-500 text-gray-700'
            },
        },

        props: {
            accent: {default: 'grey', type: String},
            disabled: {default: false, type: Boolean},
            name: {default: null, type: String},
            secondary: {default: false, type: Boolean},
            type: {default: 'text', type: String},
        },
    }
</script>
