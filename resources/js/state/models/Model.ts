import { Fields, Model as BaseModel } from '@vuex-orm/core'
import { Response } from '@vuex-orm/plugin-axios'
import config from '@/state/config'

class Model extends BaseModel {
    public id: number | string

    public static fields (): Fields {
        return {}
    }
}

export {
    config,
    Fields,
    Model,
    Response,
}
