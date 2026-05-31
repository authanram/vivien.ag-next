<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import PageCard from '@/components/public/PageCard.vue';
import * as SeminarController from '@/actions/App/Http/Controllers/Public/SeminarController';
import { usePageMeta } from '@/composables/usePageMeta';
import type { EventResource } from '@/types/public';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Seminare');

const props = defineProps<{
    events: { data: EventResource[] };
}>();

// Multi-Filter: Set von ausgewählten Typ-UUIDs
const selectedTypes = ref<Set<string>>(new Set());

function toggleFilter(uuid: string): void {
    const next = new Set(selectedTypes.value);
    if (next.has(uuid)) {
        next.delete(uuid);
    } else {
        next.add(uuid);
    }
    selectedTypes.value = next;
}

function clearFilters(): void {
    selectedTypes.value = new Set();
}

const filteredEvents = computed(() =>
    selectedTypes.value.size === 0
        ? props.events.data
        : props.events.data.filter((e) => selectedTypes.value.has(e.event_type.uuid)),
);

const eventsByType = computed(() => {
    const map: Record<string, { uuid: string; name: string; color: string; count: number; days: string[] }> = {};
    for (const e of props.events.data) {
        const key = e.event_type.uuid;
        if (!map[key]) {
            map[key] = { uuid: key, name: e.event_type.name, color: e.event_type.color, count: 0, days: [] };
        }
        map[key].count++;
        if (e.event_day_label && !map[key].days.includes(e.event_day_label)) {
            map[key].days.push(e.event_day_label);
        }
    }
    return Object.values(map).sort((a, b) => b.count - a.count);
});

const COLOR_MAP: Record<string, string> = {
    rose: '#e11d48', fuchsia: '#c026d3', green: '#16a34a', sky: '#0284c7',
    amber: '#d97706', emerald: '#059669', teal: '#0d9488', pink: '#db2777',
    red: '#dc2626', blue: '#2563eb', purple: '#9333ea', orange: '#ea580c',
    indigo: '#4f46e5', violet: '#7c3aed', gray: '#6b7280', slate: '#64748b',
    yellow: '#ca8a04', lime: '#65a30d', cyan: '#0891b2',
};
function typeColor(color: string): string { return COLOR_MAP[color] ?? '#6b7280'; }
function day(iso: string): string { return new Date(iso).getDate().toString(); }
function monthShort(iso: string): string { return new Date(iso).toLocaleDateString('de-DE', { month: 'short' }); }
function formatDate(iso: string): string { return new Date(iso).toLocaleDateString('de-DE', { day: '2-digit', month: 'long', year: 'numeric' }); }
function formatTime(iso: string): string { return new Date(iso).toLocaleTimeString('de-DE', { hour: '2-digit', minute: '2-digit' }); }
function formatPrice(price: number | null, note: string | null): string {
    if (!price) return 'Auf Anfrage';
    const f = new Intl.NumberFormat('de-DE', { minimumFractionDigits: 2 }).format(price / 100) + ' €';
    return note ? `${f} (${note})` : f;
}
function getCity(event: EventResource): string {
    if (event.event_location === 'jaegerstrasse') return 'Spielberg';
    if (event.custom_event_location) return event.custom_event_location.split(',')[0]?.trim() ?? '';
    return event.event_location_label ?? '';
}
function getStreet(event: EventResource): string {
    if (event.event_location === 'jaegerstrasse') return 'Jägerstr. 26';
    if (event.custom_event_location) return event.custom_event_location.split(',').slice(1).join(',').trim();
    return '';
}
function durationLabel(event: EventResource): string {
    if (event.is_multi_day && event.duration_days) return `${event.duration_days} Tage`;
    if (event.duration_hours) return `${event.duration_hours} Std`;
    return '';
}
</script>

<template>
    <Head title="Seminare" />

    <div class="lg:flex">
        <!-- Hauptliste -->
        <div class="lg:flex lg:w-1/2 lg:self-stretch">
            <div class="w-full">
                <div v-if="filteredEvents.length">
                    <div v-for="event in filteredEvents" :key="event.uuid" class="mb-5 flex items-start gap-3 md:mb-10">
                        <!-- Datum -->
                        <div class="w-12 flex-shrink-0 pt-2 text-center">
                            <div class="text-4xl font-bold leading-none" :style="{ color: typeColor(event.event_type.color) }">
                                {{ day(event.date_from) }}
                            </div>
                            <div class="text-xs text-gray-400">{{ monthShort(event.date_from) }}</div>
                        </div>

                        <!-- Card -->
                        <div class="min-w-0 flex-1 overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                            <div class="p-5">
                                <div class="mb-1 flex items-center gap-2">
                                    <span class="h-2.5 w-2.5 flex-shrink-0 rounded-sm" :style="{ backgroundColor: typeColor(event.event_type.color) }" />
                                    <span class="font-semibold" :style="{ color: typeColor(event.event_type.color) }">{{ event.event_type.name }}</span>
                                    <span v-if="event.event_day_label" class="text-xs text-gray-400">{{ event.event_day_label }}</span>
                                </div>
                                <p class="mb-3 text-xs text-gray-400">{{ formatDate(event.date_from) }}</p>

                                <div class="space-y-2 text-sm text-gray-600">
                                    <div class="flex items-center justify-between">
                                        <span>{{ formatTime(event.date_from) }} – {{ formatTime(event.date_to) }} Uhr</span>
                                        <span v-if="durationLabel(event)" class="rounded px-2 py-0.5 text-xs font-semibold text-white" :style="{ backgroundColor: typeColor(event.event_type.color) }">{{ durationLabel(event) }}</span>
                                    </div>
                                    <div class="flex items-start gap-1.5">
                                        <svg class="mt-0.5 h-3.5 w-3.5 flex-shrink-0 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <div>
                                            <div>{{ getCity(event) }}</div>
                                            <div v-if="getStreet(event)" class="text-xs text-gray-400">{{ getStreet(event) }}</div>
                                        </div>
                                    </div>
                                </div>

                                <p v-if="event.description" class="mt-3 text-sm italic" :style="{ color: typeColor(event.event_type.color) }">
                                    {{ event.description.split('.')[0] }}
                                </p>

                                <div class="mt-3 space-y-2 border-t border-gray-50 pt-3 text-sm text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg class="h-3.5 w-3.5 flex-shrink-0 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span><span class="font-medium">{{ event.maximum_attendees }} Teilnehmer</span> maximal<span v-if="event.reserved_seats"> · {{ event.reserved_seats }} Reservierung{{ event.reserved_seats !== 1 ? 'en' : '' }}</span></span>
                                    </div>
                                    <div v-if="event.catering.length" class="flex items-start gap-2 text-gray-500">
                                        <span class="text-xs">{{ event.catering.join(' · ') }}</span>
                                    </div>
                                    <div class="font-medium">{{ formatPrice(event.price, event.price_note) }}</div>
                                    <div v-if="event.lead" class="flex items-center gap-2 border-t border-gray-50 pt-2">
                                        <div class="flex h-7 w-7 items-center justify-center rounded-full bg-stone-100 text-xs font-bold text-stone-400">SS</div>
                                        <div class="text-xs"><div class="font-medium text-gray-600">{{ event.lead }}</div><div class="text-gray-400">Leitung</div></div>
                                    </div>
                                </div>
                            </div>

                            <Link
                                :href="SeminarController.show.url(event.uuid)"
                                class="block w-full py-3 text-center text-sm font-bold text-white transition hover:opacity-90"
                                :style="{ backgroundColor: event.available_seats > 0 ? typeColor(event.event_type.color) : '#a1a1aa' }"
                            >
                                {{ event.available_seats > 0 ? 'Teilnehmen' : 'Ausgebucht' }}
                            </Link>
                        </div>
                    </div>
                </div>

                <div v-else class="py-10 text-center text-gray-400">
                    <p>{{ selectedTypes.size > 0 ? 'Keine Seminare für die gewählten Kategorien.' : 'Aktuell sind keine Seminare geplant.' }}</p>
                    <button v-if="selectedTypes.size > 0" class="mt-2 text-sm underline" :style="{ color: 'var(--color-nav-accent)' }" @click="clearFilters">
                        Filter entfernen
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar: Filter -->
        <div class="mt-5 lg:mt-0 lg:flex lg:w-1/2 lg:self-stretch lg:pl-10">
            <div class="w-full">
                <PageCard>
                    <!-- Dynamische Zählung -->
                    <h2 class="font-semibold leading-tight text-xl mb-1 tracking-tight" style="color: var(--color-nav-accent)">
                        {{ filteredEvents.length }} Seminar{{ filteredEvents.length !== 1 ? 'e' : '' }}
                    </h2>
                    <p class="text-sm text-gray-400 mb-4">
                        in {{ eventsByType.length }} Kategorien
                        <template v-if="selectedTypes.size > 0">
                            · <button class="hover:underline" :style="{ color: 'var(--color-nav-accent)' }" @click="clearFilters">Filter zurücksetzen</button>
                        </template>
                    </p>

                    <ul class="space-y-1">
                        <li v-for="type in eventsByType" :key="type.uuid">
                            <button
                                class="flex w-full items-start gap-2.5 rounded px-2 py-1.5 text-left text-sm transition-colors"
                                :style="selectedTypes.has(type.uuid) ? { backgroundColor: typeColor(type.color) + '12' } : {}"
                                @mouseenter="(e) => { if (!selectedTypes.has(type.uuid)) (e.currentTarget as HTMLElement).style.backgroundColor = '#f9fafb'; }"
                                @mouseleave="(e) => { if (!selectedTypes.has(type.uuid)) (e.currentTarget as HTMLElement).style.backgroundColor = ''; }"
                                @click="toggleFilter(type.uuid)"
                            >
                                <svg class="mt-0.5 h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none">
                                    <circle
                                        cx="12" cy="12" r="9" stroke-width="1.5"
                                        :stroke="typeColor(type.color)"
                                        :fill="selectedTypes.has(type.uuid) ? typeColor(type.color) : 'none'"
                                        :fill-opacity="selectedTypes.has(type.uuid) ? 0.15 : 0"
                                    />
                                    <path v-if="selectedTypes.has(type.uuid)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" stroke="white" d="M8 12l2.5 2.5L16 9" />
                                </svg>
                                <div class="min-w-0">
                                    <span class="font-medium" :style="{ color: typeColor(type.color) }">{{ type.name }}</span>
                                    <span class="text-gray-400"> ({{ type.count }})</span>
                                    <div class="text-xs text-gray-400">{{ type.days.join(', ') }}</div>
                                </div>
                            </button>
                        </li>
                    </ul>
                </PageCard>
            </div>
        </div>
    </div>
</template>
