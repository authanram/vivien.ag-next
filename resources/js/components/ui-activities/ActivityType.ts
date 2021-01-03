export default {
    name: 'activityType',

    abstract: true,

    props: {
        accent: {
            default: 'gray',
            type: String,
        },
        actionable: {
            default: null,
            required: false,
            type: Object,
        },
    },

    methods: {
        readTime(body: string): number {
            const readTime = Math.round(body.split(' ').length / 200)
            return readTime > 0 ? readTime : 1
        },

        truncate(body: string, length = 30, ending: string | null = '...') {
            if (body.split(' ').length <= length) {
                return body
            }

            const action = '<span class="font-medium group-hover:underline">Weiterlesen</span>'

            return (
                body.split(' ').splice(0, length).join(' ') +
                (ending ? ` ${ending} ` : '') +
                `<span class="text-gray-500 text-right text-sm">${action}</span>`
            )
        },
    },
}
