import { Attribute, Collection, Fields, Item, Model as BaseModel } from '@vuex-orm/core'
import { Response } from '@vuex-orm/plugin-axios'
import config from '@/state/config'

class Model extends BaseModel {
    public id: number

    public static fields (): Fields {
        return {}
    }
}

export {
    config,
    Collection,
    Fields,
    Item,
    Attribute,
    Model,
    Response,
}
