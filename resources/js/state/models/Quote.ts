import { Fields, Model } from '@/state/models/Model'
import { Author } from '@/state/models'

export default class Quote extends Model {
    public static entity = 'quotes'

    public body: string
    public author: Author

    public static fields (): Fields {
        return {
            id: this.attr(null),
            body: this.string(null),
            author_id: this.attr(null),

            // relations
            author: this.belongsTo(Author, 'author_id'),
        }
    }

    public static random (): void {
        Quote.api().get('/public-api/quotes/random', {
            persistBy: 'insert',
            dataTransformer: ({ data, headers }) => data
        })
    }
}
