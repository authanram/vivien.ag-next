import Vue from 'vue'

import UiActivities from '@/components/ui-activities/UiActivities.vue'
import UiCard from '@/components/UiCard.vue'
import UiCoords from '@/components/ui-coords/UiCoords.vue'
import UiIcon from '@/components/UiIcon.vue'
import UiIntersect from '@/components/UiIntersect.vue'
import UiMenu from '@/components/ui-menu/UiMenu.vue'
import UiPlaceholder from '@/components/ui-placeholder/UiPlaceholder.vue'
import UiPlaceholderHeading from '@/components/ui-placeholder/UiPlaceholderHeading.vue'
import UiPlaceholderTags from '@/components/ui-placeholder/UiPlaceholderTags.vue'
import UiSlider from '@/components/UiSlider.vue'
import UiTag from '@/components/UiTag.vue'
import UiTooltip from '@/components/UiTooltip.vue'

Vue.component('ui-activities', UiActivities)
Vue.component('ui-card', UiCard)
Vue.component('ui-coords', UiCoords)
Vue.component('ui-icon', UiIcon)
Vue.component('ui-intersect', UiIntersect)
Vue.component('ui-menu', UiMenu)
Vue.component('ui-placeholder', UiPlaceholder)
Vue.component('ui-placeholder-heading', UiPlaceholderHeading)
Vue.component('ui-placeholder-tags', UiPlaceholderTags)
Vue.component('ui-slider', UiSlider)
Vue.component('ui-tag', UiTag)
Vue.component('ui-tooltip', UiTooltip)

Vue.component('form-button', () => import('@/components/forms/FormButton.vue'/* webpackChunkName: "form-button" */))
Vue.component('form-error', () => import('@/components/forms/FormError.vue'/* webpackChunkName: "form-error" */))
Vue.component('ripple', () => import('@/components/Ripple.vue'/* webpackChunkName: "ripple" */))
Vue.component('ui-cookie-consent', () => import('@/components/ui-cookie-consent/UiCookieConsent.vue'/* webpackChunkName: "ui-cookie-consent" */))
Vue.component('ui-dropdown', () => import('@/components/UiDropdown.vue'/* webpackChunkName: "ui-dropdown" */))
Vue.component('ui-loading', () => import('@/components/UiLoading.vue'/* webpackChunkName: "ui-loading" */))
Vue.component('ui-modal', () => import('@/components/ui-modal/UiModal.vue'/* webpackChunkName: "ui-modal" */))
Vue.component('ui-modal-confirm', () => import('@/components/ui-modal/UiModalConfirm.vue'/* webpackChunkName: "ui-modal-confirm" */))
Vue.component('ui-overlay', () => import('@/components/UiOverlay.vue'/* webpackChunkName: "ui-overlay" */))
Vue.component('ui-quote', () => import('@/components/UiQuote.vue'/* webpackChunkName: "ui-quote" */))
Vue.component('ui-toggle', () => import('@/components/UiToggle.vue'/* webpackChunkName: "ui-toggle" */))
