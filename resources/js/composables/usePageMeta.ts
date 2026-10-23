import { setLayoutProps } from '@inertiajs/vue3';

export function usePageMeta() {
    function setMeta(title: string, caption = '') {
        setLayoutProps({ title, caption });
    }

    return { setMeta };
}
