export default {
    install: (Vue): void => {
        Vue.prototype.$isTouch = (): boolean => 'ontouchstart' in window
    },
}
