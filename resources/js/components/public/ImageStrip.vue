<script setup lang="ts">
import type { ImageStripItem } from '@/types/public';

defineProps<{
    images: ImageStripItem[];
}>();

// Transform-String exakt wie Original UiCoordImage
function buildTransform(img: ImageStripItem): string {
    const parts: string[] = [];
    if (img.perspective) parts.push(`perspective(${img.perspective}px)`);
    if (img.rotate_x) parts.push(`rotateX(${img.rotate_x}deg)`);
    if (img.rotate_y) parts.push(`rotateY(${img.rotate_y}deg)`);
    if (img.rotate) parts.push(`rotate(${img.rotate}deg)`);
    return parts.length ? parts.join(' ') : 'none';
}
</script>

<template>
    <!-- Container: kein eigenes Positioning, direkt relativ zum Parent positioniert -->
    <div style="position: relative; width: 0; height: 0;">
        <div
            v-for="(img, i) in images"
            :key="i"
            class="absolute"
            :style="{
                top: `${img.top}px`,
                left: `${img.left}px`,
                zIndex: img.zindex,
                transform: buildTransform(img),
            }"
        >
            <!-- Exakt wie UiCoordImage.vue: bg-white shadow-md rounded-lg, innen p-2 padding, innen overflow-hidden rounded -->
            <span class="inline-block bg-white shadow-md rounded-lg">
                <span class="cursor-pointer h-full inline-block p-2">
                    <span class="block overflow-hidden rounded" :style="{ height: `${img.height}px` }">
                        <img
                            :src="img.thumb_url || img.url"
                            :alt="''"
                            class="h-full w-auto"
                            loading="lazy"
                        />
                    </span>
                </span>
            </span>
        </div>
    </div>
</template>
