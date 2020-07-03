export default {
    props: {
        accent: {
            required: true,
            type: String,
        },
        items: {
            default: null,
            type: Array,
        },
        loading: {
            default: false,
            type: Boolean,
        },
    },
}
