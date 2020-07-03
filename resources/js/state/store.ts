import axios from 'axios'
import Vue from 'vue'
import Vuex from 'vuex'
import VuexORM from '@vuex-orm/core'
import VuexORMAxios from '@vuex-orm/plugin-axios'
import * as models from '@/state/models'
import modules from '@/state/modules'

Vue.use(Vuex)

const database = new VuexORM.Database()
Object.values(models).forEach((model) => database.register(model, modules[model.entity]))

VuexORM.use(VuexORMAxios, {
    axios,
    headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
    withCredentials: true,
})

const store = new Vuex.Store({
    actions: {},
    modules: { ...modules },
    mutations: {},
    plugins: [
        VuexORM.install(database),
    ],
})

Vue.prototype.$state = store

export default store
