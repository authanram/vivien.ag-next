<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import ContactDetails from '@/components/public/ContactDetails.vue';
import PageCard from '@/components/public/PageCard.vue';
import { usePageColor } from '@/composables/usePageColor';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Kontakt');

const { color } = usePageColor();
</script>

<template>
    <Head title="Kontakt" />

    <PageCard>
        <div class="x-parsedown">
            <h2 :class="`text-${color}-600`">Sybille Seuffer</h2>
            <p class="mb-4">Jägerstraße 26<br />D-72213 Spielberg</p>
            <ContactDetails class="mb-4" />
        </div>
    </PageCard>
</template>
