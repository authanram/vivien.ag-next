<template>
    <span @click="emit('details')">
        <span
            :class="{ 'hidden': !active }"
            class="absolute bg-black bg-opacity-50 font-medium group-hover:inline-block left-0 m-2 p-2 right-0 rounded-t text-right text-white text-xs top-0"
        >
            {{ image.name }} #{{ image.id }}
            <span
                v-if="auth"
                class="block mt-2 mb-1"
            >
                <button
                    class="bg-blue-500 focus:bg-blue-500 hover:bg-blue-600 p-1 pb-0 rounded-md shadow"
                    @click.stop="emit('edit')"
                >
                    <ui-icon
                        class="leading-none rotate-90 transform"
                        icon="adjustment"
                        size="18"
                    />
                </button>
                <button
                    class="bg-red-500 focus:bg-red-500 hover:bg-red-600 p-1 pb-0 rounded-md shadow"
                    @click.stop="emit('remove')"
                >
                    <ui-icon
                        class="leading-none rotate-90 transform"
                        icon="x"
                        size="18"
                    />
                </button>
            </span>
        </span>
        <span class="cursor-pointer h-full inline-block p-2">
            <span class="h-full inline-block overflow-hidden rounded">
                <img
                    :alt="image.name"
                    :src="image.path"
                    class="h-full"
                >
            </span>
        </span>
    </span>
</template>

<script lang="ts">
    export default {
        props: {
            active: {required: false, type: Boolean},
            auth: {required: true, type: Boolean},
            image: {required: true, type: Object},
        },

        methods: {
            emit (name: string): void {
                this.$emit(name)
            }
        },
    }
</script>
