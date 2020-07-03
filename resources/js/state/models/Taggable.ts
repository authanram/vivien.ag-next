import { Fields, Model, Response } from '@/state/models/Model'

export default class Taggable extends Model {
    public static entity = 'taggables'

    public tag_id: number
    public taggable_id: number
    public taggable_type: string

    static primaryKey = ['tag_id', 'taggable_id', 'taggable_type']

    public static fields (): Fields {
        return {
            tag_id: this.attr(null),
            taggable_id: this.attr(null),
            taggable_type: this.attr(null),
        }
    }

    public static fetch (parameters: string = ''): Promise<Response> {
        return Taggable.api().get(`/public-api/taggables/fetch${parameters}`, {
            persistBy: 'insert',
            dataTransformer: ({ data, headers }) => data
        })
    }
}
