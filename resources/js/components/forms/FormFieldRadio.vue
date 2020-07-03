<template>
    <div class="flex mt-2 md:mt-0">
        <template v-for="(subject, index) in values">
            <label
                :key="`radio-${index}-${row}`"
                :for="`radio-${name}_${index}_${row}`"
                class="cursor-pointer flex items-center mr-4"
            >
                <input
                    :id="`radio-${name}_${index}_${row}`"
                    :checked="value === subject"
                    :class="`text-${accent}-600`"
                    :name="`${name}[${row}]`"
                    class="cursor-pointer duration-150 ease-in-out focus:shadow-none form-radio h-4 mr-2 transition w-4"
                    type="radio"
                    v-bind:value="subject"
                    v-on:change="$emit('input', $event.target.value)"
                />
                <span
                    class="block leading-5 text-gray-700"
                    v-text="labels[index] || subject"
                />
            </label>
        </template>
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
            values: {default: null, type: Array},
            labels: {default: () => [], type: Array},
        },
    }
</script>
