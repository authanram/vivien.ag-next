export default {
    install: (Vue) => {
        const register = (files) => files.keys().map((key) => {
            Vue.component(key.split('/').pop().split('.')[0], files(key).default)
        })

        register(require['context']('@/components', true, /\.vue$/i))
    },
}
