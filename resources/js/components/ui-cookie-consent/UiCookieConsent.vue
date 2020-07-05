<template>
    <div>
        <div
            v-if="loading"
            class="border-t pl-8 pb-3 pt-3 text-xs"
        >
            Cookie-Einstellungen werden geladen . . .
        </div>
        <div
            v-else
            class="rounded-b-md text-xs"
        >
            <div class="border-t flex h-12 items-center">
                <div class="px-2 pl-8 w-1/3">
                    Name
                </div>
                <div class="px-2 w-2/12">
                    Anbieter
                </div>
                <div class="px-2 w-1/12">
                    Typ
                </div>
                <div class="pr-0 w-2/12">
                    Verschlüsselt
                </div>
                <div class="pl-4 pr-0 w-2/12">
                    Zulassen
                </div>
            </div>
            <template v-for="(cookie, index) in cookies">
                <ui-cookie-consent-category
                    v-if="!cookies[index-1] || cookie.cookie_category !== cookies[index-1].cookie_category"
                    :category="cookie.cookie_category"
                    :cookie-name="cookieName"
                    :toggle-value="index === 0"
                    :toggle-disabled="index === 0"
                    @changed="(value) => update(cookie, value)"
                />
                <div
                    :key="`cookie-${index}`"
                    class="border-t"
                >
                    <div class="bg-gray-100 flex h-12 items-center text-xs">
                        <div class="font-medium px-2 pl-8 w-1/3">
                            {{ cookie.cookie_name }}
                        </div>
                        <div class="px-2 w-2/12">
                            <a
                                :href="cookie.cookie_provider.url"
                                class="hover:underline"
                                target="_blank"
                            >
                                {{ cookie.cookie_provider.name }}
                            </a>
                        </div>
                        <div class="px-2 w-1/12">
                            {{ cookie.cookie_type }}
                        </div>
                        <div class="px-2 pr-0 w-2/12">
                            <span
                                v-if="cookie.encrypted"
                                class="text-green-700"
                            >
                                ja
                            </span>
                            <span
                                v-else
                                class="text-red-700"
                            >
                                nein
                            </span>
                        </div>
                    </div>
                    <div
                        :class="{ 'rounded-b-lg': cookies.length - 1 === index }"
                        class="bg-gray-200 border-t px-8 py-6 w-full"
                    >
                        <span v-html="cookie.cookie_purpose" />
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<script lang="ts">
    import CookieConsentCookie from '@/state/models/CookieConsentCookie'

    export default {
        components: {
            'ui-cookie-consent-category': () => import('@/components/ui-cookie-consent/UiCookieConsentCategory.vue'/* webpackChunkName: "ui-cookie-consent-category" */)
        },

        props: {
            cookieDomain: {
                required: true,
                type: String,
            },
            cookieLifetime: {
                required: true,
                type: Number,
            },
            cookieName: {
                required: true,
                type: String,
            },
            cookieSecure: {
                required: true,
                type: Boolean,
            },
            sameSite: {
                required: false,
                type: Boolean,
            },
            updateRoute: {
                required: true,
                type: String,
            },
        },

        computed: {
            cookies (): CookieConsentCookie[] {
                return CookieConsentCookie
                    .query()
                    .with('cookie_provider')
                    .orderBy('cookie_name')
                    .orderBy('cookie_category')
                    .get()
            },
        },

        data: function (): object {
            return {
                category: null,
                loading: true,
            }
        },

        methods: {
            showCategory (cookie: CookieConsentCookie): boolean {
                if (cookie.cookie_category === this.category) {
                    return false
                }

                this.category = cookie.cookie_category

                return true
            },

            update (cookie: CookieConsentCookie, value: boolean): void {
                const cookieData = { functional: true }

                if (value) {
                    cookieData[cookie.cookie_category.toLowerCase()] = value
                }

                window['jscookie'].set(this.cookieName, cookieData, {
                    domain: this.cookieDomain,
                    expires: this.cookieLifetime,
                    path: `/${this.cookieSecure ? 'secure' : ''}`,
                    samesite: this.sameSite,
                    secure: this.cookieSecure,
                })

                this.$axios.post(this.updateRoute, {
                    value: cookieData,
                })
            },
        },

        created (): void {
            CookieConsentCookie.fetch().then(() => {
                this.loading = false
            })
        },
    }
</script>
