import VueRouter from 'vue-router'

let routes: any[] = []

const register = (files) => files.keys().map((key) => {
    routes.push(...files(key).default)
})

register(require['context']('@/routes', true, /\.ts$/i))

export const router = new VueRouter({
    // mode: 'history',
    routes,
})
