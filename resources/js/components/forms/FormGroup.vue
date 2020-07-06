<template>
    <div
        :class="[classAttribute, { 'flex': breakpoint.ge('md') }]"
        class="mt-5 sm:gap-4 sm:grid sm:grid-cols-3"
    >
        <label
            :for="name"
            class="block mb-1 md:mb-0 md:mt-2 text-gray-700"
        >
            <slot name="label" />
            {{ label || '' }}
        </label>
        <div class="sm:col-span-2">
            <div class="max-w-lg flex items-start rounded-md sm:max-w-xs">
                <slot />
            </div>
            <slot name="errors" />
            <form-error
                v-if="errors && errors[name]"
                :error="errors[name]"
            />
            <div
                v-if="help || $slots.help"
                class="pt-2 text-gray-500 text-xs"
            >
                <span v-html="help" />
                <slot name="help" />
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    import Breakpoint from '@/components/mixins/Breakpoint'

    export default {
        mixins: [Breakpoint],

        props: {
            border: {default: false, type: Boolean},
            errors: {default: () => {}, type: Object},
            help: {default: null, type: String},
            label: {default: null, type: String},
            name: {default: null, type: String},
        },

        computed: {
            classAttribute (): string {
                return this.border ? 'sm:border-gray-200 sm:border-t sm:pt-6' : ''
            },
        },
    }
</script>
