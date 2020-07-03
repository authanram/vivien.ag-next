<template>
    <div class="leading-none">
        Date Filter ... {{ loading }}
    </div>
</template>

<script lang="ts">
    import DefaultPropertiesMixin from '@/components/ui-events/DefaultPropertiesMixin'
    import RouteMixin from '@/components/mixins/RouteMixin'

    export default {
        mixins: [DefaultPropertiesMixin, RouteMixin],

        computed: {
            dates (): string[] {
                return this.items
            },
        },
    }
</script>
