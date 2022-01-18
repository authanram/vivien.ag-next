<template>
    <div>
        <transition name="fade">
            <div v-if="!loading && hasTypes">
                <div class="leading-none mb-4 pl-2">
                    <span
                        :class="`text-${accent}-600`"
                        class="font-semibold text-xl xl:text-2xl"
                    >
                        {{ items.length }} {{ items.length === 1 ? 'Seminar' : 'Seminare' }}
                    </span>
                    <span class="text-sm">
                        in {{ length }} {{ length === 1 ? 'Kategorie' : 'Kategorien' }}
                    </span>
                </div>
                <template v-for="(type, index) in types">
                    <button
                        :key="`button-${index}`"
                        :class="[`hover:bg-${type.color.color}-100`]"
                        class="flex focus:outline-none items-center leading-none p-2 rounded-lg text-left w-full"
                        @click="emit(type.id)"
                    >
                        <ui-icon
                            :class="`text-${type.color.color}-600`"
                            :icon="icon(type)"
                            class="mr-5"
                        />
                        <span class="truncate">
                            <span
                                :class="`text-${type.color.color}-600`"
                                :title="`${type.getCountEvents} Seminare`"
                                class="font-medium inline-block"
                            >
                                {{ type.getName }}
                            </span>
                            <span class="text-xs">
                                ({{ type.getCountEvents }})
                            </span>
                            <span
                                v-if="type.getNameCaption"
                                class="block mt-1 text-xs"
                            >
                                {{ type.getNameCaption }}
                            </span>
                        </span>
                    </button>
                </template>
            </div>
        </transition>
        <div
            v-if="loading || !hasTypes"
            class="-mb-3 ml-2"
        >
            <ui-placeholder-heading
                class="mb-4"
                random
            />
            <ui-placeholder
                v-for="x in 4"
                :key="x"
                class="mb-5"
                random
            />
        </div>
    </div>
</template>

<script lang="ts">
    import { Event, EventType } from '@/state/models'
    import DefaultPropertiesMixin from '@/components/ui-events/DefaultPropertiesMixin'
    import RouteMixin from '@/components/mixins/RouteMixin'
    import UiEventFiltersReset from "@/components/ui-events/filters/UiEventFiltersReset.vue";

    export default {
        components: {UiEventFiltersReset},
        mixins: [DefaultPropertiesMixin, RouteMixin],

        props: {
            types: {
                required: true,
                type: Array,
            },
        },

        computed: {
            events (): Event[] {
                return this.items
            },

            hasTypes (): boolean {
                return this.types.length
            },

            length (): number {
                return !this.routeHasQueryParameter('types')
                    ? this.types.length
                    : this.types
                        .filter((type: EventType) => this.routeHasQueryParameterValue('types', String(type.id)))
                        .length
            },
        },

        methods: {
            emit (typeId: number): void {
                this.$event.$emit('event.filters', { key: 'types', value: `${typeId}` })
            },

            icon (type: EventType): string {
                return this.routeHasQueryParameterValue('types', String(type.id))
                    ? 'checkedCircle'
                    : 'circle'
            },
        }
    }
</script>
