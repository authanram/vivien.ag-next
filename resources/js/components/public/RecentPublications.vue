<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import * as SeminarController from '@/actions/App/Http/Controllers/Public/SeminarController';
import PageCard from '@/components/public/PageCard.vue';
import { Separator } from '@/components/ui/separator';
import { usePageColor } from '@/composables/usePageColor';
import { eventTime, formatEventDate } from '@/lib/event-dates';
import type { EventResource } from '@/types/public';

const { color } = usePageColor();
const page = usePage();
const events = computed(
    () =>
        (page.props.recentEvents as { data: EventResource[] } | undefined)
            ?.data ?? [],
);

function publishedAt(iso: string): string {
    return new Date(iso).toLocaleDateString('de-DE', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
}

function details(event: EventResource): { label: string; value: string }[] {
    const day = (iso: string) =>
        formatEventDate(iso, {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
        });

    return [
        {
            label: 'Datum',
            value: event.is_multi_day
                ? `${day(event.date_from)} – ${day(event.date_to)}`
                : day(event.date_from),
        },
        {
            label: 'Uhrzeit',
            value: `${eventTime(event.date_from)} – ${eventTime(event.date_to)} Uhr`,
        },
        { label: 'Ort', value: city(event) },
        { label: 'Teilnehmer', value: `max. ${event.maximum_attendees}` },
        ...(event.price ? [{ label: 'Preis', value: price(event) }] : []),
    ];
}

function city(event: EventResource): string {
    if (event.event_location === 'jaegerstrasse') {
        return 'Spielberg';
    }

    return (
        event.custom_event_location?.split(',')[0]?.trim() ??
        event.event_location_label ??
        ''
    );
}

function price(event: EventResource): string {
    return `${((event.price ?? 0) / 100).toLocaleString('de-DE')} €`;
}
</script>

<template>
    <PageCard v-if="events.length" even>
        <div class="relative mx-auto">
            <div>
                <p
                    class="text-2xl leading-tight font-semibold tracking-tight md:text-3xl"
                    :class="`text-${color}-600`"
                >
                    Kürzlich veröffentlicht
                </p>
                <p class="mt-3 text-xl leading-7 text-gray-500 sm:mt-4">
                    Das könnte dich interessieren
                </p>
                <div class="mt-1 text-xs text-gray-500 italic">
                    (Zuletzt veröffentlichte Seminare)
                </div>
            </div>

            <Separator class="my-7" />

            <div class="grid gap-14 lg:min-h-[338px] lg:grid-cols-3">
                <Link
                    v-for="event in events"
                    :key="event.uuid"
                    :href="SeminarController.show.url(event.uuid)"
                    class="group -m-4 flex flex-col rounded-xl p-4 transition-colors duration-150 hover:bg-white/80"
                >
                    <time
                        :datetime="event.created_at"
                        class="block border-b border-gray-200 pb-3 text-xs text-gray-500"
                    >
                        Veröffentlicht am
                        <span class="font-medium text-gray-700">{{
                            publishedAt(event.created_at)
                        }}</span>
                    </time>
                    <span class="block pt-4 pb-5">
                        <span
                            class="block text-xl leading-tight font-semibold text-gray-800 transition-colors duration-150"
                            :class="`group-hover:text-${color}-600`"
                            >{{ event.event_type.name }}</span
                        >
                        <p
                            v-if="event.description"
                            class="mt-2 line-clamp-3 leading-relaxed text-gray-600 lg:min-h-[4.875rem]"
                        >
                            {{ event.description }}
                        </p>
                    </span>
                    <dl
                        class="divide-y divide-gray-200 border-y border-gray-200 text-sm tabular-nums"
                    >
                        <div
                            v-for="row in details(event)"
                            :key="row.label"
                            class="flex justify-between gap-4 py-2"
                        >
                            <dt class="text-gray-500">{{ row.label }}</dt>
                            <dd class="text-right font-medium text-gray-800">
                                {{ row.value }}
                            </dd>
                        </div>
                    </dl>
                    <span
                        class="mt-3 inline-block text-sm font-medium group-hover:underline"
                        :class="`text-${color}-600`"
                        >Zum Seminar ›</span
                    >
                </Link>
            </div>
        </div>
    </PageCard>
</template>
