<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import * as SeminarController from '@/actions/App/Http/Controllers/Public/SeminarController';
import ContactDetails from '@/components/public/ContactDetails.vue';
import PageCard from '@/components/public/PageCard.vue';
import { usePageColor } from '@/composables/usePageColor';
import { usePageMeta } from '@/composables/usePageMeta';
import { beratung, lerntraining, vortraege } from '@/routes';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Portrait');

const { color } = usePageColor();

const leistungen = [
    'Frauengruppen',
    'Paargruppen',
    'Seminare',
    'Vorträge',
    'Erziehungsberatung (PEP4Kids)',
    'Einzelberatung / Paarberatung',
    'Psychologische Beratung (Online)',
    'Gesprächstherapie',
    'Kreatives Schreiben',
    'Malwerkstatt',
    'Lerntraining',
    'Telefonberatung',
];

const ueberMich = [
    {
        label: 'Ich liebe',
        value: 'Kinder, italienisches Essen, Radfahren, Kunstausstellungen',
    },
    { label: 'Reiseziele', value: 'Irland, Madeira, USA' },
    {
        label: 'Hobbies',
        value: 'Malen, Lesen, Schreiben, Tanzen, Städtereisen',
    },
    { label: 'Lieblingstier', value: 'Eule' },
    { label: 'Lieblingsfilm', value: 'Grüne Tomaten, Säulen der Erde' },
    { label: 'Meine Stärke', value: 'Geduld' },
    { label: 'Meine Schwäche', value: 'Nachteule' },
    { label: 'Motto (2026)', value: 'Die Ruhe selbst sein' },
];

const angebote = [
    { href: vortraege.url(), label: 'Vortragsthemen' },
    { href: beratung.url(), label: 'Beratungsschwerpunkte' },
    { href: lerntraining.url(), label: 'Lernstrategien' },
];
</script>

<template>
    <Head title="Portrait" />

    <PageCard>
        <div class="lg:flex">
            <div class="mb-8 w-full lg:mb-0 lg:w-1/2">
                <p
                    class="text-xl leading-tight font-semibold tracking-tight sm:text-2xl"
                    :class="`text-${color}-600`"
                >
                    Sybille Seuffer
                </p>
                <p class="mt-1 font-medium">
                    Familientherapeutin, Pädagogin und Lerntrainerin
                </p>
                <img
                    alt="Sybille Seuffer"
                    src="/images/sybille-seuffer.jpg"
                    class="my-8 h-48 w-48 rounded-full shadow-md"
                />
                <div class="x-parsedown">
                    <ContactDetails strong-labels />
                    <p class="mt-2 text-sm text-gray-500">
                        Jägerstraße 26<br />D-72213 Spielberg
                    </p>
                </div>
            </div>

            <div
                class="mt-2 hidden border-t-2 border-gray-200 pt-10 md:block"
            />

            <div class="w-full lg:w-1/2">
                <p
                    class="text-xl leading-tight font-semibold tracking-tight sm:text-2xl"
                    :class="`text-${color}-600`"
                >
                    Über mich
                </p>
                <br />
                <div class="x-parsedown">
                    <p v-for="item in ueberMich" :key="item.label" class="mb-3">
                        <span
                            class="font-medium"
                            :class="`text-${color}-600`"
                            >{{ item.label }}</span
                        ><br />
                        {{ item.value }}
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-10 border-t-2 border-gray-200 pt-10" />

        <div class="lg:flex">
            <div class="mb-8 w-full lg:mb-0 lg:w-1/2">
                <h2
                    class="text-xl leading-tight font-semibold tracking-tight sm:text-2xl"
                    :class="`text-${color}-600`"
                >
                    Leistungen
                </h2>
                <div class="-mt-1">
                    <div class="x-parsedown">
                        <ul>
                            <li v-for="item in leistungen" :key="item">
                                {{ item }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div
                class="mt-2 hidden border-t-2 border-gray-200 pt-10 md:block"
            />

            <div class="w-full lg:w-1/2">
                <h2
                    class="pb-4 text-xl leading-tight font-semibold tracking-tight sm:text-2xl"
                    :class="`text-${color}-600`"
                >
                    Vorträge und Seminare
                </h2>
                <div class="x-parsedown">
                    <p>Hier erfährst du mehr über die von mir angebotenen</p>
                    <ul>
                        <li
                            v-for="angebot in angebote"
                            :key="angebot.label"
                            class="ml-5"
                        >
                            <Link
                                :href="angebot.href"
                                class="hover:underline"
                                :class="`text-${color}-600`"
                                ><span class="font-medium">{{
                                    angebot.label
                                }}</span></Link
                            >
                        </li>
                        <li class="ml-5">
                            und
                            <Link
                                :href="SeminarController.index.url()"
                                class="hover:underline"
                                :class="`text-${color}-600`"
                                ><span class="font-medium">Seminare</span></Link
                            >
                        </li>
                    </ul>
                    <h2
                        class="pb-0 text-xl leading-tight font-semibold tracking-tight sm:text-2xl"
                        :class="`text-${color}-600`"
                    >
                        Empfehlungen
                    </h2>
                    <ul>
                        <li class="ml-5">
                            <a
                                href="https://dianarussky.com"
                                class="hover:underline"
                                :class="`text-${color}-600`"
                                >Diana Russky</a
                            >
                            ist Autorin und coacht Kinder, Jugendliche, Schüler,
                            Eltern, Lehrer und Lehrerinnen im Bereich
                            Persönlichkeitsentwicklung.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </PageCard>
</template>
