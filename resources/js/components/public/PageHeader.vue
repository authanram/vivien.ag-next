<script setup lang="ts">
defineProps<{
    label?: string;
    title: string;
    intro?: string;
}>();
</script>

<template>
    <div class="mb-10 border-b border-stone-100 pb-8">
        <p v-if="label" class="mb-2 text-xs font-semibold uppercase tracking-widest text-[var(--color-nav-accent)]">
            {{ label }}
        </p>
        <h1
            class="text-3xl font-semibold tracking-tight sm:text-4xl"
            style="color: var(--color-nav-accent); font-family: Georgia, serif"
        >
            {{ title }}
        </h1>
        <p v-if="intro" class="mt-4 max-w-2xl text-base leading-relaxed text-stone-500">
            {{ intro }}
        </p>
    </div>
</template>
