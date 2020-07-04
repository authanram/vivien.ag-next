import Vue from 'vue'
import '@/bootstrap'
import VueContentPlaceholders from 'vue-content-placeholders/index'
import { Breakpoint } from '@/Breakpoint'

import PluginIsTouch from '@/plugins/is-touch'
import PluginVue from '@/plugins/vue'
import PluginVuePortal from '@/plugins/vue-portal'
import PluginVueRouter from '@/plugins/vue-router'
import PluginVuex from '@/plugins/vuex'

import {router} from '@/router'
import * as models from '@/state/models'
import '@/components'

Vue.use(VueContentPlaceholders)
Vue.use(PluginIsTouch)
Vue.use(PluginVuePortal)
Vue.use(PluginVue)
Vue.use(PluginVueRouter)
Vue.use(PluginVuex)

Vue.prototype.$axios = window.axios
Vue.prototype.$event = new Vue()
//
Vue.prototype.$accent = window.ACCENT
Vue.prototype.$initial = window.INITIAL
Vue.prototype.$breakpoint = new Breakpoint

new Vue({
    comments: true,

    el: '#app',

    mounted (): void {
        Object.keys(window['INITIAL_STATE'])
              .forEach((key: string) => {
                  const model = `${key[0].toUpperCase()}${key.slice(1)}`

                  if (!models[model]) {
                      throw Error(`Invalid model: ${model}`)
                  }

                  const data = window['INITIAL_STATE'][key]

                  if (!data) {
                      return
                  }

                  models[model].insert({data})
              })

        models.Activity.recent();

        models.Quote.random()
    },

    router,
})
