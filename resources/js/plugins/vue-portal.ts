import PortalVue from 'portal-vue'
import { VueConstructor }  from 'vue'

export default {
    install: (Vue: VueConstructor): void => {
        Vue.use(PortalVue)
    },
}
