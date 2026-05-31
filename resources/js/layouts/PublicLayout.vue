<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import ImageStrip from '@/components/public/ImageStrip.vue';
import PublicFooter from '@/components/public/PublicFooter.vue';
import PublicNav from '@/components/public/PublicNav.vue';
import WatercolorBackground from '@/components/public/WatercolorBackground.vue';
import { usePageColor } from '@/composables/usePageColor';
import { usePageMeta } from '@/composables/usePageMeta';
import type { ImageStripItem } from '@/types/public';

const { colorClass } = usePageColor();
const { title, caption } = usePageMeta();

const page = usePage();
const imageStrip = computed(() => (page.props.imageStrip as ImageStripItem[]) ?? []);
const flash = computed(() => page.props.flash as { success: string | null; error: string | null } | null);
</script>

<template>
    <!-- Exakt wie Original: div.page > div.min-h-full.relative.z-0 -->
    <div :class="colorClass" class="public-layout relative min-h-screen bg-white">
        <Head>
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet" />
        </Head>

        <!-- Wasserfarben-Hintergrund (absolut, z-0) -->
        <WatercolorBackground />

        <!--
            Bilder-Seitenleiste: exakt wie Original
            - absolute, positioniert mt-16 (64px = Navhöhe) ml-5 (20px) von der Seite
            - left = calc(50% - 512px + 20px + 160px + 20px) = calc(50% - 312px)
              (= Start der max-w-5xl Box + px-5 + pl-40 + ml-5 = statische Position im Flow)
        -->
        <div
            class="hidden md:block"
            style="position: absolute; top: 64px; left: calc(50% - 312px); z-index: 30; pointer-events: none;"
        >
            <ImageStrip :images="imageStrip" />
        </div>

        <!-- Nav shadow placeholder (sticky trick aus Original) -->
        <div class="h-16 shadow-lg sticky top-0 w-full z-10"></div>

        <!-- Sticky Nav (-mt-16, exakt wie Original) -->
        <div class="-mt-16 sticky top-0 z-40 w-full border-b border-gray-100 bg-white">
            <PublicNav />
        </div>

        <!-- Page title bar -->
        <div v-if="title" class="bg-white/95 pb-1 pt-2 z-20 relative mb-5 md:mb-10 md:border-b-2 md:border-gray-100 md:pb-1">
            <div class="lg:max-w-5xl xl:px-10 px-5 mx-auto xl:max-w-screen-xl">
                <div class="lg:pl-32 md:pl-40 xl:pl-36">
                    <div class="md:pl-10">
                        <h1
                            class="font-semibold leading-tight pt-1 text-2xl tracking-tight"
                            style="color: var(--color-nav-accent)"
                        >
                            {{ title }}
                        </h1>
                        <div v-if="caption" class="mt-1 text-sm text-gray-500">{{ caption }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flash success -->
        <div v-if="flash?.success" class="relative z-20 lg:max-w-5xl xl:px-10 px-5 mx-auto xl:max-w-screen-xl mb-5">
            <div class="lg:pl-32 md:pl-40 xl:pl-36">
                <div class="md:pl-10">
                    <div class="rounded-lg border border-green-200 bg-green-50 p-4 text-sm font-medium text-green-800">
                        {{ flash.success }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Hauptinhalt (exakt wie x-container aus Original) -->
        <div class="lg:max-w-5xl xl:px-10 px-5 mx-auto xl:max-w-screen-xl">
            <div class="lg:pl-32 md:pl-40 xl:pl-36">
                <slot />
            </div>
        </div>

        <!-- Footer -->
        <PublicFooter />
    </div>
</template>
