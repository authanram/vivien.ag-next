<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useCookieConsent } from '@/composables/useCookieConsent';
import { usePageColor } from '@/composables/usePageColor';
import { cookieVereinbarung } from '@/routes';

const { color } = usePageColor();
const { config, write } = useCookieConsent();
const accepted = ref(false);

function accept(): void {
    write({ all: true });
    accepted.value = true;
}
</script>

<template>
    <div v-if="!config.consented && !accepted" class="-mb-px">
        <div class="relative z-10 text-white" :class="`bg-${color}-500`">
            <div
                class="mx-auto px-5 py-3 md:pl-5 lg:max-w-5xl xl:max-w-screen-xl xl:px-10"
            >
                <div
                    class="flex flex-col leading-tight md:flex-row md:items-center"
                >
                    <div class="md:mr-5">
                        <span
                            class="text-sm leading-5 font-medium md:block md:text-base"
                        >
                            Diese Seite verwendet Cookies um das Nutzererlebnis
                            zu steigern.
                        </span>
                        {{ ' ' }}
                        <span class="text-xs">
                            Um deine persönlichen Cookie-Einstellungen zu
                            festzulegen oder um zu erfahren welchen Zweck
                            Cookies erfüllen und welche Cookies ich für den
                            Betrieb von vivien.ag verwende,
                            <Link
                                :href="cookieVereinbarung.url()"
                                class="font-medium hover:underline"
                                >klicke bitte hier</Link
                            >.
                        </span>
                    </div>

                    <button
                        type="button"
                        class="mt-2 h-8 rounded-sm bg-white px-2 text-sm font-light whitespace-nowrap hover:text-white md:mt-0 md:mr-1"
                        :class="[`text-${color}-600`, `hover:bg-${color}-600`]"
                        @click="accept"
                    >
                        Akzeptieren
                    </button>

                    <Link
                        :href="cookieVereinbarung.url()"
                        class="mt-2 h-8 rounded-sm px-2 text-xs font-light whitespace-nowrap hover:underline md:mt-0 md:mr-1 md:h-auto"
                    >
                        Einstellungen
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
