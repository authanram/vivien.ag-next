<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {
    Clock,
    Coffee,
    CreditCard,
    MapPin,
    User,
    Users,
} from 'lucide-vue-next';
import { computed } from 'vue';
import { eventTime as time, formatEventDate } from '@/lib/event-dates';
import type { EventResource } from '@/types/public';

const props = defineProps<{
    event: EventResource;
    href?: string;
}>();

const color = computed(() => props.event.event_type.color);
const hasSeats = computed(() => props.event.available_seats > 0);
const leads = computed(
    () => props.event.lead?.split(',').map((lead) => lead.trim()) ?? [],
);
const location = computed(() =>
    props.event.event_location === 'jaegerstrasse'
        ? ['Spielberg', 'Jägerstr. 26']
        : (
              props.event.custom_event_location ??
              props.event.event_location_label ??
              ''
          ).split(', '),
);

function date(iso: string): string {
    return formatEventDate(iso, {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
    });
}
</script>

<template>
    <div
        class="relative mx-auto w-full self-stretch rounded-lg bg-white shadow-md"
    >
        <div class="relative overflow-hidden rounded-lg p-8 text-gray-800">
            <div
                class="absolute inset-0 opacity-25"
                :class="`bg-${color}-100`"
            />
            <div class="relative">
                <div class="flex pb-6">
                    <div class="w-10">
                        <div
                            class="mt-1 h-4 w-4 rounded-sm"
                            :class="`bg-${color}-600`"
                        />
                    </div>
                    <div class="grow flex-col">
                        <span
                            class="text-xl leading-tight font-semibold tracking-tight xl:text-2xl"
                            :class="`text-${color}-600`"
                            style="padding-right: 2px"
                            >{{ event.event_type.name }}</span
                        >{{ ' ' }}
                        <span v-if="event.event_day_label" class="text-sm">{{
                            event.event_day_label
                        }}</span>
                        <div class="text-sm leading-5">
                            {{ date(event.date_from) }}
                        </div>
                    </div>
                </div>

                <div class="flex" :class="event.is_multi_day ? 'pb-2' : 'pb-6'">
                    <div class="flex w-10 items-center">
                        <Clock
                            class="size-6 text-gray-500"
                            style="margin-top: -1px"
                        />
                    </div>
                    <div
                        class="grow items-center text-lg leading-tight md:flex"
                    >
                        <div class="grow">
                            <template v-if="event.is_multi_day">
                                {{ time(event.date_from) }},
                                <span class="mt-1 text-sm opacity-75">{{
                                    date(event.date_from)
                                }}</span>
                            </template>
                            <template v-else>
                                {{ time(event.date_from) }} -
                                {{ time(event.date_to) }} Uhr
                            </template>
                        </div>
                        <div class="mt-2 md:mt-0 md:text-right">
                            <div
                                class="inline-block rounded-sm p-1 px-2 text-sm text-white"
                                :class="`bg-${color}-600`"
                            >
                                {{
                                    event.is_multi_day
                                        ? `${event.duration_days} Tage`
                                        : `${event.duration_hours} Std`
                                }}
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="event.is_multi_day" class="flex pb-6">
                    <div class="w-10" />
                    <div class="grow text-lg leading-tight">
                        {{ time(event.date_to) }},
                        <span class="mt-1 text-sm opacity-75">{{
                            date(event.date_to)
                        }}</span>
                    </div>
                </div>

                <div class="flex pb-6">
                    <div class="flex w-10 items-center">
                        <MapPin
                            class="size-6 text-gray-500"
                            style="margin-top: -1px"
                        />
                    </div>
                    <div class="grow items-center leading-tight md:text-lg">
                        <div>{{ location[0] }}</div>
                        <div
                            v-for="line in location.slice(1)"
                            :key="line"
                            class="pt-1 text-sm leading-5 opacity-75"
                        >
                            {{ line }}
                        </div>
                    </div>
                </div>

                <div
                    v-if="event.description"
                    class="pb-6 text-lg leading-tight"
                    :class="`text-${color}-600`"
                >
                    {{ event.description }}
                </div>

                <div class="flex pb-6">
                    <div class="flex w-10 items-center">
                        <Users
                            class="size-6 text-gray-500"
                            style="margin-top: -2px"
                        />
                    </div>
                    <div class="grow text-lg leading-tight">
                        <div>
                            {{ event.maximum_attendees }} Teilnehmer
                            <span class="text-sm leading-5 opacity-75"
                                >maximal</span
                            >
                        </div>
                        <div
                            v-if="event.reserved_seats"
                            class="text-sm opacity-75"
                        >
                            {{ event.reserved_seats }} Reservierungen
                        </div>
                    </div>
                </div>

                <div v-if="event.catering.length" class="flex pb-6">
                    <div class="flex w-10 items-center">
                        <Coffee
                            class="size-6 text-gray-500"
                            style="margin-top: -4px"
                        />
                    </div>
                    <div class="grow text-lg leading-tight">
                        <div>inkl. Verpflegung</div>
                        <div class="text-sm leading-5 opacity-75">
                            {{ event.catering.join(', ') }}
                        </div>
                    </div>
                </div>

                <div class="flex pb-6">
                    <div class="flex w-10 items-center">
                        <CreditCard
                            class="text-gray-500"
                            :size="25"
                            style="
                                margin-top: -2px;
                                margin-left: -1px;
                                opacity: 0.85;
                            "
                        />
                    </div>
                    <div class="grow text-lg leading-tight">
                        <div>
                            {{
                                event.price === null
                                    ? 'Auf Anfrage'
                                    : `${(event.price / 100).toFixed(2)} €`
                            }}
                        </div>
                        <div
                            v-if="event.price_note"
                            class="text-sm leading-5 opacity-75"
                        >
                            {{ event.price_note }}
                        </div>
                    </div>
                </div>

                <hr class="mb-7 border-t-2" />

                <div :class="href && hasSeats ? 'mb-20' : 'mb-8'">
                    <div
                        v-for="(lead, index) in leads"
                        :key="lead"
                        class="flex items-center"
                        :class="{ 'mt-4': index > 0 }"
                    >
                        <div
                            v-if="lead.toLowerCase().includes('sybille')"
                            class="mr-5 h-16 w-16 overflow-hidden rounded-full shadow-md"
                        >
                            <img
                                :alt="lead"
                                :title="lead"
                                src="/images/sybille-seuffer.jpg"
                            />
                        </div>
                        <div
                            v-else
                            class="mr-5 flex h-16 w-16 items-center justify-center overflow-hidden rounded-full bg-teal-500 text-white"
                        >
                            <User class="size-6" />
                        </div>
                        <div class="text-lg">
                            {{ lead }}
                            <div class="text-sm opacity-75">Leitung</div>
                        </div>
                    </div>
                </div>

                <div
                    v-if="!hasSeats"
                    class="-mx-8 mt-3 -mb-9 px-8 py-7 text-white"
                    :class="`bg-${color}-500`"
                >
                    <div class="mb-2 font-medium">
                        Online-Anmeldung abgeschlossen
                    </div>
                    <div class="text-xs italic">
                        <span class="font-medium">
                            Dies kann verschiedene Gründe haben:
                        </span>
                        <ul class="my-2 ml-6 list-disc">
                            <li class="pb-1">
                                möglicherweise wurde die max. Teilnehmerzahl
                                erreicht
                            </li>
                            <li class="pb-1">
                                der Voranmeldezeitraum wurde bereits
                                überschritten
                            </li>
                            <li class="pb-1">
                                oder die Online-Anmeldung für dieses Seminar
                                wurde deaktiviert
                            </li>
                        </ul>
                        <p>
                            Möchtest du dennoch an diesem Seminar teilnehmen,
                            kontaktiere mich bitte per
                            <a
                                href="mailto:me@vivien.ag"
                                class="font-medium hover:underline"
                                >E-Mail</a
                            >. Herzlichen Dank!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <Link
            v-if="href && hasSeats"
            :href="href"
            class="absolute right-0 bottom-0 left-0 flex h-14 w-full items-center justify-center rounded-b-lg text-2xl font-medium text-white focus:outline-hidden"
            :class="`bg-${color}-500 hover:bg-${color}-600 active:bg-${color}-500`"
        >
            Teilnehmen
        </Link>
    </div>
</template>
