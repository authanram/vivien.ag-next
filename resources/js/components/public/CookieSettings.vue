<script setup lang="ts">
import { computed, ref } from 'vue';
import { useCookieConsent } from '@/composables/useCookieConsent';
import type { CookieConsent } from '@/composables/useCookieConsent';
import type { CookieConsentCookieResource } from '@/types/public';

const props = defineProps<{ cookies: CookieConsentCookieResource[] }>();

const { read, write } = useCookieConsent();
const consent = ref<CookieConsent>(read());

const categories = computed(() =>
    props.cookies.reduce<
        {
            name: string;
            required: boolean;
            cookies: CookieConsentCookieResource[];
        }[]
    >((groups, cookie) => {
        const last = groups.at(-1);

        if (last?.name === cookie.cookie_category) {
            last.cookies.push(cookie);
        } else {
            groups.push({
                name: cookie.cookie_category,
                required: cookie.required,
                cookies: [cookie],
            });
        }

        return groups;
    }, []),
);

function isAllowed(category: { name: string; required: boolean }): boolean {
    return (
        category.required ||
        Boolean(consent.value.all || consent.value[category.name.toLowerCase()])
    );
}

function toggle(category: { name: string; required: boolean }): void {
    if (category.required) {
        return;
    }

    consent.value = isAllowed(category)
        ? { functional: true }
        : { functional: true, [category.name.toLowerCase()]: true };

    write(consent.value);
}
</script>

<template>
    <div class="rounded-b-md text-xs">
        <div class="flex h-12 items-center border-t">
            <div class="w-1/3 px-2 pl-8">Name</div>
            <div class="w-2/12 px-2">Anbieter</div>
            <div class="w-1/12 px-2">Typ</div>
            <div class="w-2/12 pr-0">Verschlüsselt</div>
            <div class="w-2/12 pr-0 pl-4">Zulassen</div>
        </div>

        <template v-for="category in categories" :key="category.name">
            <div
                class="flex h-12 items-center justify-between border-t pr-16 pl-8"
            >
                <div class="leading-none font-semibold">
                    {{ category.name }}
                </div>
                <div class="mr-[3px] pr-1">
                    <span class="inline-block pt-[3px]">
                        <button
                            type="button"
                            role="checkbox"
                            :aria-checked="isAllowed(category)"
                            :aria-label="category.name"
                            :disabled="category.required"
                            class="relative inline-flex h-5 w-10 shrink-0 rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-hidden disabled:pointer-events-none disabled:opacity-50"
                            :class="
                                isAllowed(category)
                                    ? 'bg-green-600'
                                    : 'bg-gray-200'
                            "
                            @click="toggle(category)"
                        >
                            <span
                                aria-hidden="true"
                                class="relative inline-block h-4 w-4 transform rounded-full bg-white shadow-sm transition duration-200 ease-in-out"
                                :class="
                                    isAllowed(category)
                                        ? 'translate-x-5'
                                        : 'translate-x-0'
                                "
                            >
                                <span
                                    class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                                    :class="
                                        isAllowed(category)
                                            ? 'opacity-0 duration-100 ease-out'
                                            : 'opacity-100 duration-200 ease-in'
                                    "
                                >
                                    <svg
                                        class="h-3 w-3 text-gray-400"
                                        fill="none"
                                        viewBox="0 0 12 12"
                                    >
                                        <path
                                            d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            stroke="currentColor"
                                        />
                                    </svg>
                                </span>
                                <span
                                    class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                                    :class="
                                        isAllowed(category)
                                            ? 'opacity-100 duration-200 ease-in'
                                            : 'opacity-0 duration-100 ease-out'
                                    "
                                >
                                    <svg
                                        class="h-3 w-3 text-green-700"
                                        fill="currentColor"
                                        viewBox="0 0 12 12"
                                    >
                                        <path
                                            d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z"
                                        />
                                    </svg>
                                </span>
                            </span>
                        </button>
                    </span>
                </div>
            </div>

            <div
                v-for="cookie in category.cookies"
                :key="cookie.id"
                class="border-t"
            >
                <div class="flex h-12 items-center bg-gray-100 text-xs">
                    <div class="w-1/3 px-2 pl-8 font-medium">
                        {{ cookie.cookie_name }}
                    </div>
                    <div class="w-2/12 px-2">
                        <a
                            :href="cookie.provider.url"
                            class="hover:underline"
                            target="_blank"
                        >
                            {{ cookie.provider.name }}
                        </a>
                    </div>
                    <div class="w-1/12 px-2">{{ cookie.cookie_type }}</div>
                    <div class="w-2/12 px-2 pr-0">
                        <span v-if="cookie.encrypted" class="text-green-700">
                            ja
                        </span>
                        <span v-else class="text-red-700">nein</span>
                    </div>
                </div>
                <div
                    class="w-full border-t bg-gray-200 px-8 py-6"
                    :class="{ 'rounded-b-lg': cookie === cookies.at(-1) }"
                >
                    <span v-html="cookie.cookie_purpose" />
                </div>
            </div>
        </template>
    </div>
</template>
