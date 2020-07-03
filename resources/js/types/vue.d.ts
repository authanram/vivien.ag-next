import { Vue } from 'vue/types/vue'
import { AxiosInstance } from 'axios'

declare module 'vue/types/vue' {
    interface Vue {
        $accent: string
        $axios: AxiosInstance
        $event: Vue
        $initial: object
    }
}
