<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Datenschutzerklärung');
</script>

<template>
    <Head title="Datenschutzerklärung" />

    <PageCard>
        <div class="text-gray-600 leading-relaxed space-y-5 [&_h2]:font-semibold [&_h2]:text-lg [&_h2]:mt-6 [&_h2]:mb-2 [&_h2]:text-gray-700 [&_h4]:font-semibold [&_h4]:mt-4 [&_h4]:mb-1 [&_a]:underline">
            <h2>Allgemeiner Hinweis und Pflichtinformationen</h2>
            <p>Diese Website benutzt Google Analytics, einen Webanalysedienst der Google Inc. Google Analytics verwendet sog. „Cookies", Textdateien, die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie ermöglichen.</p>

            <h2>Benennung der verantwortlichen Stelle</h2>
            <p>Die verantwortliche Stelle für die Datenverarbeitung auf dieser Website ist:</p>
            <p><strong>Sybille Seuffer</strong><br />Jägerstraße 26<br />75339 Spielberg</p>

            <h2>Widerruf Ihrer Einwilligung zur Datenverarbeitung</h2>
            <p>Nur mit Ihrer ausdrücklichen Einwilligung sind einige Vorgänge der Datenverarbeitung möglich. Ein Widerruf Ihrer bereits erteilten Einwilligung ist jederzeit möglich. Für den Widerruf genügt eine formlose Mitteilung per E-Mail.</p>

            <h2>Recht auf Beschwerde bei der zuständigen Aufsichtsbehörde</h2>
            <p>Als Betroffener steht Ihnen im Falle eines datenschutzrechtlichen Verstoßes ein Beschwerderecht bei der zuständigen Aufsichtsbehörde zu.</p>

            <h2>Recht auf Datenübertragbarkeit</h2>
            <p>Ihnen steht das Recht zu, Daten, die wir auf Grundlage Ihrer Einwilligung oder in Erfüllung eines Vertrags automatisiert verarbeiten, an sich oder an Dritte aushändigen zu lassen.</p>

            <h2>Recht auf Auskunft, Berichtigung, Sperrung, Löschung</h2>
            <p>Sie haben jederzeit im Rahmen der geltenden gesetzlichen Bestimmungen das Recht auf unentgeltliche Auskunft über Ihre gespeicherten personenbezogenen Daten, Herkunft der Daten, deren Empfänger und den Zweck der Datenverarbeitung und ggf. ein Recht auf Berichtigung, Sperrung oder Löschung dieser Daten.</p>

            <h2>SSL- bzw. TLS-Verschlüsselung</h2>
            <p>Aus Sicherheitsgründen und zum Schutz der Übertragung vertraulicher Inhalte nutzt unsere Website eine SSL-bzw. TLS-Verschlüsselung.</p>

            <h2>Cookies</h2>
            <p>Unsere Website verwendet Cookies. Das sind kleine Textdateien, die Ihr Webbrowser auf Ihrem Endgerät speichert. Cookies helfen uns dabei, unser Angebot nutzerfreundlicher, effektiver und sicherer zu machen.</p>

            <h2>Lokale Datenspeicherung – „Meine Daten speichern"</h2>
            <p>Wenn Sie im Seminar-Anmeldeformular die Checkbox „Meine Daten speichern" aktivieren, werden Ihre Kontaktdaten lokal in Ihrem Browser (localStorage) gespeichert. Diese Daten verlassen Ihren Browser nicht und werden nicht an unsere Server übertragen. Sie können diese Daten jederzeit löschen, indem Sie die Checkbox deaktivieren oder Ihren Browser-Cache leeren.</p>
        </div>
    </PageCard>
</template>
