<template>
    <div
        :class="focused ? `border-${accent}-500 shadow` : false"
        class="border inline-block rounded-md"
    >
        <select
            v-model="model"
            :id="name"
            :class="`focus:border-${accent}-500`"
            :name="name"
            class="block duration-150 ease-in-out focus:shadow-none form-select sm:leading-5 transition w-full"
            v-bind="$attrs"
            @blur="focused = false"
            @focus="focused = true"
            @change="$emit('input', model)"
        >
            <template v-for="(subject, index) in values">
                <option v-bind:value="String(subject)">
                    {{ labels[index] || subject }}
                </option>
            </template>
        </select>
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

        data () {
            return {
                focused: false,
                model: 1,
            }
        },

        props: {
            values: {required: true, type: Array},
            labels: {default: () => [], type: Array},
        },
    }
</script>
