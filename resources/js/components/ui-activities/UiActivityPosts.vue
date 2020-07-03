<template>
    <div>
        <template v-if="subject">
            <span class="flex items-center mb-4">
                <span class="leading-5 text-sm">
                    <time :datetime="subject.published_at_readable">
                        Veröffentlicht am
                        <span class="font-normal">
                            {{ subject.published_at_readable }}
                        </span>
                    </time>
                    <span class="block text-xs text-gray-500">
                        {{ readTime(subject.body) }} Min. Lesedauer
                    </span>
                </span>
            </span>
            <div>
                <template v-for="(tag, index) in subject.tags">
                    <ui-tag
                        v-if="index <= 1"
                        :key="`tag-${index}`"
                        :color="tag.color.color"
                        :href="`/blog/?filter[tags]=${encodeURIComponent(tag.name.de)}`"
                        :text="tag.name.de"
                        class="mb-2"
                    />
                </template>
            </div>
            <ripple
                :class="`hover:text-${accent}-600`"
                class="mt-4 text-gray-600"
                nudge="5"
                dark
            >
                <a
                    :href="`/blog/${subject.slug}`"
                    class="block"
                >
                    <h3 class="font-semibold leading-tight text-xl">
                        {{ subject.title }}
                    </h3>
                    <p
                        class="leading-6 group mt-3"
                        v-html="truncate(subject.body)"
                    />
                </a>
            </ripple>
        </template>
        <slot v-else />
    </div>
</template>

<script lang="ts">
    import ActivityType from './ActivityType'
    import { Post } from '@/state/models'

    export default {
        mixins: [ActivityType],

        computed: {
            subject (): Post {
                return this.actionable
            },
        },
    }
</script>
