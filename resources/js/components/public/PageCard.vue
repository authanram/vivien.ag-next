<script setup lang="ts">
import PatternDots from '@/components/public/PatternDots.vue';
import { Card } from '@/components/ui/card';

// Port of the vivien.ag <x-card>: margin and padding can be dropped like its reject: modifier.
defineProps<{
    even?: boolean;
    nopadding?: boolean;
    nomargin?: boolean;
    pattern?: boolean;
}>();
</script>

<template>
    <Card
        class="relative mx-auto block w-full self-stretch rounded-xl border border-white/80 text-inherit shadow-card"
        :class="[
            even ? 'bg-white/90' : 'bg-white',
            nopadding ? 'p-0' : 'p-5 md:p-10',
            { 'mb-5 md:mb-10': !nomargin },
            { 'overflow-hidden': pattern },
        ]"
    >
        <PatternDots v-if="pattern" />
        <div class="relative" :class="{ 'lg:flex lg:items-center': pattern }">
            <slot />
        </div>
    </Card>
</template>
