import { AxiosInstance } from 'axios'

declare global {
    interface Document {
        documentMode?: any // eslint-disable-line
    }

    interface Window {
        axios: AxiosInstance,
        //
        ACCENT: string
        INITIAL: object
        INITIAL_STATE: object
    }
}
