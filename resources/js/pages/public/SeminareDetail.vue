<script setup lang="ts">
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { computed, onMounted, watch } from 'vue';
import PageCard from '@/components/public/PageCard.vue';
import * as SeminarController from '@/actions/App/Http/Controllers/Public/SeminarController';
import { useAttendeeStorage } from '@/composables/useAttendeeStorage';
import { usePageMeta } from '@/composables/usePageMeta';
import type { EventResource } from '@/types/public';

const props = defineProps<{
    event: EventResource;
}>();

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta(props.event.event_type.name);

const page = usePage();
const flash = computed(() => page.props.flash as { success: string | null; error: string | null });

const { load, save, clear } = useAttendeeStorage();

const form = useForm({
    salutation: '',
    firstname: '',
    surname: '',
    phone: '',
    email: '',
    attendance: 1,
    message: '',
    save_data: false,
});

onMounted(() => {
    const saved = load();
    if (saved) {
        form.salutation = saved.salutation;
        form.firstname = saved.firstname;
        form.surname = saved.surname;
        form.phone = saved.phone;
        form.email = saved.email;
        form.save_data = true;
    }
});

watch(() => form.save_data, (should) => { if (!should) clear(); });

function submit() {
    if (form.save_data) {
        save({ salutation: form.salutation, firstname: form.firstname, surname: form.surname, phone: form.phone, email: form.email });
    }
    form.post(SeminarController.register.url(props.event.uuid));
}

const COLOR_MAP: Record<string, string> = {
    rose: '#e11d48', fuchsia: '#c026d3', green: '#16a34a', sky: '#0284c7',
    amber: '#d97706', emerald: '#059669', teal: '#0d9488', pink: '#db2777',
    red: '#dc2626', blue: '#2563eb', purple: '#9333ea', orange: '#ea580c',
    indigo: '#4f46e5', violet: '#7c3aed', gray: '#6b7280', slate: '#64748b',
};
const accent = computed(() => COLOR_MAP[props.event.event_type.color] ?? '#6b7280');

function formatDate(iso: string): string { return new Date(iso).toLocaleDateString('de-DE', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' }); }
function formatTime(iso: string): string { return new Date(iso).toLocaleTimeString('de-DE', { hour: '2-digit', minute: '2-digit' }); }
function formatPrice(price: number | null, note: string | null): string {
    if (!price) return 'Auf Anfrage';
    return new Intl.NumberFormat('de-DE', { minimumFractionDigits: 2 }).format(price / 100) + ' €' + (note ? ` (${note})` : '');
}
function getLocation(): string {
    if (props.event.event_location === 'jaegerstrasse') return 'Jägerstraße 26, 75339 Spielberg';
    return props.event.custom_event_location ?? props.event.event_location_label ?? '';
}
const maxSeats = computed(() => Math.max(1, props.event.available_seats));
</script>

<template>
    <Head :title="event.event_type.name" />

    <div class="lg:flex">
        <!-- Details -->
        <div class="lg:flex lg:w-1/2 lg:self-stretch">
            <PageCard>
                <a href="/seminare" class="mb-4 flex items-center gap-1 text-xs text-stone-400 hover:text-stone-600">
                    ← Alle Seminare
                </a>

                <div class="mb-2 flex items-center gap-2">
                    <span class="h-3 w-3 rounded-sm" :style="{ backgroundColor: accent }" />
                    <span class="font-semibold" :style="{ color: accent }">{{ event.event_type.name }}</span>
                    <span v-if="event.event_day_label" class="text-sm text-stone-400">{{ event.event_day_label }}</span>
                </div>
                <p class="mb-4 text-sm text-stone-400">{{ formatDate(event.date_from) }}</p>

                <div class="space-y-3 text-sm text-stone-600">
                    <div class="flex items-center justify-between">
                        <span>{{ formatTime(event.date_from) }} – {{ formatTime(event.date_to) }} Uhr</span>
                        <span v-if="event.duration_hours" class="rounded px-2 py-0.5 text-xs font-semibold text-white" :style="{ backgroundColor: accent }">{{ event.duration_hours }} Std</span>
                    </div>
                    <div>{{ getLocation() }}</div>
                    <p v-if="event.description" class="italic leading-relaxed" :style="{ color: accent }">{{ event.description }}</p>

                    <div class="space-y-2 border-t border-gray-100 pt-3">
                        <div>{{ event.maximum_attendees }} Teilnehmer maximal</div>
                        <div v-if="event.catering.length">{{ event.catering.join(' · ') }}</div>
                        <div class="font-medium text-stone-700">{{ formatPrice(event.price, event.price_note) }}</div>
                        <div v-if="event.lead" class="flex items-center gap-2 pt-1">
                            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-stone-100 text-xs font-bold text-stone-400">SS</div>
                            <div class="text-xs"><div class="font-medium text-stone-600">{{ event.lead }}</div><div class="text-stone-400">Leitung</div></div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 rounded-full px-3 py-1 text-center text-xs font-medium" :class="event.available_seats > 0 ? 'bg-green-50 text-green-700' : 'bg-stone-100 text-stone-400'">
                    {{ event.available_seats > 0 ? `${event.available_seats} Plätze verfügbar` : 'Ausgebucht' }}
                </div>
            </PageCard>
        </div>

        <!-- Anmeldeformular -->
        <div class="lg:flex lg:w-1/2 lg:self-stretch lg:pl-10">
            <PageCard>
                <!-- Erfolg -->
                <div v-if="flash.success" class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-sm font-medium text-green-800">
                    {{ flash.success }}
                </div>

                <!-- Ausgebucht -->
                <div v-if="event.available_seats <= 0" class="text-center text-stone-500">
                    <p class="mb-2 text-2xl">🎟</p>
                    <p class="font-semibold text-stone-700">Dieses Seminar ist ausgebucht.</p>
                    <a href="/seminare" class="mt-3 block text-sm hover:underline" :style="{ color: accent }">Andere Seminare ansehen</a>
                </div>

                <!-- Formular -->
                <form v-else @submit.prevent="submit">
                    <h2 class="mb-5 text-xl font-semibold leading-tight tracking-tight" :style="{ color: accent }">
                        Anmeldung
                    </h2>

                    <!-- Anrede -->
                    <div class="mb-4">
                        <label class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-stone-400">Anrede *</label>
                        <div class="flex gap-5">
                            <label class="flex cursor-pointer items-center gap-2 text-sm">
                                <input v-model="form.salutation" type="radio" value="Mrs" class="accent-[var(--color-nav-accent)]" />
                                Frau
                            </label>
                            <label class="flex cursor-pointer items-center gap-2 text-sm">
                                <input v-model="form.salutation" type="radio" value="mr" class="accent-[var(--color-nav-accent)]" />
                                Herr
                            </label>
                        </div>
                        <p v-if="form.errors.salutation" class="mt-1 text-xs text-red-500">{{ form.errors.salutation }}</p>
                    </div>

                    <!-- Name -->
                    <div class="mb-4 grid grid-cols-2 gap-3">
                        <div>
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-stone-400">Vorname *</label>
                            <input v-model="form.firstname" type="text" autocomplete="given-name" class="w-full rounded border border-gray-200 px-3 py-2 text-sm text-stone-700 outline-none focus:border-stone-400" />
                            <p v-if="form.errors.firstname" class="mt-1 text-xs text-red-500">{{ form.errors.firstname }}</p>
                        </div>
                        <div>
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-stone-400">Nachname *</label>
                            <input v-model="form.surname" type="text" autocomplete="family-name" class="w-full rounded border border-gray-200 px-3 py-2 text-sm text-stone-700 outline-none focus:border-stone-400" />
                            <p v-if="form.errors.surname" class="mt-1 text-xs text-red-500">{{ form.errors.surname }}</p>
                        </div>
                    </div>

                    <!-- E-Mail -->
                    <div class="mb-4">
                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-stone-400">E-Mail *</label>
                        <input v-model="form.email" type="email" autocomplete="email" class="w-full rounded border border-gray-200 px-3 py-2 text-sm text-stone-700 outline-none focus:border-stone-400" />
                        <p v-if="form.errors.email" class="mt-1 text-xs text-red-500">{{ form.errors.email }}</p>
                    </div>

                    <!-- Telefon -->
                    <div class="mb-4">
                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-stone-400">Telefon (optional)</label>
                        <input v-model="form.phone" type="tel" autocomplete="tel" class="w-full rounded border border-gray-200 px-3 py-2 text-sm text-stone-700 outline-none focus:border-stone-400" />
                    </div>

                    <!-- Anzahl -->
                    <div class="mb-4">
                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-stone-400">Anzahl Personen *</label>
                        <select v-model="form.attendance" class="w-full rounded border border-gray-200 px-3 py-2 text-sm text-stone-700 outline-none focus:border-stone-400">
                            <option v-for="n in maxSeats" :key="n" :value="n">{{ n }} Person{{ n > 1 ? 'en' : '' }}</option>
                        </select>
                        <p v-if="form.errors.attendance" class="mt-1 text-xs text-red-500">{{ form.errors.attendance }}</p>
                    </div>

                    <!-- Nachricht -->
                    <div class="mb-4">
                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-stone-400">Nachricht (optional)</label>
                        <textarea v-model="form.message" rows="3" class="w-full rounded border border-gray-200 px-3 py-2 text-sm text-stone-700 outline-none focus:border-stone-400" />
                    </div>

                    <!-- Daten speichern -->
                    <label class="mb-5 flex cursor-pointer items-start gap-2.5 text-xs text-stone-500">
                        <input v-model="form.save_data" type="checkbox" class="mt-0.5 flex-shrink-0" />
                        <span><strong class="text-stone-700">Meine Daten speichern</strong> – Kontaktdaten für künftige Anmeldungen vorausfüllen.</span>
                    </label>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full rounded py-2.5 text-sm font-bold text-white transition hover:opacity-90 disabled:opacity-50"
                        :style="{ backgroundColor: accent }"
                    >
                        {{ form.processing ? 'Wird gesendet…' : 'Teilnehmen' }}
                    </button>
                </form>
            </PageCard>
        </div>
    </div>
</template>
