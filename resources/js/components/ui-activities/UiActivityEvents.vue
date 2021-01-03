<template>
    <div>
        <template v-if="subject">
            <span class="flex items-center mb-4">
                <span class="leading-5 text-sm">
                    <time :datetime="subject.created_at_readable">
                        Veröffentlicht am
                        <span class="font-medium">
                            {{ subject.created_at_readable }}
                        </span>
                    </time>
                    <span class="block text-xs text-gray-500"> 1 Min. Lesedauer </span>
                </span>
            </span>
            <template v-for="(tag, index) in subject.tags">
                <ui-tag
                    :key="`tag-${index}`"
                    :color="tag.color.color"
                    :href="`/seminare/#?tags=${encodeURIComponent(tag.name.de)}`"
                    :text="tag.name.de"
                    class="mb-2"
                />
            </template>
            <ripple class="mt-4 text-gray-800" nudge="5" dark>
                <a
                    :class="`hover:text-${accent}-600`"
                    href="/seminare"
                    class="block leading-6 text-gray-600"
                >
                    <span class="font-semibold leading-tight text-xl" v-html="name" />
                    <p class="mt-2 text-base" v-html="truncate(subject.description)" />
                    <p class="mb-1 mt-2">
                        <span class="font-normal">Datum</span>
                        {{ dateFrom }}, {{ `${subject.from.hours}:${subject.from.minutes}` }} -
                        <span v-if="dateFrom !== dateTo" class="font-normal">{{ dateTo }},</span>
                        {{ `${subject.to.hours}:${subject.to.minutes}` }}
                    </p>
                    <p class="mb-1">
                        <span class="font-normal">Ort</span> {{ subject.event_location.name }}
                    </p>
                    <p class="mb-1">
                        <span class="font-normal">Teilnehmer</span> {{ subject.maximum_attendees }}
                    </p>
                    <p class="mb-1">
                        <span class="font-normal">Preis</span>
                        <span
                            v-html="
                                subject.price === 0
                                    ? '<i class=\'text-gray-500\'>kostenlos</i>'
                                    : `${subject.price} &euro;`
                            "
                        />
                    </p>
                </a>
            </ripple>
        </template>
    </div>
</template>

<script lang="ts">
import ActivityType from './ActivityType'
import { Event } from '@/state/models'

export default {
    mixins: [ActivityType],

    computed: {
        subject(): Event {
            return this.actionable
        },

        dateFrom(): string {
            return `${this.subject.from.day}.${this.subject.from.month}.${this.subject.from.year}`
        },

        dateTo(): string {
            return `${this.subject.to.day}.${this.subject.to.month}.${this.subject.to.year}`
        },

        name(): string {
            return this.subject.event_type.name.replace(/(\S+)-(\S+)/g, '$1&#8288;-&#8288;$2')
        },
    },
}
</script>
