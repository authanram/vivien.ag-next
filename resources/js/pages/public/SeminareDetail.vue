<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import EventCard from '@/components/public/EventCard.vue';
import SeminarRegistrationDialog from '@/components/public/SeminarRegistrationDialog.vue';
import { usePageMeta } from '@/composables/usePageMeta';
import type { EventResource } from '@/types/public';

defineOptions({ inheritAttrs: false });

const props = defineProps<{
    event: { data: EventResource };
}>();

const event = computed(() => props.event.data);

const { setMeta } = usePageMeta();
setMeta(event.value.event_type.name);

const isRegistrationOpen = ref(false);
</script>

<template>
    <Head :title="event.event_type.name" />

    <div class="mb-5 w-full md:mb-10 lg:w-1/2">
        <EventCard :event="event" @register="isRegistrationOpen = true" />

        <SeminarRegistrationDialog
            v-model:open="isRegistrationOpen"
            :event="event"
        />
    </div>
</template>
