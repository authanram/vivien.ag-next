import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const PAGE_COLORS: Record<string, string> = {
    '/': 'teal',
    '/seminare': 'pink',
    '/vortraege': 'red',
    '/beratung': 'blue',
    '/lerntraining': 'purple',
    '/portrait': 'orange',
    '/kontakt': 'gray',
    '/impressum': 'slate',
    '/datenschutz': 'slate',
    '/cookie-vereinbarung': 'slate',
};

export function usePageColor() {
    const page = usePage();

    const color = computed(() => {
        const pathname = new URL(page.url, 'http://x').pathname;
        const base = '/' + pathname.split('/').filter(Boolean)[0];
        return PAGE_COLORS[pathname] ?? PAGE_COLORS[base] ?? 'teal';
    });

    const colorClass = computed(() => `accent-${color.value}`);

    return { color, colorClass };
}
