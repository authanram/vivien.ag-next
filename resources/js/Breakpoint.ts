export class Breakpoint {
    private readonly _breakpoints = {}

    private _currentBreakpoint = ''

    private _width = 0

    public constructor (breakpoints: object | undefined = undefined) {
        this._breakpoints = breakpoints || { xs: 340, sm: 640, md: 768, lg: 1024, xl: 1280 }
        this._width = window.innerWidth
        this._currentBreakpoint = this.current
    }

    public get current (): string {
        return this.makeCurrent()
    }

    public is (breakpoint: string): boolean {
        const width = this.width
        return width >= this.value(breakpoint) && width <= this.value(this.index(breakpoint)+1)
    }

    // less equal
    public le (breakpoint: string, decrease = false): boolean {
        let keys = this.keysUntil(breakpoint)

        if (decrease && keys.length > 1) {
            keys.pop()
        }

        return keys.includes(this.current)
    }

    // greater equal
    public ge (breakpoint: string): boolean {
        const index = this.index(breakpoint) - 1
        return !this.le(this.keys[index >= 0 ? index : 0])
    }

    public previous (breakpoint: string): string {
        const keys = this.keysUntil(breakpoint)

        const index = this.keys.findIndex((subject) => subject === String(keys.pop())) - 1

        return this.keys[index > 0 ? index : 0]
    }

    public update (): void {
        if (this._currentBreakpoint === this.makeCurrent(window.innerWidth)) {
            return
        }

        this._width = window.innerWidth
        this._currentBreakpoint = this.current
    }

    protected get width (): number {
        return this._width
    }

    protected get length (): number {
        return Object.keys(this._breakpoints).length
    }

    protected get keyLast (): string {
        return this.keys[this.length-1]
    }

    protected get keys (): string[] {
        return Object.keys(this._breakpoints)
    }

    protected get values (): number[] {
        return Object.values(this._breakpoints)
    }

    protected index (breakpoint: string): number {
        const index = this.keys.findIndex((key: string) => key === breakpoint)

        return index >= 0 ? index : 0
    }

    protected value (subject): number {
        return typeof subject === 'string'
            ? this._breakpoints[subject]
            : subject >= 0 ? this.values[subject] : 0
    }

    protected keysUntil (breakpoint: string): string[] {
        const keys: string[] = []
        let match = false

        this.keys.forEach((key) => {
            if (!match) {
                keys.push(key)

                if (key === breakpoint) {
                    match = true
                }
            }
        })

        return keys
    }

    protected makeCurrent (width: number | null = null): string {
        if ((width || this.width) >= this.values[this.length-1]) {
            return this.keyLast
        }

        const index = this.values.findIndex((value: number) => value > (width || this.width))

        return this.keys[index-1 >= 0 ? index-1 : 0]
    }
}
