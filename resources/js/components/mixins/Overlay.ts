import { Overlay } from '@/state/models'

export default {
    computed: {
        overlay (): Overlay {
            return new Overlay
        }
    },
}
