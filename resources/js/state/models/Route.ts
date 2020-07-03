import { Fields, Model } from '@/state/models/Model'
import { MenuItem } from '@/state/models'

export default class Route extends Model {
    public static entity = 'routes'

    public path: string
    public route: string
    public published: boolean

    // relations
    public menu_items: MenuItem[]

    public static fields (): Fields {
        return {
            id: this.attr(null),
            path: this.string(null),
            route: this.string(null),
            published: this.boolean(null),

            // relations
            menu_items: this.hasMany(MenuItem, 'route_id')
        }
    }
}
