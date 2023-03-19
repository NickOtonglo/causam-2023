require('./bootstrap');

import {createApp} from 'vue'
import router from './routes/index'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'

const globalOptions = {
    // debug: 'info',
    placeholder: 'Your article starts here...',
    // readOnly: true,
    theme: 'snow',
    content: {},
    contentType: 'delta'
}

const app = createApp({})
app.use(router)
QuillEditor.props.globalOptions.default = () => globalOptions
app.component('QuillEditor', QuillEditor)
app.use(VueSweetalert2)
app.mount('#app')
