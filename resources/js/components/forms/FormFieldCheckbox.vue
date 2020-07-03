<template>
    <div class="flex">
        <template v-for="(subject, index) in values">
            <div
                :key="`radio-${index}-${row}`"
                class="flex leading-5 mr-4 relative"
            >
                <label
                    :for="`checkbox_${name}_${index}_${row}`"
                    class="cursor-pointer flex items-center text-gray-700"
                >
                    <input
                        :id="`checkbox_${name}_${index}_${row}`"
                        :class="`text-${accent}-600`"
                        :name="`${name}[${row}]`"
                        class="cursor-pointer duration-150 ease-in-out focus:shadow-none form-checkbox h-4 mr-2 transition w-4"
                        type="checkbox"
                        v-bind="$attrs"
                        v-bind:value="value"
                        v-on:checked="$emit('input', $event.target.value)"
                    />
                    {{ labels[index] || subject }}
                </label>
                <p
                    v-if="helps[index]"
                    class="text-gray-500"
                >
                    {{ helps[index] }}
                </p>
            </div>
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
            values: {required: true, type: Array},
            labels: {default: () => [], type: Array},
            helps: {default: () => [], type: Array},
        },
    }
</script>
