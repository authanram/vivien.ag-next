import {Fields, Model} from '@/state/models/Model'
import {Image} from '@/state/models'

export default class ImageCoord extends Model {
    public static entity = 'image_coords'

    public image_id: number
    public coords: object
    public order_column: number

    // custom
    public coordsParsed: string

    // relations
    public image: Image

    public static fields (): Fields {
        return {
            id: this.attr(null),
            image_id: this.attr(null),
            coords: this.attr(null),
            order_column: this.number(null),

            // custom
            coordsParsed: this.string(null),

            // relations
            image: this.belongsTo(Image, 'image_id'),
        }
    }
}
