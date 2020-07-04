<template>
    <div>
        <transition name="fade">
            <div
                v-if="!loading && tags"
                class="-mb-1"
            >
                <div class="leading-none p-6 pt-8">
                    <span :class="`font-semibold text-${accent}-600 text-xl xl:text-2xl`">
                        Kriterien
                    </span>
                    <span class="text-sm">
                        ({{ tags.length }} Tags)
                    </span>
                </div>
                <ui-event-item-tags
                    class="px-6"
                    :items="tags"
                    dense
                />
            </div>
        </transition>
        <div
            v-if="loading || !tags"
            class="-mb-2 p-6 pb-0 pt-8"
        >
            <ui-placeholder-tags :length="12" />
        </div>
    </div>
</template>

<script lang="ts">
    import { Tag } from '@/state/models'
    import DefaultPropertiesMixin from '@/components/ui-events/DefaultPropertiesMixin'
    import RouteMixin from '@/components/mixins/RouteMixin'

    export default {
        mixins: [DefaultPropertiesMixin, RouteMixin],

        components: {
            'ui-event-item-tags': () => import('@/components/ui-events/UiEventItemTags.vue')
        },

        computed: {
            tags (): Tag[] {
                return this.items
            },
        },
    }
</script>
