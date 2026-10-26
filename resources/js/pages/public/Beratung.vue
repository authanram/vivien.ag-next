<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import { usePageColor } from '@/composables/usePageColor';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta(
    'Beratung',
    '<div class="x-parsedown"><p><span class="font-medium">Seit 20 Jahren arbeite ich als selbständige Therapeutin</span> mit Erwachsenen, Jugendlichen und Kindern. Ich bilde mich ständig weiter und nehme <a href="https://de.wikipedia.org/wiki/Supervision" class="hover:underline text-blue-600">Supervisionen</a> in Anspruch.</p></div>',
);

const { color } = usePageColor();

const schwerpunkte = [
    'Systemische Familientherapie',
    'Genogrammarbeit/Familienskulptur',
    'Gesprächstherapie',
    'Krisenintervention',
    'Aufsuchende Familientherapie',
    'Paartherapie',
    'Begleiteter Umgang',
    'Erziehungsberatung',
    'Psychologische Beratung (Online)',
    'Trennungsbegleitung/Beratung von Patchworkfamilien',
    'Suchtproblematik bei Jugendlichen',
    'Angststörungen',
    'Emotionale Stressreduzierung',
    'Lernen lernen',
    'Lernblockaden/Lerntraining',
    'Psychosomatische Störungen bei Kindern',
    'Fit für die Schule (Vorschulkinder)',
    'Elternkurse',
    'Pädagogische Rundbriefe',
    'Gesprächsgruppen',
    'Selbstbewusstseinstraining',
    'Maltherapie (Erwachsene und Kinder)',
    'Coaching',
    'Telefonberatung +49 (0) 7453 3264',
];
</script>

<template>
    <Head title="Beratung" />

    <PageCard>
        <div class="x-parsedown">
            <h2 :class="`text-${color}-600`">Schwerpunkte</h2>
            <ul>
                <li v-for="item in schwerpunkte" :key="item">{{ item }}</li>
            </ul>
        </div>
    </PageCard>
</template>
