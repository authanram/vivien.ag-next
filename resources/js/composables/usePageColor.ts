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
    '/impressum': 'gray',
    '/datenschutz': 'gray',
    '/cookie-vereinbarung': 'gray',
};

// Drives the shadcn primary/ring tokens and focus/selection colors of the public site.
export function sectionStyle(color: string): Record<string, string> {
    return {
        '--section': `var(--color-${color}-600)`,
        '--section-soft': `var(--color-${color}-100)`,
    };
}

export function usePageColor() {
    const page = usePage();

    const color = computed(() => {
        const pathname = new URL(page.url, 'http://x').pathname;
        const base = '/' + pathname.split('/').filter(Boolean)[0];

        return PAGE_COLORS[pathname] ?? PAGE_COLORS[base] ?? 'teal';
    });

    return { color, sectionStyle: computed(() => sectionStyle(color.value)) };
}
