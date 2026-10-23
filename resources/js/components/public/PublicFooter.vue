<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import PageCard from '@/components/public/PageCard.vue';
import PublicContainer from '@/components/public/PublicContainer.vue';
import PublicMenu from '@/components/public/PublicMenu.vue';
import type { PublicMenuItem } from '@/components/public/PublicMenu.vue';
import RecentPublications from '@/components/public/RecentPublications.vue';
import { usePageColor } from '@/composables/usePageColor';
import { cookieVereinbarung, datenschutz, impressum, kontakt } from '@/routes';

const { color } = usePageColor();
const page = usePage();
const quote = computed(
    () =>
        page.props.quote as {
            body: string;
            author_name: string | null;
            author_occupation: string | null;
            author_url: string | null;
        } | null,
);

const user = computed(
    () => (page.props.auth as { user: { name: string } | null }).user,
);

const quoteParts = computed(() =>
    (quote.value?.body ?? '').split('%s').map((part) => part.trim()),
);

const footerItems: PublicMenuItem[] = [
    { href: kontakt.url(), label: 'Kontakt', color: 'gray', breakpoint: null },
    {
        href: impressum.url(),
        label: 'Impressum',
        color: 'gray',
        breakpoint: null,
    },
    {
        href: datenschutz.url(),
        label: 'Datenschutzerklärung',
        color: 'gray',
        breakpoint: 'sm',
    },
    {
        href: cookieVereinbarung.url(),
        label: 'Cookie Vereinbarung',
        color: 'gray',
        breakpoint: 'sm',
    },
];
</script>

<template>
    <PublicContainer>
        <PageCard even>
            <RecentPublications />
        </PageCard>

        <PageCard even nopadding>
            <PublicMenu
                :items="footerItems"
                padding-class="lg:px-6 md:px-8 px-3"
            />
        </PageCard>

        <PageCard v-if="quote" even pattern>
            <div class="hidden lg:block lg:shrink-0">
                <img
                    class="h-64 w-64 rounded-full xl:h-60 xl:w-60"
                    src="/images/sybille-seuffer.jpg"
                    alt="Sybille Seuffer"
                />
            </div>

            <div class="relative w-full lg:ml-16">
                <svg
                    class="absolute top-14 left-0 z-0 h-36 w-36 -translate-x-8 -translate-y-24 opacity-20"
                    :class="`text-${color}-600`"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 144 144"
                >
                    <path
                        d="M41.485 15C17.753 31.753 1 59.208 1 89.455c0 24.664 14.891 39.09 32.109 39.09 16.287 0 28.386-13.03 28.386-28.387 0-15.356-10.703-26.524-24.663-26.524-2.792 0-6.515.465-7.446.93 2.327-15.821 17.218-34.435 32.11-43.742L41.485 15zm80.04 0c-23.268 16.753-40.02 44.208-40.02 74.455 0 24.664 14.891 39.09 32.109 39.09 15.822 0 28.386-13.03 28.386-28.387 0-15.356-11.168-26.524-25.129-26.524-2.792 0-6.049.465-6.98.93 2.327-15.821 16.753-34.435 31.644-43.742L121.525 15z"
                        stroke-width="2"
                    />
                </svg>

                <blockquote>
                    <div class="relative text-gray-600">
                        <div class="flex grow" style="min-height: 150px">
                            <div class="self-center">
                                <div
                                    v-for="(part, index) in quoteParts"
                                    :key="index"
                                    :class="{
                                        'mb-1 block text-xl font-semibold md:text-3xl':
                                            index === 0,
                                    }"
                                    class="text-lg md:text-2xl md:leading-9"
                                    style="text-shadow: white 1px 1px 10px"
                                >
                                    {{ part }}
                                </div>
                                <div
                                    v-if="quote.author_name"
                                    class="mt-3 text-xs text-gray-500 italic"
                                >
                                    —
                                    <span class="font-semibold">{{
                                        quote.author_name
                                    }}</span
                                    ><span v-if="quote.author_occupation"
                                        >, {{ quote.author_occupation }}</span
                                    >
                                    <span
                                        v-if="quote.author_url"
                                        class="relative inline-block"
                                    >
                                        (<a
                                            :href="quote.author_url"
                                            target="_blank"
                                            class="underline hover:text-gray-500"
                                            >über diesen Autor</a
                                        >)
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="py-4">
                        <hr class="border-gray-300 opacity-75" />
                    </div>

                    <footer class="mt-2">
                        <div class="flex">
                            <div class="shrink-0 lg:hidden">
                                <img
                                    class="h-16 w-16 rounded-full"
                                    src="/images/sybille-seuffer.jpg"
                                    alt="Sybille Seuffer"
                                />
                            </div>
                            <div class="ml-6 lg:ml-0">
                                <div
                                    class="text-xl leading-6 font-medium text-gray-600"
                                >
                                    Sybille Seuffer
                                </div>
                                <div
                                    class="mt-1 text-base leading-6 font-medium"
                                >
                                    <div :class="`text-${color}-600`">
                                        Familientherapeutin
                                    </div>
                                    <small
                                        class="block text-xs text-gray-500 italic"
                                        >Beratung Therapie Seminare</small
                                    >
                                </div>
                            </div>
                        </div>
                    </footer>
                </blockquote>
            </div>
        </PageCard>
    </PublicContainer>

    <div class="h-14 md:h-9 lg:h-8"></div>

    <div class="absolute right-0 bottom-0 left-0 z-10 bg-white/85">
        <PublicContainer>
            <div class="relative px-1 py-1 text-xs text-gray-500 md:text-right">
                <div
                    class="flex flex-col items-center justify-center pb-2 lg:flex-row lg:justify-between lg:py-1"
                >
                    <div class="flex items-center pb-2">
                        <a
                            href="/backend"
                            target="_blank"
                            class="inline-block px-1 hover:underline"
                            :class="[
                                `text-${color}-600`,
                                `hover:text-${color}-500`,
                            ]"
                        >
                            <span
                                class="relative mr-1 inline-block"
                                style="height: 17px; width: 17px"
                            >
                                <span class="block" style="margin-top: 3px">
                                    <svg
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z"
                                        />
                                    </svg>
                                </span> </span
                            ><template v-if="user"
                                >Backend (<span class="font-medium">{{
                                    user.name
                                }}</span
                                >)</template
                            ><template v-else>Login</template>
                        </a>
                    </div>
                    <div>
                        Made with
                        <span class="text-red-500" style="font-size: 0.65rem"
                            >❤</span
                        >&nbsp; and
                        <a
                            href="http://laravel.com"
                            target="_blank"
                            class="hover:underline"
                            :class="[
                                `text-${color}-600`,
                                `hover:text-${color}-500`,
                            ]"
                            >Laravel</a
                        >
                    </div>
                </div>
            </div>
        </PublicContainer>
    </div>
</template>
