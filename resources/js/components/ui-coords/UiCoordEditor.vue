<template>
    <ui-modal :callback-cancel="() => dismiss">
        <div class="pb-8">
            <h3>Top</h3>
            <ui-slider
                key="slider-top"
                :default="dataCoord.coords.top"
                :marks="[0, 250, 500, 750, 1000, 1500, 2000]"
                :max="2000"
                :min="0"
                @change="(value) => valueTop = value"
            />
        </div>
        <div class="pb-8">
            <h3>Left</h3>
            <ui-slider
                key="slider-left"
                :default="dataCoord.coords.left"
                :marks="[-250, -200, -150, -100, -50, 0]"
                :max="0"
                :min="-250"
                @change="(value) => valueLeft = value"
            />
        </div>
        <div class="pb-8">
            <h3>Height</h3>
            <ui-slider
                key="slider-height"
                :default="dataCoord.coords.height"
                :marks="[50, 100, 150, 200, 250, 300]"
                :max="300"
                :min="50"
                @change="(value) => valueHeight = value"
            />
        </div>
        <div class="pb-8">
            <h3>Rotate</h3>
            <ui-slider
                key="slider-rotate"
                :default="dataCoord.coords.rotate"
                :marks="[-10, -5, 0, 5, 10]"
                :min="-10"
                :max="10"
                @change="(value) => valueRotate = value"
            />
        </div>
        <div class="pb-8">
            <h3>Rotate (x)</h3>
            <ui-slider
                key="slider-rotate-x"
                :default="dataCoord.coords.rotate_x"
                :marks="[-30, -20, -10, 0, 10, 20, 30]"
                :max="30"
                :min="-30"
                @change="(value) => valueRotateX = value"
            />
        </div>
        <div class="pb-8">
            <h3>Rotate (y)</h3>
            <ui-slider
                key="slider-rotate-y"
                :default="dataCoord.coords.rotate_y"
                :marks="[-30, -20, -10, 0, 10, 20, 30]"
                :max="30"
                :min="-30"
                @change="(value) => valueRotateY = value"
            />
        </div>
        <div class="pb-8">
            <h3>Perspective</h3>
            <ui-slider
                key="slider-perspective"
                :default="dataCoord.coords.perspective"
                :marks="[0, 250, 500, 750, 1000]"
                :max="1000"
                :min="0"
                @change="(value) => valuePerspective = value"
            />
        </div>
        <div class="pb-8">
            <h3>Index (z)</h3>
            <ui-slider
                key="slider-index-z"
                :default="dataCoord.coords.zindex"
                :marks="[1, 5, 10, 15, 20, 25]"
                :max="25"
                :min="1"
                @change="(value) => valueIndexZ = value"
            />
        </div>
    </ui-modal>
</template>

<script lang="ts">
    export default {
        props: {
            dataCoord: {required: true, type: Object},
        },

        data () {
            return {
                valueTop: null,
                valueLeft: null,
                valueHeight: null,
                valueRotate: null,
                valueRotateX: null,
                valueRotateY: null,
                valuePerspective: null,
                valueIndexZ: null,
            }
        },

        mounted (): void {
            this.valueTop = this.dataCoord.coords.top
            this.valueLeft = this.dataCoord.coords.left
            this.valueHeight = this.dataCoord.coords.height
            this.valueRotate = this.dataCoord.coords.rotate
            this.valueRotateX = this.dataCoord.coords.rotate_x
            this.valueRotateY = this.dataCoord.coords.rotate_y
            this.valuePerspective = this.dataCoord.coords.perspective
            this.valueIndexZ = this.dataCoord.coords.zindex
        },

        methods: {
            dismiss (): void {
                this.$event.$emit('overlay.destroy')
                this.$emit('dismissed')
            },
        },
    }
</script>
