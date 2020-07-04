import { Fields, Model } from '@/state/models/Model'
//import { Session } from '@/state/models'

export default class User extends Model {
    public static entity = 'users'

    public email: string
    public name: string

    // relations
    //public sessions: Session[]

    public static fields (): Fields {
        return {
            id: this.attr(null),
            email: this.string(null),
            name: this.string(null),

            // relations
            //session: this.hasMany(Session, 'user_id', 'id')
        }
    }
}
