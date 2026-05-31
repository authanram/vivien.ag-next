<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Beratung', 'Seit 20 Jahren arbeite ich als selbständige Therapeutin mit Erwachsenen, Jugendlichen und Kindern. Ich bilde mich ständig weiter und nehme Supervisionen in Anspruch.');

const schwerpunkte = [
    'Systemische Familientherapie',
    'Genogrammarbeit/Familienskulptur',
    'Gesprächstherapie',
    'Krisenintervention',
    'Aufsuchende Familientherapie',
    'Paartherapie',
    'Begleiteter Umgang',
    'Erziehungsberatung',
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
        <div class="text-gray-600">
            <h2 class="font-semibold text-xl mb-4 text-gray-700">Schwerpunkte</h2>
            <ul class="space-y-1">
                <li v-for="item in schwerpunkte" :key="item" class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    {{ item }}
                </li>
            </ul>
        </div>
    </PageCard>
</template>
