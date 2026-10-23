<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import { usePageColor } from '@/composables/usePageColor';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Lerntraining', 'Lernen kann so einfach sein.');

const { color } = usePageColor();

const erfahrungen = [
    'Hilfe bei mir bleibt alles nur im Kurzzeitgedächtnis.',
    'Ich wusste viel mehr und in der Klassenarbeit hatte ich einen Blackout.',
    'Hausaufgaben, ich hasse sie! Ich werde müde, wenn ich nur dran denke.',
    'Meine Konzentration lässt so schnell nach und meine Eltern nennen das Faulheit.',
];

const vorgehen = [
    'Gemeinsam finden wir heraus, was Du für ein Lerntyp bist.',
    'Ich zeige Dir Strategien, wie das Gelernte im Langzeitgedächtnis ankommt.',
    'Und wie Du Hausaufgaben sinnvoll gliedern und lernen kannst.',
];
</script>

<template>
    <Head title="Lerntraining" />

    <PageCard>
        <div class="x-parsedown">
            <h2 :class="`text-${color}-600`">
                Wenn Du diese oder ähnliche Erfahrungen mit Schule oder dem
                Lernen machst, dann bist Du bei mir richtig
            </h2>
            <ul>
                <li v-for="item in erfahrungen" :key="item">{{ item }}</li>
            </ul>
        </div>
    </PageCard>

    <PageCard>
        <div class="x-parsedown">
            <h3 :class="`text-${color}-600`">Wir gehen wie folgt vor</h3>
            <ul>
                <li v-for="item in vorgehen" :key="item">{{ item }}</li>
            </ul>
        </div>
    </PageCard>

    <PageCard>
        <div class="x-parsedown">
            <h4 :class="`text-${color}-600`">
                Folgendes kann ich Dir versichern
            </h4>
            <ul>
                <li>
                    Wenn Lernen zum Erfolg führt, kann es richtig Spaß machen.
                    🎉
                </li>
                <li>
                    In nur fünf Stunden Lerntraining, kannst Du einiges
                    erreichen.
                </li>
            </ul>
            <p><em>Also – Kopf hoch und locker bleiben! Es gibt Hilfe!</em></p>
        </div>
    </PageCard>
</template>
