<template>
    <div class="gap-14 grid lg:col-gap-5 lg:grid-cols-3 lg:row-gap-12">
        <template v-if="activities.length">
            <template v-for="(activity, index) in activities">
                <component
                    :key="`publication-${index}`"
                    :accent="accent"
                    :actionable="resolveEntity(activity)"
                    :is="`UiActivity${activity.entity}`"
                />
            </template>
        </template>
        <template v-else>
            <ui-activity-placeholder />
            <ui-activity-placeholder />
            <ui-activity-placeholder />
        </template>
    </div>
</template>

<script lang="ts">
    import {Activity, Event, Post} from '@/state/models'

    export default {
        props: {
            accent: {
                default: 'gray',
                type: String,
            },
        },

        computed: {
            activities (): Activity[] {
                return Activity
                    .query()
                    .get()
            },
        },

        methods: {
            resolveEntity (activity: Activity): Event | Post {
                return activity.entity === 'Events'
                    ? Event.query()
                           .whereIdIn([activity.id])
                           .withAllRecursive()
                           .first() as Event
                    : Post.query()
                          .whereIdIn([activity.id])
                          .withAllRecursive()
                          .first() as Post
            },
        },
    }
</script>
