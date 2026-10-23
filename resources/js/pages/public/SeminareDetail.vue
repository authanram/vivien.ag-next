<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { computed, onMounted, watch } from 'vue';
import * as SeminarController from '@/actions/App/Http/Controllers/Public/SeminarController';
import EventCard from '@/components/public/EventCard.vue';
import PageCard from '@/components/public/PageCard.vue';
import { useAttendeeStorage } from '@/composables/useAttendeeStorage';
import { usePageMeta } from '@/composables/usePageMeta';
import { formatEventDate } from '@/lib/event-dates';
import type { EventResource } from '@/types/public';

defineOptions({ inheritAttrs: false });

const props = defineProps<{
    event: { data: EventResource };
}>();

const event = computed(() => props.event.data);
const color = computed(() => event.value.event_type.color);

const { setMeta } = usePageMeta();
setMeta(event.value.event_type.name);

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

watch(
    () => form.save_data,
    (should) => {
        if (!should) {
            clear();
        }
    },
);

function submit(): void {
    if (form.save_data) {
        save({
            salutation: form.salutation,
            firstname: form.firstname,
            surname: form.surname,
            phone: form.phone,
            email: form.email,
        });
    }

    form.post(SeminarController.register.url(event.value.uuid));
}

const startsAt = computed(() =>
    formatEventDate(event.value.date_from, {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    }),
);

const total = computed(() =>
    event.value.price === null
        ? null
        : (event.value.price / 100) * form.attendance,
);

const inputClass =
    'block w-full rounded-md border-2 border-gray-300 p-2 transition duration-150 ease-in-out focus:border-(--accent) focus:shadow-sm focus:outline-hidden sm:leading-5';
</script>

<template>
    <Head :title="event.event_type.name" />

    <div class="w-full lg:flex">
        <div class="mb-5 w-full md:mb-10 lg:w-1/2">
            <EventCard :event="event" />
        </div>

        <div
            v-if="event.available_seats > 0"
            class="w-full lg:w-1/2 lg:pl-6 xl:pl-12"
        >
            <PageCard
                nopadding
                class="px-4 pt-2 pb-4 shadow-lg md:p-6 md:pt-5"
                :style="{ '--accent': `var(--color-${color}-500)` }"
            >
                <form @submit.prevent="submit">
                    <div>
                        <h3
                            class="leading-6 font-medium"
                            :class="`text-${color}-600`"
                        >
                            {{ event.event_type.name }}
                        </h3>
                        <p
                            v-if="event.description"
                            class="mt-1 max-w-2xl text-sm leading-5 text-gray-500"
                        >
                            {{ event.description }}
                        </p>
                        <p
                            class="mt-1 max-w-2xl text-sm leading-5 font-medium text-gray-500"
                        >
                            {{ startsAt }}
                        </p>
                    </div>

                    <div
                        class="mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-6"
                    >
                        <span class="mb-1 block text-gray-700 md:mt-2 md:mb-0">
                            Anrede
                        </span>
                        <div class="sm:col-span-2">
                            <div class="mt-2 flex md:mt-0">
                                <label
                                    v-for="option in [
                                        { value: 'Mrs', label: 'Frau' },
                                        { value: 'mr', label: 'Herr' },
                                    ]"
                                    :key="option.value"
                                    class="mr-4 flex cursor-pointer items-center"
                                >
                                    <input
                                        v-model="form.salutation"
                                        type="radio"
                                        name="salutation"
                                        :value="option.value"
                                        class="mr-2 h-4 w-4 cursor-pointer"
                                    />
                                    <span class="block leading-5 text-gray-700">
                                        {{ option.label }}
                                    </span>
                                </label>
                            </div>
                            <p
                                v-if="form.errors.salutation"
                                class="pt-2 text-xs text-red-500 italic"
                            >
                                {{ form.errors.salutation }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <label
                            for="firstname"
                            class="mb-1 block text-gray-700 md:mt-2 md:mb-0"
                        >
                            Name
                        </label>
                        <div
                            class="flex max-w-lg items-start sm:col-span-2 sm:max-w-xs"
                        >
                            <div class="mr-2 block w-full">
                                <input
                                    id="firstname"
                                    v-model="form.firstname"
                                    type="text"
                                    placeholder="Vorname"
                                    autocomplete="given-name"
                                    :class="inputClass"
                                />
                                <p
                                    v-if="form.errors.firstname"
                                    class="pt-2 text-xs text-red-500 italic"
                                >
                                    {{ form.errors.firstname }}
                                </p>
                            </div>
                            <div class="ml-2 block w-full">
                                <input
                                    v-model="form.surname"
                                    type="text"
                                    placeholder="Nachname"
                                    autocomplete="family-name"
                                    :class="inputClass"
                                />
                                <p
                                    v-if="form.errors.surname"
                                    class="pt-2 text-xs text-red-500 italic"
                                >
                                    {{ form.errors.surname }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <label
                            for="phone"
                            class="mb-1 block text-gray-700 md:mt-2 md:mb-0"
                        >
                            Telefon
                        </label>
                        <div class="sm:col-span-2">
                            <div class="max-w-lg sm:max-w-xs">
                                <input
                                    id="phone"
                                    v-model="form.phone"
                                    type="tel"
                                    autocomplete="tel"
                                    :class="inputClass"
                                />
                            </div>
                            <p
                                v-if="form.errors.phone"
                                class="pt-2 text-xs text-red-500 italic"
                            >
                                {{ form.errors.phone }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <label
                            for="email"
                            class="mb-1 block text-gray-700 md:mt-2 md:mb-0"
                        >
                            E-Mailadresse
                        </label>
                        <div class="sm:col-span-2">
                            <div class="max-w-lg sm:max-w-xs">
                                <input
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    autocomplete="email"
                                    :class="inputClass"
                                />
                            </div>
                            <p
                                v-if="form.errors.email"
                                class="pt-2 text-xs text-red-500 italic"
                            >
                                {{ form.errors.email }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <label
                            for="attendance"
                            class="mb-1 block text-gray-700 md:mt-2 md:mb-0"
                        >
                            Teilnehmer
                        </label>
                        <div class="sm:col-span-2">
                            <div class="flex max-w-lg items-start sm:max-w-xs">
                                <div
                                    class="mr-3 inline-block rounded-md border border-gray-200"
                                >
                                    <select
                                        id="attendance"
                                        v-model="form.attendance"
                                        class="block h-8 w-full rounded-md border-2 border-gray-300 px-2 py-0.5 transition duration-150 ease-in-out focus:border-(--accent) focus:outline-hidden sm:leading-5"
                                    >
                                        <option
                                            v-for="n in event.available_seats"
                                            :key="n"
                                            :value="n"
                                        >
                                            {{ n }}
                                        </option>
                                    </select>
                                </div>
                                <div
                                    v-if="total !== null"
                                    class="flex items-center self-stretch"
                                >
                                    <div>
                                        {{ total }} &euro;
                                        <span
                                            v-if="form.attendance > 1"
                                            class="ml-1 inline-block text-xs text-gray-500 italic"
                                        >
                                            gesamt
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <p
                                v-if="form.errors.attendance"
                                class="pt-2 text-xs text-red-500 italic"
                            >
                                {{ form.errors.attendance }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <label
                            for="message"
                            class="mb-1 block text-gray-700 md:mt-2 md:mb-0"
                        >
                            Nachricht
                        </label>
                        <div class="sm:col-span-2">
                            <div class="max-w-lg sm:max-w-xs">
                                <textarea
                                    id="message"
                                    v-model="form.message"
                                    :class="inputClass"
                                />
                            </div>
                            <p
                                v-if="form.errors.message"
                                class="pt-2 text-xs text-red-500 italic"
                            >
                                {{ form.errors.message }}
                            </p>
                            <div
                                class="pt-2 text-xs leading-tight text-gray-500"
                            >
                                Solltest du mehrere Personen zu einem Seminar
                                anmelden, sei doch bitte so nett und hinerlasse
                                mir Vor- und Nachnamen dieser Personen.
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <div class="hidden sm:block" />
                        <label
                            class="flex cursor-pointer items-center leading-5 text-gray-700 sm:col-span-2"
                        >
                            <input
                                v-model="form.save_data"
                                type="checkbox"
                                class="mr-2 h-4 w-4 cursor-pointer"
                            />
                            Meine Daten für künftige Anmeldungen speichern
                        </label>
                    </div>

                    <div
                        class="mt-6 flex justify-end sm:border-t sm:border-gray-200 sm:pt-6 md:justify-start"
                    >
                        <div
                            class="order-last inline-block rounded-md shadow-sm md:order-first md:mr-2"
                        >
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="relative z-10 rounded-md border border-transparent px-5 tracking-wide text-white hover:bg-(--accent) focus:outline-hidden"
                                :class="[
                                    `bg-${color}-600`,
                                    { 'opacity-50': form.processing },
                                ]"
                            >
                                <span
                                    class="inline-flex items-center"
                                    style="height: 40px; padding-top: 2px"
                                >
                                    Anmelden
                                </span>
                            </button>
                        </div>
                        <div class="mr-2 inline-block rounded-md md:mr-0">
                            <Link
                                :href="SeminarController.index.url()"
                                class="relative z-10 block rounded-md border border-gray-300 bg-white px-5 tracking-wide text-gray-700 hover:bg-gray-100 hover:text-gray-500 focus:outline-hidden"
                            >
                                <span
                                    class="inline-flex items-center"
                                    style="height: 40px; padding-top: 2px"
                                >
                                    Verwerfen
                                </span>
                            </Link>
                        </div>
                    </div>
                </form>
            </PageCard>
        </div>
    </div>
</template>
