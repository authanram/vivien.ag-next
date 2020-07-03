<template>
    <a
        :href="path"
        class="relative"
    >
        <ripple contain />
        <span>
            {{ item.label }}
        </span>
    </a>
</template>

<script lang="ts">
    import { MenuItem } from '@/state/models'

    export default {
        props: {
            menuItem: {
                required: true,
                type: Object,
            },
        },

        computed: {
            item (): MenuItem {
                return this.menuItem
            },

            path (): string {
                const path = this.item.route.path.split('{')[0]
                    .replace(/\/(?=[^\/]*$)/, '')

                return `/${path}`
            },
        },
    }
</script>
