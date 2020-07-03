import VueRouter from 'vue-router'
import { VueConstructor }  from 'vue'

export default {
    install: (Vue: VueConstructor): void => {
        Vue.use(VueRouter)
    },
}
