import { ensureIsCsv, ensureIsIterable, rejectEmptyProperties } from '@/Helpers'

export default {
    methods: {
        routeGetQueryParameter (parameter: string): string[] | null {
            const queryParameter = ensureIsIterable(this.$route.query[parameter])
            return queryParameter.length ? queryParameter : null
        },

        routeHasQueryParameter (parameter: string): boolean {
            return Boolean(this.routeGetQueryParameter(parameter))
        },

        routeHasQueryParameterValue (parameter: string, value: string): boolean {
            return this.routeHasQueryParameter(parameter)
                ? this.routeGetQueryParameter(parameter).includes(value)
                : false
        },

        routeMakeQueryParameters (subject: object): object {
            Object.keys(subject).forEach((key: string) => {
                subject[key] = ensureIsCsv(subject[key])
            })

            return subject
        },

        routeRemoveQueryParameter (parameter: string) {
            let query = { ...this.$route.query }
            let queryNew = {}

            Object.keys(query).forEach((queryParameter: string) => {
                if (queryParameter !== parameter) {
                    queryNew[queryParameter] = query[queryParameter]
                }
            })

            this.$router.push({ path: '/', query: this.routeMakeQueryParameters(queryNew) })
        },

        routeToggleQueryParameter (parameter: string, value: string): void {
            let query = { ...this.$route.query }

            const iterable = ensureIsIterable(query[parameter])

            query[parameter] = !this.routeHasQueryParameterValue(parameter, value)
                ? iterable.concat(value).filter((v) => v.length)
                : iterable.filter((v: string) => v !== value)

            query = rejectEmptyProperties(
                this.routeMakeQueryParameters(query)
            )

            this.$router.push({ path: '/', query })
        },
    },
}
