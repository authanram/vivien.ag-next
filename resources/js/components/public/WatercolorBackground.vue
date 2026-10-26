<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { onMounted, ref, watch } from 'vue';

type Background = {
    src: string;
    width: number;
    height: number;
    naturalHeight: number;
    rotation: number;
    scaleX: number;
};

const background = ref<Background | null>(null);

function randomInt(min: number, max: number): number {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function generate(): void {
    const src = `/images/watercolor/watercolor-${randomInt(1, 15)}.jpg`;
    const image = new Image();

    image.onload = () => {
        const scale = randomInt(77, 97);

        background.value = {
            src,
            width: Math.round((image.naturalWidth / 100) * scale),
            height: Math.round((image.naturalHeight / 100) * scale),
            naturalHeight: image.naturalHeight,
            rotation: randomInt(0, 360),
            scaleX: Math.random() < 0.5 ? -1 : 1,
        };
    };

    image.src = src;
}

onMounted(generate);

const page = usePage();
watch(() => page.url, generate);
</script>

<template>
    <div class="absolute top-0 right-0 bottom-0 left-0 z-0 overflow-hidden">
        <div
            v-if="background"
            :style="{
                width: `${background.width}px`,
                height: `${background.height}px`,
                transform: `rotate(${background.rotation}deg)`,
                transformOrigin: 'center center',
            }"
        >
            <div
                class="absolute top-0 right-0 left-0"
                :style="{
                    height: `${background.naturalHeight}px`,
                    transform: `scaleX(${background.scaleX})`,
                    transformOrigin: 'center center',
                    backgroundImage: `url(${background.src})`,
                    backgroundRepeat: 'no-repeat',
                    backgroundPosition: 'center top',
                    backgroundSize: 'contain',
                }"
            />
        </div>
    </div>
</template>
