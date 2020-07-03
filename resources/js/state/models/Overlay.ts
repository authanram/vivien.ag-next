import { Model } from '@/state/models/Model'

export default class Overlay extends Model {
    public static entity = 'overlays'

    public static state () {
        return {
            _active: false,
            _loading: false,
        }
    }

    public get active (): boolean {
        return this.$store().state.entities.overlays._active
    }

    public set active (value: boolean) {
        Overlay.commit((state) => {
            state._active = value
        })
    }

    public get getActive (): Overlay {
        return this.$store().state
    }

    public get loading (): boolean {
        return this.$store().state.entities.overlays._loading
    }

    public set loading (value: boolean) {
        Overlay.commit((state) => {
            state._loading = value
        })
    }

    public create (): void {
        this.active = true
    }

    public destroy (): void {
        this.active = false
        this.loading = false
    }

    public load (): void {
        this.active = true
        this.loading = true
    }
}
