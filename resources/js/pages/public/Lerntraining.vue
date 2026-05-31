<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Lerntraining', 'Lernen kann so einfach sein.');
</script>

<template>
    <Head title="Lerntraining" />

    <PageCard>
        <div class="text-gray-600">
            <h2 class="font-semibold text-xl mb-4 text-gray-700">
                Wenn Du diese oder ähnliche Erfahrungen mit Schule oder dem Lernen machst, dann bist Du bei mir richtig
            </h2>
            <ul class="space-y-1">
                <li v-for="item in problems" :key="item" class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    {{ item }}
                </li>
            </ul>
        </div>
    </PageCard>

    <PageCard>
        <div class="text-gray-600">
            <h3 class="font-semibold text-lg mb-4 text-gray-700">Wir gehen wie folgt vor</h3>
            <ul class="space-y-1">
                <li v-for="item in steps" :key="item" class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    {{ item }}
                </li>
            </ul>
        </div>
    </PageCard>

    <PageCard>
        <div class="text-gray-600">
            <h4 class="font-semibold text-base mb-3 text-gray-700">Folgendes kann ich Dir versichern</h4>
            <ul class="space-y-1 mb-4">
                <li class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    Wenn Lernen zum Erfolg führt, kann es richtig Spaß machen.
                </li>
                <li class="flex items-start gap-2">
                    <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                    In nur fünf Stunden Lerntraining, kannst Du einiges erreichen.
                </li>
            </ul>
            <p class="italic text-gray-500">Also – Kopf hoch und locker bleiben! Es gibt Hilfe!</p>
        </div>
    </PageCard>
</template>

<script lang="ts">
const problems = [
    'Hilfe, bei mir bleibt alles nur im Kurzzeitgedächtnis.',
    'Ich wusste viel mehr und in der Klassenarbeit hatte ich einen Blackout.',
    'Hausaufgaben, ich hasse sie! Ich werde müde, wenn ich nur dran denke.',
    'Meine Konzentration lässt so schnell nach und meine Eltern nennen das Faulheit.',
];
const steps = [
    'Gemeinsam finden wir heraus, was Du für ein Lerntyp bist.',
    'Ich zeige Dir Strategien, wie das Gelernte im Langzeitgedächtnis ankommt.',
    'Und wie Du Hausaufgaben sinnvoll gliedern und lernen kannst.',
];
</script>
