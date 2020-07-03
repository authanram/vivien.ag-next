import { VueConstructor } from 'vue/types/vue'
import vueConfig from '@/config/vue'

export default {
    install: (Vue: VueConstructor): void => {
        Object.keys(vueConfig).forEach((key: string): void => {
            // @ts-ignore
            Vue.config[key] = vueConfig[key]
        })
    },
}
