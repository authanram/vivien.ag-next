<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { usePageColor } from '@/composables/usePageColor';
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

const { sectionStyle } = usePageColor();
const dropdownOpen = ref(false);

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
                        class="flex items-center"
                        :class="dropdownToggleClass"
                    >
                        <DropdownMenu v-model:open="dropdownOpen">
                            <DropdownMenuTrigger
                                aria-label="dropdown"
                                class="justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-hidden data-[state=open]:bg-gray-100 data-[state=open]:text-gray-500"
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
                            </DropdownMenuTrigger>
                            <DropdownMenuContent
                                align="end"
                                class="public-layout w-48 rounded-md border-gray-100 p-0 shadow-lg"
                                :style="sectionStyle"
                            >
                                <DropdownMenuItem
                                    v-for="item in dropdownItems"
                                    :key="item.href"
                                    as-child
                                    :class="[
                                        DROPDOWN_CLASS[
                                            item.breakpoint as string
                                        ],
                                        classAttribute(
                                            item.color,
                                            'dropdown',
                                            isActive(item.href),
                                        ),
                                        `focus:bg-${item.color}-500/10`,
                                    ]"
                                    class="cursor-pointer rounded-none"
                                >
                                    <Link :href="item.href">
                                        <!-- The item recolors its focused text, so the label carries the menu color itself. -->
                                        <span
                                            :class="`text-${item.color}-600`"
                                            >{{ item.label }}</span
                                        >
                                    </Link>
                                </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>
