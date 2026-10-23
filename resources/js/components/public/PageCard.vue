<script setup lang="ts">
import PatternDots from '@/components/public/PatternDots.vue';

// Port of the vivien.ag <x-card>: margin and padding can be dropped like its reject: modifier.
defineProps<{
    even?: boolean;
    nopadding?: boolean;
    nomargin?: boolean;
    pattern?: boolean;
}>();
</script>

<template>
    <div
        class="relative mx-auto w-full self-stretch rounded-lg border border-gray-100 shadow-md"
        :class="[
            even ? 'bg-white/90' : 'bg-white',
            { 'p-5 md:p-10': !nopadding, 'mb-5 md:mb-10': !nomargin },
            { 'overflow-hidden': pattern },
        ]"
    >
        <PatternDots v-if="pattern" />
        <div class="relative" :class="{ 'lg:flex lg:items-center': pattern }">
            <slot />
        </div>
    </div>
</template>
