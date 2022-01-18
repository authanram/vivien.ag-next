<template>
    <div>
        <hr class="border-t-2 my-7" v-if="items.length" />
        <template v-for="(tag, index) in items">
            <ui-tag
                :key="`tag-${index}`"
                :close="routeHasQueryParameterValue('tags', tag.name.de)"
                :color="tag.color.color"
                :text="tag.name.de"
                class="mb-3"
                @clicked="() => emit(tag)"
            />
        </template>
    </div>
</template>

<script lang="ts">
    import { Tag } from '@/state/models'
    import RouteMixin from '@/components/mixins/RouteMixin'

    export default {
        mixins: [RouteMixin],

        props: {
            dense: {
                default: false,
                type: Boolean,
            },
            items: {
                default: null,
                type: Array,
            },
        },

        methods: {
            emit (tag: Tag): void {
                this.$event.$emit('event.filters', { key: 'tags', value: tag.name.de })
            },
        }
    }
</script>
