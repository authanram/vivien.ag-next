<script setup lang="ts">
import { usePageColor } from '@/composables/usePageColor';

defineProps<{
    strongLabels?: boolean;
}>();

const { color } = usePageColor();
</script>

<template>
    <p>
        <span :class="{ 'font-medium': strongLabels }">Telefon</span>{{ ' ' }}
        <span class="font-medium" :class="`text-${color}-600`"
            ><a
                href="tel:004974533264"
                class="hover:underline"
                :class="`text-${color}-600`"
                >+49 (0)7453 3264</a
            ></span
        ><br />
        <span :class="{ 'font-medium': strongLabels }">E-Mail</span>{{ ' ' }}
        <span class="font-medium" :class="`text-${color}-600`"
            ><a
                href="mailto:me@vivien.ag"
                class="hover:underline"
                :class="`text-${color}-600`"
                >me@vivien.ag</a
            ></span
        ><br />
        oder via
        <span class="font-medium" :class="`text-${color}-600`"
            ><a
                href="https://www.facebook.com/sybille.seuffer"
                class="hover:underline"
                :class="`text-${color}-600`"
                ><span class="font-medium">Facebook</span></a
            ></span
        >
    </p>
</template>
