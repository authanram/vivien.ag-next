<template>
    <div class="block w-full">
        <textarea
            :id="name"
            :class="`focus:border-${accent}-500`"
            :name="name"
            :placeholder="placeholder"
            :type="type"
            v-bind="$attrs"
            class="block border-2 duration-150 ease-in-out focus:shadow form-input sm:leading-5 transition w-full"
            v-bind:value="value"
            v-on:input="$emit('input', $event.target.value)"
        >{{ value }}</textarea>
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
