<script setup lang="ts">
defineProps<{
    even?: boolean;
    nopadding?: boolean;
}>();
</script>

<template>
    <div
        class="relative mx-auto mb-5 w-full rounded-lg border border-gray-100 shadow-md md:mb-10"
        :class="[
            even ? 'bg-white/90' : 'bg-white',
            nopadding ? '' : 'p-5 md:p-10',
        ]"
    >
        <slot />
    </div>
</template>
