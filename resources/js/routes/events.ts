export default [
    { path: '/', component: () => import(/* webpackChunkName: "view-events" */'@/views/Events.vue'), props: (route) => ({ query: route.query, }) },
]
