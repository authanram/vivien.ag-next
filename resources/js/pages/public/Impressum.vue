<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PageCard from '@/components/public/PageCard.vue';
import { usePageMeta } from '@/composables/usePageMeta';

defineOptions({ inheritAttrs: false });

const { setMeta } = usePageMeta();
setMeta('Impressum', 'Verantwortlich für den Inhalt dieser Webseite');
</script>

<template>
    <Head title="Impressum" />

    <PageCard>
        <div class="text-gray-600 leading-relaxed">
            <p>
                Der Inhalt der Internetseiten wurde sorgfältig bearbeitet und geprüft. Es wird jedoch keine
                Gewähr für Richtigkeit, Vollständigkeit und Aktualität der bereitgestellten Informationen
                übernommen. Sofern durch „Links" auf fremde Internetseiten verwiesen wird, ist für den
                Inhalt der Seiten keine Verantwortung gegeben. Wir behalten uns das Recht vor, Aktualisierungen
                und Änderungen an den bereitgestellten Informationen ohne vorherige Ankündigung zu verändern,
                zu ergänzen und zu löschen.
            </p>
        </div>
    </PageCard>
</template>
