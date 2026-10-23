<script setup lang="ts">
import { ref } from 'vue';
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';
import { usePageColor } from '@/composables/usePageColor';
import { formatPrice } from '@/lib/utils';
import type { ImageStripItem } from '@/types/public';

defineProps<{
    images: ImageStripItem[];
}>();

const { color, sectionStyle } = usePageColor();

const selected = ref<ImageStripItem | null>(null);
const open = ref(false);

function show(image: ImageStripItem): void {
    selected.value = image;
    open.value = true;
}

function transform(image: ImageStripItem): string {
    return `perspective(${image.perspective}px) rotate(${image.rotate}deg) rotateY(${image.rotate_y}deg) rotateX(${image.rotate_x}deg)`;
}
</script>

<template>
    <div class="absolute top-0 z-30 mt-16 ml-5">
        <div class="w-full">
            <div>
                <button
                    v-for="(image, index) in images"
                    :key="index"
                    type="button"
                    class="group absolute rounded-lg border bg-white shadow-md select-none hover:outline-2 hover:outline-offset-2 hover:outline-(--section)"
                    :aria-label="image.title ?? undefined"
                    :style="{
                        height: `${image.height}px`,
                        top: `${image.top}px`,
                        left: `${image.left}px`,
                        transform: transform(image),
                        zIndex: image.zindex,
                    }"
                    @click="show(image)"
                >
                    <span class="inline-block h-full cursor-pointer p-2">
                        <span
                            class="inline-block h-full overflow-hidden rounded-sm"
                        >
                            <img
                                :src="image.thumb_url || image.url"
                                alt=""
                                class="h-full"
                            />
                        </span>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <Dialog v-model:open="open">
        <DialogContent
            v-if="selected"
            class="public-layout max-h-[calc(100dvh-2rem)] overflow-y-auto sm:max-w-md"
            :style="sectionStyle"
        >
            <img
                :src="selected.url"
                :alt="selected.title ?? ''"
                class="max-h-[60dvh] w-full rounded-sm object-contain"
            />
            <DialogHeader
                class="gap-1 text-left"
                :class="{ 'sr-only': !selected.title && !selected.description }"
            >
                <DialogTitle
                    class="text-lg leading-6 font-medium"
                    :class="`text-${color}-600`"
                >
                    {{ selected.title ?? 'Bild' }}
                </DialogTitle>
                <DialogDescription
                    v-if="selected.description"
                    class="leading-5 text-gray-500"
                >
                    {{ selected.description }}
                </DialogDescription>
            </DialogHeader>
            <dl
                v-if="selected.artist || selected.price"
                class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-1 text-sm"
            >
                <template v-if="selected.artist">
                    <dt class="text-gray-500">Künstler</dt>
                    <dd class="text-gray-900">{{ selected.artist }}</dd>
                </template>
                <template v-if="selected.price">
                    <dt class="text-gray-500">Preis</dt>
                    <dd class="text-gray-900">
                        {{ formatPrice(selected.price) }}
                    </dd>
                </template>
            </dl>
        </DialogContent>
    </Dialog>
</template>
