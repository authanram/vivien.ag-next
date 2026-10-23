<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { Circle, CircleCheckBig } from 'lucide-vue-next';
import { computed, ref } from 'vue';
import * as SeminarController from '@/actions/App/Http/Controllers/Public/SeminarController';
import EventCard from '@/components/public/EventCard.vue';
import PageCard from '@/components/public/PageCard.vue';
import { usePageColor } from '@/composables/usePageColor';
import { usePageMeta } from '@/composables/usePageMeta';
import { formatEventDate as timeline } from '@/lib/event-dates';
import type { EventResource } from '@/types/public';

defineOptions({ inheritAttrs: false });

const props = defineProps<{
    events: { data: EventResource[] };
}>();

const { setMeta } = usePageMeta();
setMeta('Seminare');

const { color } = usePageColor();

const selectedTypes = ref<string[]>([]);

function toggleType(uuid: string): void {
    selectedTypes.value = selectedTypes.value.includes(uuid)
        ? selectedTypes.value.filter((selected) => selected !== uuid)
        : [...selectedTypes.value, uuid];
}

const filteredEvents = computed(() =>
    selectedTypes.value.length
        ? props.events.data.filter((event) =>
              selectedTypes.value.includes(event.event_type.uuid),
          )
        : props.events.data,
);

const types = computed(() => {
    const types = new Map<
        string,
        {
            uuid: string;
            name: string;
            color: string;
            count: number;
            days: Set<string>;
        }
    >();

    for (const event of props.events.data) {
        const type = types.get(event.event_type.uuid) ?? {
            ...event.event_type,
            count: 0,
            days: new Set<string>(),
        };
        type.count++;

        if (event.event_day_label) {
            type.days.add(event.event_day_label);
        }

        types.set(type.uuid, type);
    }

    return [...types.values()].sort((a, b) => a.name.localeCompare(b.name));
});

const categories = computed(
    () => selectedTypes.value.length || types.value.length,
);
</script>

<template>
    <Head title="Seminare" />

    <div class="w-full lg:flex">
        <div class="w-full xl:w-7/12">
            <div
                v-for="(event, index) in filteredEvents"
                :key="event.uuid"
                class="mb-5 flex md:mb-10"
            >
                <div class="relative hidden flex-col xl:block xl:w-1/4">
                    <div class="mb-5 flex justify-center px-3 md:mb-10">
                        <div class="mt-3 flex justify-center">
                            <div class="relative mt-5 w-full">
                                <div
                                    class="absolute z-0 mt-4 h-12 w-12 rounded-full bg-white/50"
                                    style="
                                        left: 50%;
                                        transform: translate(-50%, -50%);
                                    "
                                />
                                <div
                                    class="absolute z-0 mt-4 h-12 w-12 rounded-full opacity-30"
                                    :class="`bg-${event.event_type.color}-500`"
                                    style="
                                        left: 50%;
                                        transform: translate(-50%, -50%);
                                    "
                                />
                                <div
                                    class="relative z-10 -mt-6 text-center leading-none"
                                >
                                    <div
                                        class="text-5xl leading-none font-semibold [text-shadow:white_0_0_7px]"
                                        :class="`text-${event.event_type.color}-600`"
                                    >
                                        {{
                                            timeline(event.date_from, {
                                                day: 'numeric',
                                            })
                                        }}
                                    </div>
                                    <div
                                        class="-mt-1 text-xl leading-none font-semibold [text-shadow:white_0_0_7px]"
                                    >
                                        {{
                                            timeline(event.date_from, {
                                                month: 'long',
                                            })
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            v-if="index < filteredEvents.length - 1"
                            class="absolute top-0 flex h-full w-full justify-center"
                        >
                            <div class="mt-24 pt-7">
                                <div class="h-full w-px bg-gray-200" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full xl:w-3/4">
                    <EventCard
                        :event="event"
                        :href="SeminarController.show.url(event.uuid)"
                    />
                </div>
            </div>

            <PageCard v-if="!events.data.length">
                Aktuell sind keine Seminare geplant.
            </PageCard>
        </div>

        <div class="hidden w-full lg:block lg:pl-6 xl:w-5/12 xl:pl-12">
            <div v-if="types.length" class="relative">
                <PageCard
                    nopadding
                    class="p-6 pt-8"
                    :class="{ 'pb-16': selectedTypes.length }"
                >
                    <div class="mb-4 pl-2 leading-none">
                        <span
                            class="text-xl font-semibold xl:text-2xl"
                            :class="`text-${color}-600`"
                        >
                            {{ filteredEvents.length }}
                            {{
                                filteredEvents.length === 1
                                    ? 'Seminar'
                                    : 'Seminare'
                            }}
                        </span>
                        {{ ' ' }}
                        <span class="text-sm">
                            in {{ categories }}
                            {{ categories === 1 ? 'Kategorie' : 'Kategorien' }}
                        </span>
                    </div>
                    <button
                        v-for="type in types"
                        :key="type.uuid"
                        class="flex w-full items-center rounded-lg p-2 text-left leading-none focus:outline-hidden"
                        :class="`hover:bg-${type.color}-100`"
                        @click="toggleType(type.uuid)"
                    >
                        <component
                            :is="
                                selectedTypes.includes(type.uuid)
                                    ? CircleCheckBig
                                    : Circle
                            "
                            class="mr-5 size-6 shrink-0"
                            :class="`text-${type.color}-600`"
                        />
                        <span class="truncate">
                            <span
                                class="inline-block font-medium"
                                :class="`text-${type.color}-600`"
                                :title="`${type.count} Seminare`"
                            >
                                {{ type.name }}
                            </span>
                            {{ ' ' }}
                            <span class="text-xs">({{ type.count }})</span>
                            <span
                                v-if="type.days.size"
                                class="mt-1 block text-xs"
                            >
                                {{ [...type.days].join(', ') }}
                            </span>
                        </span>
                    </button>
                </PageCard>
                <button
                    v-if="selectedTypes.length"
                    class="absolute right-0 bottom-0 left-0 w-full rounded-b-lg bg-gray-100 p-3 text-sm font-medium text-gray-600 hover:bg-gray-200 active:bg-gray-100"
                    @click="selectedTypes = []"
                >
                    Auswahl zurücksetzen
                </button>
            </div>
        </div>
    </div>
</template>
