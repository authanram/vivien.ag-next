import { ref } from 'vue';

const _title = ref('');
const _caption = ref('');

export function usePageMeta() {
    function setMeta(title: string, caption = '') {
        _title.value = title;
        _caption.value = caption;
    }

    return {
        title: _title,
        caption: _caption,
        setMeta,
    };
}
