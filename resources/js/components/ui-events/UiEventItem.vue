<template>
    <div class="bg-white mx-auto relative rounded-lg self-stretch shadow-md w-full">
        <div
            :class="`bg-${color}-100`"
            class="bg-opacity-25 p-8 overflow-hidden rounded-lg text-gray-800"
        >
            <template v-if="ready">
                <ui-event-item-property-summary
                    :color="color"
                    :item="event"
                    class="pb-6"
                />
                <ui-event-item-property-time
                    :class="event.date_duration_days > 0 ? 'pb-2' : 'pb-6'"
                    :color="color"
                    :item="event"
                    icon
                />
                <ui-event-item-property-time
                    v-if="event.date_duration_days > 0"
                    :color="color"
                    :item="event"
                    class="pb-6"
                    to
                />
                <ui-event-item-property-location
                    :color="color"
                    :item="event"
                    class="pb-6"
                />
                <div :class="`leading-tight pb-6 text-lg text-${color}-600`">
                    {{ event.description }}
                </div>
                <ui-event-item-property-attendees
                    :item="event"
                    class="pb-6"
                />
                <ui-event-item-property-catering
                    v-if="item.hasCatering"
                    :item="event"
                    class="pb-6"
                />
                <ui-event-item-property-price
                    :item="event"
                    class="pb-6"
                />
                <div class="border-gray-200 border-t-2 pt-8"></div>
                <ui-event-item-property-lead
                    :item="event"
                    class="pb-6"
                />
                <div class="border-gray-200 border-t-2 pt-8"></div>
                <ui-event-item-tags
                    :class="{ 'mb-12': hasSeats(event) }"
                    :items="event.tags"
                    class="pb-2"
                />
                <button
                    v-if="hasSeats(event)"
                    :class="`active:bg-${color}-500 bg-${color}-500 hover:bg-${color}-600 text-white`"
                    class="absolute active:outline-none bottom-0 flex focus:outline-none font-semibold h-16 items-center justify-center left-0 right-0 rounded-b-lg text-2xl w-full"
                    @click="form()"
                >
                    <ripple contain />
                    {{ 'Teilnehmen' }}
                </button>
                <div
                    v-else
                    :class="`bg-${color}-500 text-white`"
                    class="-mb-9 -mx-8 focus:outline-none mt-3 px-8 py-7"
                >
                    <div class="font-medium mb-2">
                        Online-Anmeldung abgeschlossen
                    </div>
                    <div class="italic text-xs">
                        <span class="font-medium">
                            Dies kann verschiedene Gründe haben:
                        </span>
                        <ul class="list-disc ml-6 my-2">
                            <li class="pb-1">möglicherweise wurde die max. Teilnehmerzahl erreicht</li>
                            <li class="pb-1">der Voranmeldezeitraum wurde bereits überschritten</li>
                            <li class="pb-1">oder die Online-Anmeldung für dieses Seminar wurde deaktiviert</li>
                        </ul>
                        <p>
                            Möchtest du dennoch an diesem Seminar teilnehmen, kontaktiere mich bitte per <a href="#" class="font-medium hover:underline">E-Mail</a>. Herzlichen Dank!
                        </p>
                    </div>
                </div>
            </template>
            <template v-else>
                <ui-event-placeholder />
            </template>
        </div>
        <ui-attendee-form
            v-if="hasAttendeeForm"
            :event="item"
            @canceled="() => hasAttendeeForm = false"
        />
    </div>
</template>

<script lang="ts">
    import { Event } from '@/state/models'

    export default {
        props: {
            item: {
                required: true,
                type: Object,
            },
        },

        computed: {
            ready (): boolean {
                return this.event
                    && this.event.event_type
                    && this.event.event_type.color
            },

            event (): Event {
                return this.item
            },

            color (): string {
                return this.event.event_type
                    && this.event.event_type.color.color || ''
            },
        },

        data (): object {
            return {
                hasAttendeeForm: false,
            }
        },

        methods: {
            form (): void {
                this.hasAttendeeForm = true
            },

            hasSeats (event: Event): boolean {
                return event.maximum_attendees > event.reserved_seats
            }
        },
    }
</script>
