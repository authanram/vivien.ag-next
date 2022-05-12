Nova.$on('resources-loaded', () => Vue.nextTick(() => {
    // fix tooltips not closing properly
    document.querySelectorAll('.v-popper--has-tooltip').forEach((el) => {
        el.addEventListener('mouseout', () => {
            document.querySelectorAll('.v-popper--theme-tooltip').forEach((el) => el.remove());
        });
    });
}));
