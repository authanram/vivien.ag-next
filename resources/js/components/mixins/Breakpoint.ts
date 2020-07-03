import { Breakpoint } from '@/Breakpoint'

export default {
    data: function (): object {
        return {
            breakpoint: new Breakpoint,
        }
    },

    created (): void {
        window.addEventListener('resize', () => this.breakpoint.update())
    }
}
