<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import * as SeminarController from '@/actions/App/Http/Controllers/Public/SeminarController';
import PageCard from '@/components/public/PageCard.vue';
import { usePageColor } from '@/composables/usePageColor';
import { usePageMeta } from '@/composables/usePageMeta';
import { eventDateTime as dateTime } from '@/lib/event-dates';
import { portrait } from '@/routes';
import type { EventResource } from '@/types/public';

defineOptions({ inheritAttrs: false });

defineProps<{
    upcomingEvents: { data: EventResource[] };
}>();

const { setMeta } = usePageMeta();
setMeta('Herzlich Willkommen');

const { color } = usePageColor();

const relativeTime = new Intl.RelativeTimeFormat('de');
const units: [Intl.RelativeTimeFormatUnit, number][] = [
    ['year', 31536000],
    ['month', 2592000],
    ['week', 604800],
    ['day', 86400],
    ['hour', 3600],
    ['minute', 60],
    ['second', 1],
];

function fromNow(iso: string): string {
    const seconds = (new Date(iso).getTime() - Date.now()) / 1000;
    const [unit, size] = units.find(
        ([, size]) => Math.abs(seconds) >= size,
    ) ?? ['second', 1];

    return relativeTime.format(Math.trunc(seconds / size), unit);
}
</script>

<template>
    <Head title="Herzlich Willkommen" />

    <div class="lg:flex">
        <div class="lg:flex lg:w-1/2 lg:self-stretch">
            <PageCard class="welcome">
                <div class="text-gray-500">
                    <div class="x-parsedown">
                        <h3 :class="`text-${color}-600`">Seminare 2025/2026</h3>
                        <p class="mb-5">
                            <span class="font-medium">18.12.2025</span> /
                            erstellt von
                            <Link
                                :href="portrait.url()"
                                class="hover:underline"
                                :class="`text-${color}-600`"
                                >Sybille Seuffer</Link
                            >
                        </p>
                        <h4 :class="`text-${color}-600`">
                            Liebe Besucher, die
                            <Link
                                :href="SeminarController.index.url()"
                                class="hover:underline"
                                :class="`text-${color}-600`"
                                >Termine/Seminare</Link
                            >
                            für 2026 sind nun online.
                        </h4>
                        <p class="mb-5">
                            <span class="font-medium">Herzliche Grüße</span>
                        </p>
                    </div>
                </div>
                <div class="address text-sm">
                    <div class="x-parsedown">
                        <p :class="`text-${color}-600`">Sybille Seuffer</p>
                        <p class="mb-4">
                            Jägerstraße 26<br />D-72213 Spielberg
                        </p>
                        <p class="mb-4">
                            Telefon
                            <span
                                class="font-medium"
                                :class="`text-${color}-600`"
                                ><a
                                    href="tel:004974533264"
                                    class="hover:underline"
                                    :class="`text-${color}-600`"
                                    >+49 (0)7453 3264</a
                                ></span
                            ><br />
                            E-Mail
                            <span
                                class="font-medium"
                                :class="`text-${color}-600`"
                                ><a
                                    href="mailto:me@vivien.ag"
                                    class="hover:underline"
                                    :class="`text-${color}-600`"
                                    >me@vivien.ag</a
                                ></span
                            ><br />
                            oder via
                            <span
                                class="font-medium"
                                :class="`text-${color}-600`"
                                ><a
                                    href="https://www.facebook.com/sybille.seuffer"
                                    class="hover:underline"
                                    :class="`text-${color}-600`"
                                    ><span class="font-medium"
                                        >Facebook</span
                                    ></a
                                ></span
                            >
                        </p>
                    </div>
                </div>
            </PageCard>
        </div>

        <div class="lg:w-1/2 lg:pl-10">
            <PageCard nopadding class="overflow-hidden">
                <div class="px-5 pt-9 pb-7 md:px-10">
                    <h2
                        class="py-1 text-xl font-semibold tracking-tight md:text-2xl"
                        :class="`text-${color}-600`"
                    >
                        Nächste Seminare
                    </h2>
                </div>
                <div class="text-gray-600">
                    <div class="border-b border-gray-200">
                        <Link
                            v-for="event in upcomingEvents.data"
                            :key="event.uuid"
                            :href="SeminarController.show.url(event.uuid)"
                            class="relative block border-t border-gray-200 bg-gray-50 px-5 py-4 leading-tight transition-colors duration-150 md:px-10"
                            :class="`hover:bg-${event.event_type.color}-50`"
                        >
                            <span
                                class="font-medium"
                                :class="`text-${event.event_type.color}-600`"
                            >
                                {{ event.event_type.name
                                }}<template v-if="event.event_day_label"
                                    >, {{ event.event_day_label }}</template
                                ></span
                            >{{ ' ' }}
                            <span class="ml-0.5 text-xs leading-relaxed">
                                <span class="mr-0.5 inline-block font-medium">{{
                                    dateTime(event.date_from)
                                }}</span
                                >{{ ' ' }}
                                <span>({{ fromNow(event.date_from) }})</span>
                            </span>
                            <span class="block text-sm">{{
                                event.description
                            }}</span>
                        </Link>
                        <p
                            v-if="!upcomingEvents.data.length"
                            class="border-t border-gray-200 bg-gray-50 px-5 py-4 text-sm leading-snug md:px-10"
                        >
                            Aktuell sind keine weiteren Seminare geplant.
                        </p>
                    </div>
                    <Link
                        :href="SeminarController.index.url()"
                        class="relative block px-6 py-3 text-right font-medium hover:underline md:text-sm"
                        :class="`text-${color}-600`"
                    >
                        Alle Seminare ›
                    </Link>
                </div>
            </PageCard>
        </div>
    </div>
</template>
