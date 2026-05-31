<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Portrait');

const leistungen = [
    'Frauengruppen',
    'Paargruppen',
    'Seminare',
    'Vorträge',
    'Erziehungsberatung (PEP4Kids)',
    'Einzelberatung / Paarberatung',
    'Gesprächstherapie',
    'Kreatives Schreiben',
    'Malwerkstatt',
    'Lerntraining',
    'Telefonberatung',
    'Hypnotherapie',
];

const personalInfo = [
    { label: 'Ich liebe', value: 'Kinder, italienisches Essen, Radfahren, Kunstausstellungen' },
    { label: 'Reiseziele', value: 'Irland, Madeira, USA' },
    { label: 'Hobbies', value: 'Malen, Lesen, Schreiben, Tanzen, Städtereisen' },
    { label: 'Lieblingstier', value: 'Eule' },
    { label: 'Lieblingsfilm', value: 'Grüne Tomaten, Säulen der Erde' },
    { label: 'Meine Stärke', value: 'Geduld' },
    { label: 'Meine Schwäche', value: 'Nachteule' },
    { label: 'Motto', value: 'Die Ruhe selbst sein' },
];
</script>

<template>
    <Head title="Portrait" />

    <PageCard>
        <div class="lg:flex">
            <!-- Links: Name + Foto + Leistungen -->
            <div class="lg:mb-0 lg:w-1/2 mb-8 w-full">
                <p class="font-semibold leading-tight sm:text-2xl text-xl tracking-tight" style="color: var(--color-nav-accent)">
                    Sybille Seuffer
                </p>
                <p class="mt-1 font-medium text-gray-600">
                    Familientherapeutin, Pädagogin, Lerntrainerin
                </p>

                <div class="my-8 h-48 w-48 rounded-full shadow-md bg-stone-200 flex items-center justify-center text-stone-400 text-3xl font-bold">
                    SS
                </div>

                <div class="mb-6">
                    <h2 class="font-semibold leading-tight sm:text-2xl text-xl tracking-tight mb-4" style="color: var(--color-nav-accent)">
                        Leistungen
                    </h2>
                    <ul class="space-y-1 text-gray-600">
                        <li v-for="item in leistungen" :key="item" class="flex items-start gap-2">
                            <span class="mt-2 block h-1.5 w-1.5 flex-shrink-0 rounded-full" style="background-color: var(--color-nav-accent)" />
                            {{ item }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="hidden md:block border-gray-200 border-l-2 mx-8"></div>

            <!-- Rechts: Über mich -->
            <div class="lg:w-1/2 w-full">
                <h2 class="font-semibold leading-tight sm:text-2xl text-xl tracking-tight mb-6" style="color: var(--color-nav-accent)">
                    Über mich
                </h2>

                <div class="space-y-3 text-gray-600">
                    <div v-for="item in personalInfo" :key="item.label">
                        <span class="font-semibold" style="color: var(--color-nav-accent)">{{ item.label }}</span><br />
                        <span>{{ item.value }}</span>
                    </div>
                </div>
            </div>
        </div>
    </PageCard>
</template>
