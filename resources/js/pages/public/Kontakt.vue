<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Kontakt');
</script>

<template>
    <Head title="Kontakt" />

    <PageCard>
        <div class="text-gray-600">
            <h2 class="font-semibold text-xl mb-4 text-gray-700">Sybille Seuffer</h2>

            <address class="not-italic mb-5">
                Jägerstraße 26<br />
                D-75339 Spielberg
            </address>

            <p class="mb-2">
                Telefon
                <a
                    href="tel:004974533264"
                    class="font-semibold px-1 rounded hover:opacity-80 text-white ml-1"
                    :style="{ backgroundColor: 'var(--color-nav-accent)' }"
                >
                    +49 (0) 7453 3264
                </a>
            </p>
            <p class="mb-2">
                E-Mail
                <a
                    href="mailto:me@vivien.ag"
                    class="font-semibold px-1 rounded hover:opacity-80 text-white ml-1"
                    :style="{ backgroundColor: 'var(--color-nav-accent)' }"
                >
                    me@vivien.ag
                </a>
            </p>
            <p>
                oder via
                <a
                    href="https://www.facebook.com/sybille.seuffer"
                    target="_blank"
                    rel="noopener"
                    class="font-bold hover:underline ml-1"
                    :style="{ color: 'var(--color-nav-accent)' }"
                >
                    Facebook
                </a>
            </p>
        </div>
    </PageCard>
</template>
