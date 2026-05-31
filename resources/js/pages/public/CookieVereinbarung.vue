<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Cookie-Vereinbarung');
</script>

<template>
    <Head title="Cookie-Vereinbarung" />

    <PageCard>
        <div class="space-y-6 text-sm leading-relaxed text-stone-600">
            <section>
                <h2 class="mb-2 font-semibold text-stone-800">Was sind Cookies?</h2>
                <p>Cookies sind kleine Textdateien, die von Websites auf Ihrem Gerät gespeichert werden. Diese Website verwendet nur technisch notwendige Speicherungsmechanismen.</p>
            </section>
            <section>
                <h2 class="mb-2 font-semibold text-stone-800">Session-Cookie (technisch notwendig)</h2>
                <p>Diese Website verwendet einen Session-Cookie für den sicheren Betrieb. Er wird beim Schließen des Browsers gelöscht. Rechtsgrundlage: Art. 6 Abs. 1 lit. f DSGVO.</p>
            </section>
            <section>
                <h2 class="mb-2 font-semibold text-stone-800">Lokale Datenspeicherung – „Meine Daten speichern"</h2>
                <p class="mb-3">Wenn Sie im Seminar-Anmeldeformular die Checkbox <strong>„Meine Daten speichern"</strong> aktivieren, werden Ihre Kontaktdaten im <em>localStorage</em> Ihres Browsers gespeichert.</p>
                <ul class="space-y-1">
                    <li>Schlüssel: <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs">vivien_attendee_data</code></li>
                    <li>Zweck: Vorausfüllen des Anmeldeformulars bei zukünftigen Anmeldungen</li>
                    <li>Übertragung: Keine – Daten verlassen Ihren Browser nicht</li>
                    <li>Löschen: Checkbox deaktivieren oder Browser-Daten löschen</li>
                </ul>
            </section>
            <section>
                <h2 class="mb-2 font-semibold text-stone-800">Keine Tracking-Cookies</h2>
                <p>Diese Website verwendet keine Tracking-Cookies, keine Analyse-Tools und keine Social-Media-Pixel.</p>
            </section>
            <section>
                <h2 class="mb-2 font-semibold text-stone-800">Kontakt</h2>
                <p><a href="mailto:me@vivien.ag" class="hover:underline" style="color: var(--color-nav-accent)">me@vivien.ag</a></p>
            </section>
        </div>
    </PageCard>
</template>
