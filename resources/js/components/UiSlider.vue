<template>
    <vue-slider
        v-model="dataValue"
        :marks="marks"
        :max="max"
        :min="min"
        :tooltip="'active'"
        :lazy="true"
        @change="(value) => $emit('change', value)"
    />
</template>

<script>
import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'

export default {
    components: {
        VueSlider
    },

    props: {
        default: {default: null, type: Number},
        marks: {default: () => [], type: Array},
        max: {default: 100, type: Number},
        min: {default: 0, type: Number},
    },

    data () {
        return {
            dataValue: null,
        }
    },

    mounted () {
        this.dataValue = this.default || this.min
    }
}
</script>
