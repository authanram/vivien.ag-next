<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import * as SeminarController from '@/actions/App/Http/Controllers/Public/SeminarController';
import { usePageColor } from '@/composables/usePageColor';
import { eventDateTime, eventTime } from '@/lib/event-dates';
import type { EventResource } from '@/types/public';

const { color } = usePageColor();
const page = usePage();
const events = computed(
    () =>
        (page.props.recentEvents as { data: EventResource[] } | undefined)
            ?.data ?? [],
);

function publishedAt(iso: string): string {
    return new Date(iso).toLocaleString('de-DE', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    });
}

function dateRange(event: EventResource): string {
    return event.is_multi_day
        ? `${eventDateTime(event.date_from)} - ${eventDateTime(event.date_to)}`
        : `${eventDateTime(event.date_from)} - ${eventTime(event.date_to)}`;
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
    <div class="relative mx-auto">
        <div>
            <p
                class="text-3xl leading-tight font-semibold tracking-tight"
                :class="`text-${color}-600`"
            >
                Kürzlich veröffentlicht
            </p>
            <p class="mt-3 text-xl leading-7 text-gray-500 sm:mt-4">
                Das könnte dich interessieren
            </p>
            <div class="mt-1 text-xs text-gray-500 italic">
                (Zuletzt veröffentlichte Seminare und Blogbeiträge)
            </div>
        </div>

        <hr class="my-7" />

        <div class="grid gap-14 lg:min-h-[338px] lg:grid-cols-3">
            <div v-for="event in events" :key="event.uuid">
                <span class="mb-4 flex items-center">
                    <span class="text-sm leading-5">
                        <time :datetime="event.created_at">
                            Veröffentlicht am
                            <span class="font-medium">{{
                                publishedAt(event.created_at)
                            }}</span>
                        </time>
                        <span class="block text-xs text-gray-500">
                            1 Min. Lesedauer
                        </span>
                    </span>
                </span>
                <span class="relative mt-4 block text-gray-800">
                    <span
                        class="relative block overflow-hidden rounded-sm"
                        style="margin: -5px"
                    >
                        <span class="block" style="margin: 5px">
                            <Link
                                :href="SeminarController.index.url()"
                                class="block leading-6 text-gray-600"
                                :class="`hover:text-${color}-600`"
                            >
                                <span
                                    class="text-xl leading-tight font-semibold"
                                    >{{ event.event_type.name }}</span
                                >
                                <p
                                    v-if="event.description"
                                    class="mt-2 text-base"
                                >
                                    {{ event.description }}
                                </p>
                                <p class="mt-2 mb-1">
                                    <span class="font-normal">Datum</span
                                    >{{ ' ' }}
                                    {{ dateRange(event) }}
                                </p>
                                <p class="mb-1">
                                    <span class="font-normal">Ort</span
                                    >{{ ' ' }}
                                    {{ city(event) }}
                                </p>
                                <p class="mb-1">
                                    <span class="font-normal">Teilnehmer</span
                                    >{{ ' ' }}
                                    {{ event.maximum_attendees }}
                                </p>
                                <p v-if="event.price" class="mb-1">
                                    <span class="font-normal">Preis</span
                                    >{{ ' ' }}
                                    <span>{{ price(event) }}</span>
                                </p>
                            </Link>
                        </span>
                    </span>
                </span>
            </div>
        </div>
    </div>
</template>
