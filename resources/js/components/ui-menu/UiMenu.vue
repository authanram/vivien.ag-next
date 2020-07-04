<template>
    <nav v-if="getMenus.length">
        <div
            v-if="border"
            class="absolute border-gray-200 left-0 right-0 z-20"
            style="bottom:-1px;border-width:3px"
        ></div>
        <div class="flex h-16 items-center relative z-20">
            <slot :data="{ classAttribute }" />
            <div class="flex h-full justify-between w-full">
                <!-- horizontal -->
                <div :class="{ 'h-full inline-flex items-center' : menuItems.length }">
                    <template v-for="(menuItem, index) in menuItems">
                        <ui-menu-item
                            :key="`menuItem-${index}`"
                            :class="[makeClassList(menuItem)]"
                            :menu-item="menuItem"
                            class="h-full inline-flex"
                        />
                    </template>
                </div>
                <!-- mobile / fallback -->
                <ui-dropdown
                    v-if="menuItemsDropdown.length"
                    :key="`dropdown-${breakpoint.current}`"
                >
                    <template v-for="(menuItem, index) in menuItemsDropdown">
                        <ui-menu-item
                            :key="`dropdownMenuItem-${index}`"
                            :class="makeClassList(menuItem, 'dropdown')"
                            :menu-item="menuItem"
                        />
                    </template>
                </ui-dropdown>
            </div>
        </div>
    </nav>
</template>

<script lang="ts">
    import { Menu, MenuItem } from '@/state/models'
    import Breakpoint from '../mixins/Breakpoint'
    import configuration from '@/config/ui-menu'

    export default {
        components: {
            'ui-menu-item': () => import('@/components/ui-menu/UiMenuItem.vue'),
        },

        mixins: [Breakpoint],

        props: {
            border: {
                default: false,
                required: false,
                type: Boolean,
            },
            routeNameCurrent: {
                default: null,
                required: false,
                type: String,
            },
            slug: {
                default: null,
                required: false,
                type: String,
            },
            urlSlot: {
                default: null,
                required: false,
                type: String,
            },
        },

        computed: {
            menuItems (): MenuItem[] {
                return this.filterMenuItems((item): boolean =>
                    !item.dropdown_breakpoint || this.breakpoint.ge(item.dropdown_breakpoint))
            },

            menuItemsDropdown (): MenuItem[] {
                return this.filterMenuItems((item): boolean =>
                    item.dropdown_breakpoint && this.breakpoint.le(item.dropdown_breakpoint, true))
            },

            getMenus (): Menu[] {
                return Menu.query()
                   .with('menu_items')
                   .with('menu_items.route')
                   .with('menu_items.color')
                   .get() as Menu[]
            },
        },

        methods: {
            filterMenuItems (callback: Function): MenuItem[] {
                return this.getMenuBySlug(this.slug).menu_items.filter((item: MenuItem) => {
                    return item.published && callback(item)
                })
            },

            classAttribute (color: string, type = 'default', active = false): string {
                const classList = configuration.types[type].default.join(' ')

                const classListActive = active ? configuration.types[type].active.join(' ') : ''

                let classListBorder = ''

                if (type !== 'dropdown') {
                    classListBorder = this.classAttributeBorder(this.border, active).join(' ')
                }

                const classLists = [classList, classListActive, classListBorder]

                return this.replaceAll(classLists.join(' ').trim(), color)
            },

            classAttributeBorder (border: boolean, active: boolean): string[] {
                if (!border) {
                    return []
                }

                const classLists = configuration.types.border

                const classList = [classLists.default.join(' ')]

                if (active) {
                    classList.push(classLists.active.join(' '))
                }

                return classList
            },

            getMenuBySlug (slug: string): Menu {
                return this.getMenus
                    .filter((menu: Menu) => menu.slug === slug.toLowerCase())[0]
            },

            makeClassList (menuItem: MenuItem, type = 'default'): string[] {
                const isActive = this.routeNameCurrent === menuItem.route.route
                return this.classAttribute(menuItem.color.color, type, isActive)
            },

            replaceAll (value: string, replace: string, search = '%s'): string {
                return value.replace(RegExp(search, 'g'), replace)
            },
        },
    }
</script>
