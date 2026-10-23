<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import { usePageColor } from '@/composables/usePageColor';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Vorträge');

const { color } = usePageColor();

const kinderThemen = [
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

const erwachsenenThemen = [
    'Lebenslust statt Midlifefrust',
    'Leselust - Bücher vorgestellt von Sybille Seuffer',
    'Nein sagen ohne Schuldgefühle',
    'Keine Angst vor Krach und Streit',
    '"Anleitung zum Glücklichsein" - Was wir für ein gutes und gesundes Lebensgefühl erlernen können',
];
</script>

<template>
    <Head title="Vorträge" />

    <PageCard>
        <div class="x-parsedown">
            <h2 :class="`text-${color}-600`">Themenangebote für</h2>
            <ul>
                <li>Frauenfrühstückstreffen</li>
                <li>Kindergartenelternabend</li>
                <li>Erwachsenenbildung</li>
                <li>
                    Fortbildung für Erzieherinnen:
                    <ul>
                        <li>Was macht ein gutes Team aus?</li>
                        <li>Elterngespräche - kompetent führen</li>
                        <li>
                            Therapeutische Interventionen bei Kindern mit
                            Problemverhalten
                        </li>
                    </ul>
                </li>
                <li>
                    Inhaltliche Gestaltung mit einem ausgewählten Büchertisch
                    zum jeweiligen Thema!
                </li>
            </ul>
        </div>
    </PageCard>

    <PageCard>
        <div class="x-parsedown">
            <h3 :class="`text-${color}-600`">Vortragsthemen</h3>
            <ul>
                <li v-for="thema in kinderThemen" :key="thema">{{ thema }}</li>
            </ul>
            <hr />
            <ul>
                <li v-for="thema in erwachsenenThemen" :key="thema">
                    {{ thema }}
                </li>
            </ul>
        </div>
    </PageCard>
</template>
