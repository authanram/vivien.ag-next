<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import CookieConsentBanner from '@/components/public/CookieConsentBanner.vue';
import ImageStrip from '@/components/public/ImageStrip.vue';
import PublicContainer from '@/components/public/PublicContainer.vue';
import PublicFooter from '@/components/public/PublicFooter.vue';
import PublicNav from '@/components/public/PublicNav.vue';
import WatercolorBackground from '@/components/public/WatercolorBackground.vue';
import { usePageColor } from '@/composables/usePageColor';
import type { ImageStripItem } from '@/types/public';

const { color } = usePageColor();
withDefaults(defineProps<{ title?: string; caption?: string }>(), {
    title: '',
    caption: '',
});

const page = usePage();
const imageStrip = computed(
    () => (page.props.imageStrip as ImageStripItem[]) ?? [],
);
const flash = computed(
    () =>
        page.props.flash as {
            success: string | null;
            error: string | null;
        } | null,
);
</script>

<template>
    <div class="public-layout relative min-h-screen overflow-x-clip bg-white">
        <Head>
            <link rel="preconnect" href="https://fonts.gstatic.com" />
            <link
                href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;900&display=swap"
                rel="stylesheet"
            />
        </Head>

        <CookieConsentBanner />

        <div class="relative z-0 min-h-full">
            <WatercolorBackground />

            <div class="sticky top-0 z-10 h-16 w-full shadow-lg"></div>

            <div
                class="sticky top-0 z-40 mx-auto -mt-16 w-full self-stretch border border-gray-100 bg-white md:mb-0"
            >
                <div class="relative">
                    <PublicNav />
                </div>
            </div>

            <div
                v-if="title"
                class="relative z-20 mx-auto mb-5 w-full self-stretch bg-white/95 pt-2 md:mb-10 md:border-b-2 md:border-gray-100 md:pb-1"
            >
                <div class="relative">
                    <div
                        class="mx-auto px-5 lg:max-w-5xl xl:max-w-screen-xl xl:px-10"
                        :class="caption ? 'pb-2' : 'pb-1'"
                    >
                        <div class="md:pl-40 lg:pl-32 xl:pl-36">
                            <div class="md:pl-10">
                                <h1
                                    class="pt-1 text-2xl leading-tight font-semibold tracking-tight"
                                    :class="`text-${color}-600`"
                                >
                                    {{ title }}
                                </h1>
                                <div
                                    v-if="caption"
                                    class="mt-1 text-sm text-gray-500"
                                    v-html="caption"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <PublicContainer>
                <div class="hidden md:block">
                    <ImageStrip :images="imageStrip" />
                </div>

                <div class="relative">
                    <div
                        v-if="flash?.success"
                        class="mb-5 rounded-lg border border-green-200 bg-green-50 p-4 text-sm font-medium text-green-800 md:mb-10"
                    >
                        {{ flash.success }}
                    </div>

                    <slot />
                </div>
            </PublicContainer>

            <PublicFooter />
        </div>
    </div>
</template>
