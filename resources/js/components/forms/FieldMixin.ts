export default {
    props: {
        name: {required: true, type: String},
        //
        accent: {default: 'grey', type: String},
        errors: {default: () => {}, type: Object},
        focus: {default: false, type: Boolean},
        label: {default: null, type: String},
        placeholder: {default: null, type: String},
        row: {default: 0, type: Number},
        value: {default: null},
    },

    mounted (): void {
        // if (!this.focus) {
        //     return
        // }
        //
        // this.$refs[`input-${this.name}`].focus()
    }
}
