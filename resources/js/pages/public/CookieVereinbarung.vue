<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';
import CookieSettings from '@/components/public/CookieSettings.vue';
import PageCard from '@/components/public/PageCard.vue';
import { usePageColor } from '@/composables/usePageColor';
import { usePageMeta } from '@/composables/usePageMeta';
import type { CookieConsentCookieResource } from '@/types/public';

defineOptions({ inheritAttrs: false });

withDefaults(
    defineProps<{ cookies?: { data: CookieConsentCookieResource[] } }>(),
    { cookies: () => ({ data: [] }) },
);

const { setMeta } = usePageMeta();
setMeta(
    'Cookie Vereinbarung',
    '<span class="font-medium">Die Einhaltung einer jeden Privatsphäre ist mir sehr wichtig.</span> Ebenso wichtig ist es mir, dass du wenigstens einigermaßen zum Thema "Cookies" aufgeklärt wurdest, wenn du meine Webseite besuchst.',
);

const { color } = usePageColor();

const headingClass = computed(
    () =>
        `pb-5 text-xl leading-tight font-medium tracking-tight text-${color.value}-600`,
);
</script>

<template>
    <Head title="Cookie Vereinbarung" />

    <div class="lg:flex">
        <div class="w-full lg:flex lg:self-stretch">
            <div class="w-full lg:mr-5 lg:w-1/2">
                <PageCard>
                    <h3 :class="headingClass">
                        Worum geht es bei dem Begriff "Cookies"?
                    </h3>

                    <p class="mb-5">
                        Bald auf jeder Webseite liest man den Begriff "Cookies"
                        oder "Cookie-Einstellungen" und man soll diese Cookies
                        dann auch noch akzeptieren, obwohl man häufig nur weiß;
                        "<span class="font-medium"
                            >diese Cookies kann man nicht essen</span
                        >".
                    </p>

                    <p class="mb-6">
                        Vielleicht kann ich ein wenig Licht ins Dunkel bringen,
                        in dem ich es dir in meinen Worten erkläre, was Cookies
                        sind, welchen Zweck diese erfüllen und welche Cookies
                        ich auf meiner Webseite verwende.
                    </p>

                    <h4 :class="headingClass">
                        Was sind denn diese Cookies überhaupt?
                    </h4>

                    <p class="mb-5">
                        Cookies sind kleine Textdateien mit technischen
                        Informationen, die auf deinem Gerät (Rechner, Smartphone
                        oder Tablet) gespeichert werden, wenn du eine Website
                        besuchst.
                    </p>

                    <p class="mb-5">
                        Dank dieser Cookies musst du dich z.B. nicht bei jedem
                        Seitenbesuch erneut einloggen oder jedesmal den selben
                        Banner wegklicken, bevor du ungehindert surfen kannst.
                    </p>

                    <h5 :class="headingClass">
                        Welchen Zweck erfüllen Cookies?
                    </h5>

                    <p class="mb-5">
                        Um deine Surf-Erfahrung verbessern zu können (z.B. auf
                        deine Interessen zugeschnittene Inhalte), muss dein
                        Gerät identifizierbar sein, was u.a. durch Cookies
                        möglich ist.
                    </p>

                    <p class="mb-5">
                        Stell dir vor du betrittst die Bäckerei deines Herzens
                        und verdeckst dabei dein Gesicht mit einer Zeitung.
                        Somit kann der von dir täglich gekaufte Kaffee im
                        Becher, nicht wie üblich aus der Maschine gelassen
                        werden, während dem noch Kunden vor dir abgwickelt
                        werden. Das würde deine Bäckerei-Erfahrung mindern.
                    </p>

                    <p class="mb-5">
                        Um deine Surf-Erfahrung bestmöglich auf dich bzw. deine
                        Interessen abstimmen zu können, speichern
                        Webseiten-Betreiber auf deinem Gerät Cookies.
                    </p>

                    <p class="mb-5">
                        Häufig werden die gespeicherten Cookies zwischen denen
                        von dir Besuchten Webseiten ausgetauscht, damit dir z.B.
                        nicht auf jeder Webseite der gleiche Werbebanner
                        angezeigt wird. Dieses Vorgehensweise wird weitläufig
                        als "Tracking" bezeichnet.
                    </p>

                    <h5 :class="headingClass">
                        Weshalb verwende ich Cookies auf vivien.ag?
                    </h5>

                    <p>
                        Die von vivien.ag gespeicherten Cookies dienen
                        ausschießlich der Verbesserung deiner Surf-Erfahrung
                        sowie zur statistischen Erfassung, welche Bereiche
                        meiner Seite häufig bzw. nicht so häufig aufgerufen
                        werden.
                    </p>
                </PageCard>
            </div>

            <div class="w-full lg:ml-5 lg:w-1/2">
                <PageCard nopadding class="border-0!">
                    <div class="p-8 pb-5">
                        <h6 :class="headingClass">Cookie-Einstellungen</h6>

                        <p class="mb-5">
                            Hier kannst du deine Cookie-Einstellungen ändern und
                            reglementieren welche Cookies auf deinem Gerät
                            gespeichert werden dürfen.
                        </p>

                        <p class="text-xs text-gray-600">
                            Cookies die für den fehlerfreien Betrieb meiner
                            Webseite erforderlich sind können hier eingesehen,
                            jedoch nicht geändert werden.
                        </p>
                    </div>

                    <CookieSettings :cookies="cookies.data" />
                </PageCard>
            </div>
        </div>
    </div>
</template>
