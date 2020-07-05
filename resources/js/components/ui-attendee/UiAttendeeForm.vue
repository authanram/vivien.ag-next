<template>
    <div>
        <ui-modal
            v-if="!dismiss"
            :accent="accent"
            :callback-cancel="() => $emit('canceled')"
            :callback-submit="submit"
            :processing="processing"
            label-submit="Anmelden"
            label-cancel="Verwerfen"
        >
            <div v-if="event && event.event_type">
                <div>
                    <h3
                        :class="`text-${accent}-600`"
                        class="font-medium leading-6 text-gray-90 text-xl0"
                    >
                        {{ event.event_type.name }}
                    </h3>
                    <p class="leading-5 max-w-2xl mt-1 text-gray-500 text-sm">
                        {{ event.description }}
                    </p>
                    <p class="font-medium leading-5 max-w-2xl mt-1 text-gray-500 text-sm">
                        {{ event.date_from_object.day }}. {{ event.date_from_object.month_full }} {{ event.date_from_object.year }},
                        {{ event.date_from_object.hours }}:{{ event.date_from_object.minutes }}
                    </p>
                </div>
                <form-group
                    :errors="errors"
                    label="Anrede"
                    border
                >
                    <form-field-radio
                        :accent="accent"
                        :labels="['Frau', 'Herr']"
                        :values="[0, 1]"
                        name="salutation"
                        v-bind:value="model.salutation"
                        v-on:input="model.salutation = $event"
                    />
                </form-group>
                <form-group
                    :errors="errors"
                    class="mt-4"
                    label="Name"
                    name="name"
                >
                    <form-field-input
                        :accent="accent"
                        :errors="errors"
                        class="mr-2"
                        name="firstname"
                        placeholder="Vorname"
                        focus
                        v-bind:value="model.firstname"
                        v-on:input="model.firstname = $event"
                    />
                    <form-field-input
                        :accent="accent"
                        :errors="errors"
                        class="ml-2"
                        placeholder="Nachname"
                        name="surname"
                        v-bind:value="model.surname"
                        v-on:input="model.surname = $event"
                    />
                </form-group>
                <form-group
                    :errors="errors"
                    label="Telefon"
                    name="phone"
                >
                    <form-field-input
                        :accent="accent"
                        name="phone"
                        v-bind:value="model.phone"
                        v-on:input="model.phone = $event"
                    />
                </form-group>
                <form-group
                    :errors="errors"
                    label="E-Mailadresse"
                    name="email"
                >
                    <form-field-input
                        :accent="accent"
                        name="email"
                        type="email"
                        v-bind:value="model.email"
                        v-on:input="model.email = $event"
                    />
                </form-group>
                <form-group
                    :errors="errors"
                    label="Teilnehmer"
                    name="attendees"
                >
                    <form-field-select
                        :accent="accent"
                        :values="maximumAttendees"
                        class="mr-3"
                        name="attendees"
                        v-bind:value="model.attendance"
                        v-on:input="model.attendance = $event"
                    /> {{ price * model.attendance }} &euro;
                    <span
                        v-if="price * model.attendance !== event.price"
                        class="inline-block italic ml-1 text-gray-500 text-xs"
                    >
                        gesamt
                    </span>
                </form-group>
                <form-group
                    label="Nachricht"
                    name="message"
                >
                    <div
                        slot="help"
                        class="leading-tight"
                    >
                        Solltest du mehrere Personen zu einem Seminar anmelden, sei doch bitte so nett und hinerlasse
                        mir Vor- und Nachnamen dieser Personen.
                    </div>
                    <form-field-textarea
                        :accent="accent"
                        :errors="errors"
                        name="message"
                        v-bind:value="model.message"
                        v-on:input="model.message = $event"
                    />
                </form-group>
            </div>
        </ui-modal>
        <template v-else>
            <ui-modal-dismiss
                headline="Du bist dabei! 🎉"
                action-confirm="Zurück zu den Seminaren"
                @confirmed="$emit('canceled')"
                success
            >
                <template slot="caption">
                    Damit du unsere gemeinsamen Termine im<br>
                    Blick hast, habe ich dir soeben eine E-Mail mit<br>
                    allen notwenidgen Details zukommen lassen.<br>
                    <span class="font-medium">Ich freue mich auf dich!</span>
                </template>
            </ui-modal-dismiss>
        </template>
    </div>
</template>

<script lang="ts">
    export default {
        components: {
            'form-field-input': () => import('@/components/forms/FormFieldInput.vue'),
            'form-field-radio': () => import('@/components/forms/FormFieldRadio.vue'),
            'form-field-select': () => import('@/components/forms/FormFieldSelect.vue'),
            'form-field-textarea': () => import('@/components/forms/FormFieldTextarea.vue'),
            'form-group': () => import('@/components/forms/FormGroup.vue'),
            'ui-attendee-form': () => import('@/components/ui-attendee/UiAttendeeForm.vue'),
        },

        props: {
            event: {required: true, type: Object},
        },

        computed: {
            accent (): string {
                return this.event.event_type.color.color
            },

            maximumAttendees (): number[] {
                const max = this.event.maximum_attendees - this.event.reserved_seats
                return Array.from(Array(max || 1), (_, i) => i + 1)
            },
        },

        data (): object {
            return {
                dismiss: false,
                errors: {},
                price: this.event.price,
                processing: false,
                //
                model: {
                    salutation: 0,
                    firstname: '',
                    surname: '',
                    phone: '',
                    email: '',
                    attendance: 1,
                    message: '',
                }
            }
        },

        methods: {
            submit (): void {
                this.processing = true

                this.$axios
                    .post(`${this.$initial.routeAttendeeCreate}/${this.event.id}`, this.model)
                    .then(response => {
                        this.dismiss = true
                        this.processing = false
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors
                        this.processing = false
                    })
            },
        },

        mounted (): void {
            this.$event.$emit('overlay.create')
        },

        beforeDestroy (): void {
            this.$event.$emit('overlay.destroy')
        }
    }
</script>
