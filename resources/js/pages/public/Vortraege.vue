<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Vorträge');
</script>

<template>
    <Head title="Vorträge" />

    <PageCard>
        <div class="text-gray-600">
            <h2 class="font-semibold text-xl mb-4 text-gray-700">Themenangebote für</h2>
            <ul class="space-y-1 mb-8">
                <li class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    Frauenfrühstückstreffen
                </li>
                <li class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    Kindergartenelternabend
                </li>
                <li class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    Erwachsenenbildung
                </li>
                <li class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    <div>
                        Fortbildung für Erzieherinnen:
                        <ul class="mt-1 space-y-1 ml-4">
                            <li class="flex items-start gap-2">
                                <span class="mt-2 block h-1 w-1 flex-shrink-0 rounded-full bg-gray-400" />
                                Was macht ein gutes Team aus?
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-2 block h-1 w-1 flex-shrink-0 rounded-full bg-gray-400" />
                                Elterngespräche – kompetent führen
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-2 block h-1 w-1 flex-shrink-0 rounded-full bg-gray-400" />
                                Therapeutische Interventionen bei Kindern mit Problemverhalten
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    Inhaltliche Gestaltung mit einem ausgewählten Büchertisch zum jeweiligen Thema!
                </li>
            </ul>
        </div>
    </PageCard>

    <PageCard>
        <div class="text-gray-600">
            <h3 class="font-semibold text-lg mb-4 text-gray-700">Vortragsthemen</h3>
            <ul class="space-y-1 mb-6">
                <li v-for="topic in topics1" :key="topic" class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    {{ topic }}
                </li>
            </ul>

            <hr class="my-5 border-gray-200" />

            <ul class="space-y-1">
                <li v-for="topic in topics2" :key="topic" class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    {{ topic }}
                </li>
            </ul>
        </div>
    </PageCard>
</template>

<script lang="ts">
const topics1 = [
    'Wenn Kinder trotzen',
    'Kinder können Krisen meistern',
    'Positives Erziehungsprogramm in Theorie und Praxis',
    'Mit Kindern wertschätzend und konsequent leben',
    'Keine Angst vor Krach und Streit',
    'Kinder zur Selbständigkeit erziehen / selbständig werden lassen',
    'Geschwisterkonstellationen / Geschwisterpositionen',
    'Kinder brauchen Grenzen',
    'Kinder altersentsprechend fördern ausgerichtet am Orientierungsplan',
    'Fit in der Schule und was Eltern dazu tun können',
    'Fit für die Schule (Vorschulkinder)',
];
const topics2 = [
    'Lebenslust statt Midlifefrust',
    'Leselust – Bücher vorgestellt von Sybille Seuffer',
    'Nein sagen ohne Schuldgefühle',
    'Keine Angst vor Krach und Streit',
    '„Anleitung zum Glücklichsein" – Was wir für ein gutes und gesundes Lebensgefühl erlernen können',
];
</script>
