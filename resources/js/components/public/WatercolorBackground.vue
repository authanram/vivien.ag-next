<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { onMounted, ref, watch } from 'vue';

type BgState = {
    width: string;
    height: string;
    left: string;
    top: string;
    rotation: number;
    scaleX: number;
    src: string;
    naturalHeight: number;
};

const state = ref<BgState | null>(null);

function generate() {
    const n = Math.floor(Math.random() * 15) + 1;
    const scalePercent = 77 + Math.random() * 20;
    const naturalWidth = 2390;
    const naturalHeight = 1594;
    const width = Math.round(naturalWidth * scalePercent / 100);
    const height = Math.round(naturalHeight * scalePercent / 100);
    const leftVw = -10 + Math.random() * 40;
    const topPx = 60 + Math.random() * 100;
    const rotation = Math.floor(Math.random() * 360);
    const scaleX = Math.random() > 0.5 ? -1 : 1;

    state.value = {
        width: `${width}px`,
        height: `${height}px`,
        left: `${leftVw}vw`,
        top: `${topPx}px`,
        rotation,
        scaleX,
        src: `/images/watercolor/watercolor-${n}.jpg`,
        naturalHeight,
    };
}

onMounted(generate);

const page = usePage();
watch(() => page.url, generate);
</script>

<template>
    <div class="pointer-events-none absolute inset-0 z-0 overflow-hidden">
        <div
            v-if="state"
            class="absolute"
            :style="{
                width: state.width,
                height: state.height,
                left: state.left,
                top: state.top,
                transform: `rotate(${state.rotation}deg)`,
                transformOrigin: 'center center',
            }"
        >
            <div
                :style="{
                    content: '',
                    position: 'absolute',
                    transform: `scaleX(${state.scaleX})`,
                    backgroundImage: `url(${state.src})`,
                    backgroundRepeat: 'no-repeat',
                    backgroundPosition: 'center top',
                    backgroundSize: 'contain',
                    height: `${state.naturalHeight}px`,
                    left: 0,
                    right: 0,
                    top: 0,
                    transformOrigin: 'center center',
                }"
                class="absolute inset-x-0 top-0"
            />
        </div>
    </div>
</template>
