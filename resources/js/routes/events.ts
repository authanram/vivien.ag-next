import ViewEvents from '@/views/Events.vue'

export default [
    { path: '/', component: ViewEvents, props: (route) => ({ query: route.query, }) },
]
