<template>
    <div v-if="imageCoords.length">
        <transition-group
            name="fade"
            tag="div"
        >
            <template v-for="(coord, index) in imageCoords">
                <ui-coord-image
                    v-if="coord.image"
                    :key="`ui-coord-image-${index}`"
                    :active="[detailsIndex, editIndex, removeIndex].includes(index)"
                    :auth="auth"
                    :image="coord.image"
                    :style="coord.coordsParsed"
                    class="absolute bg-white border group no-select rounded-lg shadow-md"
                    @details="actionDetails(index)"
                    @edit="actionEdit(index)"
                    @remove="actionRemove(index)"
                />
            </template>
        </transition-group>
        <transition name="fade">
            <ui-gallery-image
                v-if="detailsValue"
                :data-image="detailsValue"
                @reset="reset()"
            />
            <ui-coord-editor
                v-if="editValue !== null"
                :data-coord="editValue"
                @dismissed="() => editIndex = null"
            />
            <ui-coord-remove
                v-if="removeValue !== null"
                :data-id="removeValue"
                @dismissed="() => removeIndex = null"
            />
        </transition>
    </div>
</template>

<script lang="ts">
    import {Image, ImageCoord} from '@/state/models'
    import {sleep} from '@/Helpers'

    export default {
        components: {
            'ui-coord-editor': () => import('@/components/ui-coords/UiCoordEditor.vue'),
            'ui-coord-image': () => import('@/components/ui-coords/UiCoordImage.vue'),
            'ui-coord-remove': () => import('@/components/ui-coords/UiCoordRemove.vue'),
            'ui-gallery-image': () => import('@/components/UiGalleryImage.vue'),
        },

        props: {
            auth: {required: true, type: Boolean},
        },

        computed: {
            coords (): ImageCoord[] {
                return ImageCoord
                    .query()
                    .with('image')
                    .get()
            },

            detailsValue (): Image | null {
                return Number.isInteger(this.detailsIndex)
                    ? this.imageCoords[this.detailsIndex].image
                    : null
            },

            editValue (): ImageCoord | null {
                return Number.isInteger(this.editIndex)
                    ? this.imageCoords[this.editIndex]
                    : null
            },

            removeValue (): number | null {
                return Number.isInteger(this.removeIndex)
                    ? this.removeIndex
                    : null
            },
        },

        data () {
            return {
                detailsIndex: null,
                editIndex: null,
                removeIndex: null,
                imageCoords: [],
            }
        },

        watch: {
            coords (value) {
                if (value.length) {
                    this.next(value)
                }
            },
        },

        methods: {
            actionDetails (index: number): void {
                this.detailsIndex = index
            },

            actionEdit (index: number): void {
                this.editIndex = index
            },

            actionRemove (index: number): void {
                this.removeIndex = index
            },

            reset (): void {
                this.detailsIndex = null
                this.editIndex = null
                this.removeIndex = null
            },

            next (coords: object[]): void {
                if (!coords.length) {
                    return
                }

                sleep(50).then(() => {
                    this.imageCoords.push(coords.shift())
                    this.next(coords)
                })
            },
        },
    }
</script>
