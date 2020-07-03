import { MutationPayload } from 'vuex'
import { VueConstructor }  from 'vue'
import store from '@/state/store'

export default {
    install: (Vue: VueConstructor): void => {
        Vue.prototype.$store = store

        store.subscribe((mutation: MutationPayload): void => {
            Vue.prototype.$event.$emit(mutation.type, mutation.payload)
        })

        store.subscribeAction({
            after: (action: any): void => {
                Vue.prototype.$event.$emit(action.type, action.payload)
            },
        })
    },
}
