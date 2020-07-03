import { Fields, Model } from '@/state/models/Model'
import { Color, Menu, Route } from '@/state/models'

export default class MenuItem extends Model {
    public static entity = 'menu_items'

    static primaryKey = ['menu_id', 'route_id', 'color_id']

    public color_id: number
    public menu_id: number
    public route_id: number
    public label: string
    public dropdown_breakpoint: string | null
    public published: boolean

    // relations
    public color: Color
    public menu: Menu
    public route: Route

    public static fields (): Fields {
        return {
            color_id: this.attr(null),
            menu_id: this.attr(null),
            route_id: this.attr(null),
            label: this.string(null),
            dropdown_breakpoint: this.attr(null),
            published: this.boolean(null),

            // relations
            color: this.belongsTo(Color, 'color_id'),
            menu: this.belongsTo(Menu, 'menu_id'),
            route: this.belongsTo(Route, 'route_id'),
        }
    }
}
