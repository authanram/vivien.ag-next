<script setup lang="ts">
import type { ImageStripItem } from '@/types/public';

defineProps<{
    images: ImageStripItem[];
}>();

function transform(image: ImageStripItem): string {
    return `perspective(${image.perspective}px) rotate(${image.rotate}deg) rotateY(${image.rotate_y}deg) rotateX(${image.rotate_x}deg)`;
}
</script>

<template>
    <div class="absolute top-0 z-30 mt-16 ml-5">
        <div class="w-full">
            <div>
                <span
                    v-for="(image, index) in images"
                    :key="index"
                    class="group absolute rounded-lg border bg-white shadow-md select-none"
                    :style="{
                        height: `${image.height}px`,
                        top: `${image.top}px`,
                        left: `${image.left}px`,
                        transform: transform(image),
                        zIndex: image.zindex,
                    }"
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
                </span>
            </div>
        </div>
    </div>
</template>
