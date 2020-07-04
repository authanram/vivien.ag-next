<template>
    <div class="flex flex-grow">
        <div
            v-if="!loading && quote"
            class="self-center"
        >
            <div
                v-for="(html, index) in body"
                :key="index"
                :class="{ 'text-xl md:text-3xl font-semibold block mb-1': index === 0 }"
                class="text-lg md:text-2xl md:leading-9"
                style="text-shadow: white 1px 1px 10px"
                v-html="html"
            ></div>
            <div class="italic mt-3 text-gray-500 text-xs">
                — <span class="font-semibold">{{ authorName }}</span><span v-if="author.occupation">, {{ author.occupation }}</span>
                <span
                    class="inline-block relative"
                    v-if="author.url"
                >
                    <ui-tooltip>
                        <span
                            class="not-italic"
                            slot="tooltip"
                        >{{ author.url }}</span>
                        (<a :href="author.url" target="_blank" class="hover:text-gray-500 underline">über diesen Autor</a>)
                    </ui-tooltip>
                </span>
            </div>
        </div>
        <template v-else>
            <div class="self-center w-full">
                <ui-placeholder
                    heading
                    random
                />
                <ui-placeholder
                    class="mt-6"
                    random
                />
            </div>
        </template>
    </div>
</template>

<script lang="ts">
    import {Author, Quote} from '@/state/models'
    import {sleep} from '@/Helpers'

    export default {
        components: {
            'ui-placeholder': () => import('@/components/ui-placeholder/UiPlaceholder.vue'),
        },

        computed: {
            body (): string[] {
                return this.quote.body.split('%s')
            },

            author (): Author {
                return this.quote.author
            },

            authorName (): string {
                return this.quote.author.id===1 ? 'unbekannt':this.quote.author.name
            },

            quote (): Quote {
                return Quote.query().with('author').first() as Quote
            },
        },

        data: function (): object {
            return {
                loading: true,
            }
        },

        mounted (): void {
            sleep(450).then(() => this.loading = false)
        },
    }
</script>
