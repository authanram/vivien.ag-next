<template>
    <div class="block w-full">
        <input
            :ref="`input-${name}`"
            :id="`input_${name}_${row}`"
            :class="`focus:border-${accent}-500`"
            :name="`${name}[${row}]`"
            :placeholder="placeholder"
            :type="type"
            class="block border-2 duration-150 ease-in-out focus:shadow form-input sm:leading-5 transition w-full"
            v-bind:value="value"
            v-on:input="$emit('input', $event.target.value)"
        />
        <slot name="errors" />
        <form-error
            v-if="errors && errors[name]"
            :error="errors[name]"
        />
    </div>
</template>

<script lang="ts">
    import FieldMixin from './FieldMixin'

    export default {
        mixins: [FieldMixin],

        props: {
            type: {default: 'text', type: String},
        },
    }
</script>
