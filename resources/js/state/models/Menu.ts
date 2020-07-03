import { Fields, Model } from '@/state/models/Model'
import { MenuItem } from '@/state/models'

export default class Menu extends Model {
    public static entity = 'menus'

    public slug: string

    // relations
    public menu_items: MenuItem[]

    public static fields (): Fields {
        return {
            id: this.attr(null),
            slug: this.string(null),

            // relations
            menu_items: this.hasMany(MenuItem, 'menu_id')
        }
    }

    public static fetch (): void {
        Menu.api().get('/public-api/menus', {
            dataTransformer: ({ data, headers }) => data
        })
    }
}
