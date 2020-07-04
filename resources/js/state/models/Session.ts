import { Fields, Model } from '@/state/models/Model'
//import { User } from '@/state/models'

export default class Session extends Model {
    public static entity = 'sessions'

    public user_id: number
    public ip_address: string
    public user_agent: string
    public payload: object
    public lastActivity: string

    // relations
    //public user: User

    public static fields (): Fields {
        return {
            id: this.attr(null),
            user_id: this.attr(null),
            ip_address: this.string(null),
            user_agent: this.string(null),
            payload: this.string(null),
            last_activity: this.string(null),

            // relations
            //user: this.belongsTo(User, 'user_id')
        }
    }
}
