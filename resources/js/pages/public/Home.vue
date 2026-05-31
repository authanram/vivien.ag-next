<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import * as SeminarController from '@/actions/App/Http/Controllers/Public/SeminarController';
import { usePageMeta } from '@/composables/usePageMeta';
import type { EventResource } from '@/types/public';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Herzlich Willkommen');

defineProps<{
    upcomingEvents: { data: EventResource[] };
    recentEvents: { data: EventResource[] };
}>();

const COLOR_MAP: Record<string, string> = {
    rose: '#e11d48', fuchsia: '#c026d3', green: '#16a34a', sky: '#0284c7',
    amber: '#d97706', emerald: '#059669', teal: '#0d9488', pink: '#db2777',
    red: '#dc2626', blue: '#2563eb', purple: '#9333ea', orange: '#ea580c',
    indigo: '#4f46e5', violet: '#7c3aed', gray: '#6b7280', slate: '#64748b',
};
function typeColor(color: string): string { return COLOR_MAP[color] ?? '#6b7280'; }

function formatEventDate(iso: string): string {
    return new Date(iso).toLocaleDateString('de-DE', {
        day: '2-digit', month: '2-digit', year: 'numeric',
    });
}
function formatEventTime(iso: string): string {
    return new Date(iso).toLocaleTimeString('de-DE', { hour: '2-digit', minute: '2-digit' });
}
function formatPublishedDate(iso: string): string {
    const d = new Date(iso);
    return d.toLocaleDateString('de-DE', { day: '2-digit', month: '2-digit', year: 'numeric' })
        + ', ' + d.toLocaleTimeString('de-DE', { hour: 'numeric', minute: '2-digit' });
}
function isNew(iso: string): boolean {
    return Date.now() - new Date(iso).getTime() < 14 * 24 * 60 * 60 * 1000;
}
function diffForHumans(iso: string): string {
    const diff = new Date(iso).getTime() - Date.now();
    const days = Math.ceil(diff / (1000 * 60 * 60 * 24));
    if (days <= 0) return 'heute';
    if (days === 1) return 'morgen';
    if (days < 7) return `in ${days} Tagen`;
    if (days < 30) return `in ${Math.ceil(days / 7)} Wochen`;
    return `in ${Math.ceil(days / 30)} Monaten`;
}
</script>

<template>
    <Head title="Herzlich Willkommen" />

    <div class="lg:flex">
        <!-- Hauptinhalt links -->
        <div class="lg:flex lg:w-1/2 lg:self-stretch">
            <PageCard>
                <div class="text-gray-500">
                    <h3 class="font-semibold text-lg mb-1" style="color: var(--color-nav-accent)">
                        Seminare 2025/2026
                    </h3>
                    <p class="text-xs text-gray-400 mb-4">
                        18.12.2025 / erstellt von Sybille Seuffer
                    </p>

                    <p class="mb-4 leading-relaxed font-medium text-gray-600">
                        Liebe Besucher, die Termine/Seminare für 2026 sind nun online.
                    </p>

                    <p class="mb-2 leading-relaxed">
                        Du kannst mich auch auf
                        <a href="https://www.facebook.com/sybille.seuffer" target="_blank" rel="noopener"
                           class="font-bold hover:underline" style="color: var(--color-nav-accent)">
                            Facebook
                        </a>
                        besuchen.
                    </p>

                    <p class="mb-6 leading-relaxed">
                        <strong class="text-gray-600">Herzliche Grüße</strong><br />
                        <span class="font-semibold" style="color: var(--color-nav-accent)">Sybille Seuffer</span>
                    </p>

                    <div class="border-t border-gray-100 pt-5 text-sm">
                        <address class="not-italic mb-3 text-gray-500">
                            Jägerstraße 26<br />
                            D-75339 Spielberg
                        </address>

                        <p class="mb-1.5">
                            Telefon
                            <a href="tel:004974533264"
                               class="font-semibold text-white text-xs px-2 py-0.5 rounded ml-1 hover:opacity-80"
                               :style="{ backgroundColor: 'var(--color-nav-accent)' }">
                                +49 (0)7453 3264
                            </a>
                        </p>
                        <p class="mb-1.5">
                            E-Mail
                            <a href="mailto:me@vivien.ag"
                               class="font-semibold text-white text-xs px-2 py-0.5 rounded ml-1 hover:opacity-80"
                               :style="{ backgroundColor: 'var(--color-nav-accent)' }">
                                me@vivien.ag
                            </a>
                        </p>
                        <p>
                            oder via
                            <a href="https://www.facebook.com/sybille.seuffer"
                               target="_blank" rel="noopener"
                               class="font-bold hover:opacity-80 ml-1"
                               style="color: var(--color-nav-accent)">
                                Facebook
                            </a>
                        </p>
                    </div>
                </div>
            </PageCard>
        </div>

        <!-- Sidebar: Nächste Seminare (exakt wie events-sidebar.blade.php) -->
        <div v-if="upcomingEvents.data.length" class="mt-5 lg:mt-0 lg:flex lg:w-1/2 lg:self-stretch lg:pl-10">
            <PageCard :nopadding="true">
                <!-- Header mit Padding-Klasse (aus Original: padding pt-9 pb-7) -->
                <div class="p-5 pt-9 pb-7 md:p-10 md:pt-9 md:pb-7">
                    <h2 class="font-semibold leading-tight text-xl md:text-2xl py-1 tracking-tight"
                        style="color: var(--color-nav-accent)">
                        Nächste Seminare
                    </h2>
                </div>

                <div class="text-gray-500">
                    <div class="border-gray-200 border-b">
                        <Link
                            v-for="event in upcomingEvents.data"
                            :key="event.uuid"
                            :href="SeminarController.show.url(event.uuid)"
                            class="bg-gray-50 block border-gray-200 border-t leading-tight px-5 py-4 md:px-10 relative transition-colors"
                            @mouseenter="(e) => (e.currentTarget as HTMLElement).style.backgroundColor = typeColor(event.event_type.color) + '0d'"
                            @mouseleave="(e) => (e.currentTarget as HTMLElement).style.backgroundColor = '#f9fafb'"
                        >
                            <!-- Seminar-Typ + Wochentag + Datum + Zeit + Diff (exakt wie Original) -->
                            <span class="font-medium" :style="{ color: typeColor(event.event_type.color) }">{{ event.event_type.name }}</span>
                            <span v-if="event.event_day_label" class="font-medium" :style="{ color: typeColor(event.event_type.color) }">, {{ event.event_day_label }}</span>
                            <span class="leading-relaxed text-xs ml-0.5">
                                <span class="inline-block mr-0.5 font-medium">
                                    {{ formatEventDate(event.date_from) }}, {{ formatEventTime(event.date_from) }}
                                </span>
                                <span>({{ diffForHumans(event.date_from) }})</span>
                            </span>
                            <!-- Beschreibung -->
                            <span v-if="event.description" class="block text-sm mt-0.5">
                                {{ event.description.split('.')[0] }}
                            </span>
                        </Link>
                    </div>

                    <Link
                        :href="SeminarController.index.url()"
                        class="block hover:underline md:text-sm px-5 py-3 md:px-10 relative text-right"
                        style="color: var(--color-nav-accent)"
                    >
                        Alle Seminare ›
                    </Link>
                </div>
            </PageCard>
        </div>
    </div>

    <!-- Kürzlich veröffentlicht -->
    <div v-if="recentEvents.data.length" class="mt-5 md:mt-10">
        <PageCard>
            <div class="mb-6">
                <h2 class="font-semibold text-xl md:text-2xl tracking-tight" style="color: var(--color-nav-accent)">
                    Kürzlich veröffentlicht
                </h2>
                <p class="text-sm text-gray-400 mt-0.5">Das könnte dich interessieren</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                <Link
                    v-for="event in recentEvents.data"
                    :key="event.uuid"
                    :href="SeminarController.show.url(event.uuid)"
                    class="block rounded-lg border border-gray-100 p-4 transition-all hover:border-gray-200 hover:shadow-sm"
                >
                    <p class="mb-2 text-xs text-gray-400">
                        veröffentlicht am {{ formatPublishedDate(event.created_at) }}
                        <span v-if="isNew(event.created_at)" class="font-medium" style="color: var(--color-nav-accent)">
                            / neu erschienen
                        </span>
                    </p>
                    <h3 class="mb-1 font-semibold text-gray-700">
                        {{ event.event_type.name }}<span v-if="event.event_day_label">, {{ event.event_day_label }}</span>
                    </h3>
                    <p v-if="event.description || event.lead" class="mb-3 text-sm leading-relaxed text-gray-500">
                        {{ ((event.description || event.lead) ?? '').split('.')[0] }}.
                    </p>
                    <div class="space-y-0.5 border-t border-gray-100 pt-3 text-xs text-gray-400">
                        <div v-if="event.date_from">
                            <span class="font-medium text-gray-500">Datum:</span>
                            {{ formatEventDate(event.date_from) }}, {{ formatEventTime(event.date_from) }}
                            <template v-if="event.date_to && !event.is_multi_day">
                                – {{ formatEventTime(event.date_to) }}
                            </template>
                        </div>
                        <div v-if="event.event_location_label || event.custom_event_location">
                            <span class="font-medium text-gray-500">Ort:</span>
                            {{ event.custom_event_location ?? event.event_location_label }}
                        </div>
                        <div v-if="event.maximum_attendees">
                            <span class="font-medium text-gray-500">Teilnehmer:</span>
                            {{ event.maximum_attendees }}
                        </div>
                        <div v-if="event.price !== null">
                            <span class="font-medium text-gray-500">Preis:</span>
                            {{ event.price }} €
                        </div>
                    </div>
                </Link>
            </div>
        </PageCard>
    </div>
</template>
