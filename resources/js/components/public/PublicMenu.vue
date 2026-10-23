<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { onClickOutside } from '@vueuse/core';
import { computed, ref, useTemplateRef } from 'vue';
import { menuClassAttribute } from '@/lib/public-menu';

export type MenuBreakpoint = 'sm' | 'md' | 'lg' | 'xl' | null;

export type PublicMenuItem = {
    href: string;
    label: string;
    color: string;
    breakpoint: MenuBreakpoint;
};

const props = withDefaults(
    defineProps<{
        items: PublicMenuItem[];
        border?: boolean;
        paddingClass?: string;
    }>(),
    { border: false, paddingClass: 'xl:px-10 md:pl-5 px-5' },
);

// Items are listed inline from their breakpoint up and move into the dropdown below it.
const INLINE_CLASS: Record<string, string> = {
    none: 'inline-flex',
    sm: 'hidden sm:inline-flex',
    md: 'hidden md:inline-flex',
    lg: 'hidden lg:inline-flex',
    xl: 'hidden xl:inline-flex',
};
const DROPDOWN_CLASS: Record<string, string> = {
    sm: 'sm:hidden',
    md: 'md:hidden',
    lg: 'lg:hidden',
    xl: 'xl:hidden',
};
const BREAKPOINT_ORDER = ['sm', 'md', 'lg', 'xl'];

const page = usePage();
const currentPath = computed(() => new URL(page.url, 'http://x').pathname);

const dropdownOpen = ref(false);
const dropdown = useTemplateRef('dropdown');
onClickOutside(dropdown, () => (dropdownOpen.value = false));

const dropdownItems = computed(() =>
    props.items.filter((item) => item.breakpoint !== null),
);

const dropdownToggleClass = computed(() => {
    const widest = dropdownItems.value
        .map((item) => BREAKPOINT_ORDER.indexOf(item.breakpoint as string))
        .reduce((max, index) => Math.max(max, index), -1);

    return DROPDOWN_CLASS[BREAKPOINT_ORDER[widest]];
});

function isActive(href: string): boolean {
    if (href === '/') {
        return currentPath.value === '/';
    }

    return (
        currentPath.value === href || currentPath.value.startsWith(href + '/')
    );
}

function classAttribute(
    color: string,
    type: 'default' | 'dropdown' = 'default',
    active = false,
): string {
    return menuClassAttribute(color, type, active, props.border);
}
</script>

<template>
    <div class="mx-auto lg:max-w-5xl xl:max-w-screen-xl" :class="paddingClass">
        <nav>
            <div
                v-if="border"
                class="absolute right-0 left-0 z-20 border-gray-200"
                style="bottom: -1px; border-width: 3px"
            />
            <div class="relative z-20 flex h-16 items-center">
                <slot :class-attribute="classAttribute" />
                <div class="flex h-full w-full justify-between">
                    <div class="inline-flex h-full items-center">
                        <Link
                            v-for="item in items"
                            :key="item.href"
                            :href="item.href"
                            :class="[
                                INLINE_CLASS[item.breakpoint ?? 'none'],
                                classAttribute(
                                    item.color,
                                    'default',
                                    isActive(item.href),
                                ),
                            ]"
                            class="relative h-full"
                        >
                            <span>{{ item.label }}</span>
                        </Link>
                    </div>

                    <div
                        v-if="dropdownItems.length"
                        ref="dropdown"
                        class="flex items-center"
                        :class="dropdownToggleClass"
                    >
                        <div class="relative z-10">
                            <button
                                type="button"
                                :aria-expanded="dropdownOpen"
                                aria-label="dropdown"
                                class="justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-hidden"
                                @click="dropdownOpen = !dropdownOpen"
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        :d="
                                            dropdownOpen
                                                ? 'M6 18L18 6M6 6l12 12'
                                                : 'M4 6h16M4 12h16M4 18h16'
                                        "
                                    />
                                </svg>
                            </button>
                            <div
                                v-if="dropdownOpen"
                                class="absolute right-0 z-10 mt-1 w-48 origin-top-right rounded-md border border-gray-100 shadow-lg"
                            >
                                <div
                                    aria-orientation="vertical"
                                    class="overflow-hidden rounded-md bg-white"
                                    role="menu"
                                >
                                    <Link
                                        v-for="item in dropdownItems"
                                        :key="item.href"
                                        :href="item.href"
                                        :class="[
                                            DROPDOWN_CLASS[
                                                item.breakpoint as string
                                            ],
                                            classAttribute(
                                                item.color,
                                                'dropdown',
                                                isActive(item.href),
                                            ),
                                        ]"
                                        class="relative"
                                        @click="dropdownOpen = false"
                                    >
                                        <span>{{ item.label }}</span>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>
