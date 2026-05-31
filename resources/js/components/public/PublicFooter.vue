<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import {
    cookieVereinbarung,
    datenschutz,
    impressum,
    kontakt,
} from '@/routes';

const page = usePage();
const quote = computed(() => page.props.quote as {
    body: string;
    author_name: string | null;
    author_occupation: string | null;
    author_url: string | null;
} | null);

function formatQuote(body: string): { before: string; after: string } {
    const parts = body.split('%s');
    return {
        before: parts[0]?.trim() ?? body,
        after: parts[1]?.trim() ?? '',
    };
}
</script>

<template>
    <footer>
        <!-- Footer-Navigation Card (exakt wie footer-menu im Original) -->
        <div class="lg:max-w-5xl xl:px-10 px-5 mx-auto xl:max-w-screen-xl">
            <div class="lg:pl-32 md:pl-40 xl:pl-36">
                <div class="md:pl-10">
                    <div class="bg-white/90 border border-gray-100 mb-5 md:mb-10 relative rounded-lg shadow-md w-full mx-auto">
                        <div class="p-3 md:p-5">
                            <nav class="flex flex-wrap items-center justify-center gap-x-8 gap-y-1 text-sm text-gray-500">
                                <Link :href="kontakt.url()" class="hover:text-gray-700 hover:underline">Kontakt</Link>
                                <Link :href="impressum.url()" class="hover:text-gray-700 hover:underline">Impressum</Link>
                                <Link :href="datenschutz.url()" class="hover:text-gray-700 hover:underline">Datenschutzerklärung</Link>
                                <Link :href="cookieVereinbarung.url()" class="hover:text-gray-700 hover:underline">Cookie Vereinbarung</Link>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quote Card (exakt wie partials/quote.blade.php im Original) -->
        <div v-if="quote" class="lg:max-w-5xl xl:px-10 px-5 mx-auto xl:max-w-screen-xl">
            <div class="lg:pl-32 md:pl-40 xl:pl-36">
                <div class="md:pl-10">
                    <div class="bg-white/90 border border-gray-100 mb-5 md:mb-10 overflow-hidden relative rounded-lg shadow-md w-full mx-auto p-5 md:p-10">
                        <div class="lg:flex lg:items-center relative">
                            <!-- Foto (nur auf lg+) -->
                            <div class="hidden lg:block lg:flex-shrink-0 lg:mr-10">
                                <div class="h-64 w-64 xl:h-60 xl:w-60 rounded-full bg-stone-200 flex items-center justify-center text-3xl font-bold text-stone-400 shadow-md overflow-hidden">
                                    SS
                                </div>
                            </div>

                            <!-- Zitat -->
                            <div class="relative">
                                <!-- Anführungszeichen im Hintergrund -->
                                <svg
                                    class="absolute top-14 left-0 transform -translate-x-8 -translate-y-24 h-36 w-36 opacity-20 pointer-events-none"
                                    style="color: var(--color-nav-accent)"
                                    fill="currentColor" viewBox="0 0 32 32"
                                >
                                    <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                                </svg>

                                <blockquote class="relative text-gray-600">
                                    <div class="text-lg leading-relaxed">
                                        <template v-if="quote.body.includes('%s')">
                                            <p class="inline">{{ formatQuote(quote.body).before }}</p>
                                            <span class="text-gray-400">&nbsp;</span>
                                            <p class="inline font-light italic">{{ formatQuote(quote.body).after }}</p>
                                        </template>
                                        <template v-else>
                                            <p>{{ quote.body }}</p>
                                        </template>
                                    </div>

                                    <footer class="mt-5">
                                        <div class="flex items-center">
                                            <!-- Kleines Foto (auf Mobile) -->
                                            <div class="lg:hidden flex-shrink-0">
                                                <div class="h-16 w-16 rounded-full bg-stone-200 flex items-center justify-center text-sm font-bold text-stone-400">SS</div>
                                            </div>
                                            <div class="ml-6 lg:ml-0">
                                                <div class="font-medium leading-6 text-gray-600 text-xl">Sybille Seuffer</div>
                                                <div class="mt-1 text-base">
                                                    <span style="color: var(--color-nav-accent)">Familientherapeutin</span>
                                                    <small class="italic block text-xs text-gray-500">Beratung Therapie Seminare</small>
                                                </div>
                                                <div v-if="quote.author_name && quote.author_name !== 'Sybille Seuffer'" class="mt-3 text-sm text-gray-400">
                                                    — <a v-if="quote.author_url" :href="quote.author_url" target="_blank" rel="noopener" class="hover:underline italic">{{ quote.author_name }}</a>
                                                    <span v-else class="italic">{{ quote.author_name }}</span>
                                                    <span v-if="quote.author_occupation">, {{ quote.author_occupation }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Made-with-Love (exakt wie made-with-love.blade.php) -->
        <div class="h-14 md:h-9 lg:h-8"></div>
        <div class="absolute bg-white/85 bottom-0 left-0 right-0 z-10">
            <div class="lg:max-w-5xl xl:px-10 px-5 mx-auto xl:max-w-screen-xl">
                <div class="lg:pl-32 md:pl-40 xl:pl-36">
                    <div class="md:pl-10">
                        <div class="flex flex-col items-center justify-center lg:flex-row lg:justify-between lg:py-1 pb-2 text-gray-500 text-xs">
                            <div class="flex items-center pb-2 lg:pb-0">
                                <a href="/backend" target="_blank" class="inline-block px-1 hover:underline" style="color: var(--color-nav-accent)">
                                    🔓 Backend
                                </a>
                            </div>
                            <div>
                                Made with <span class="text-red-500" style="font-size:.65rem">❤</span>&nbsp;and
                                <a href="http://laravel.com" target="_blank" class="hover:underline" style="color: var(--color-nav-accent)">Laravel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
