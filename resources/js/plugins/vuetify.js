import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import colors from "vuetify/lib/util/colors";

Vue.use(Vuetify)

const opts = {
    icons: {
        iconfont: 'mdiSvg', // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
    },
    theme: {
        themes: {
            light: {
                primary: '#303F9F',
                secondary: '#424242',
                accent: '#B79CED',
                error: '#EF3E36',
                info: '#17BEBB',
                success: '#548C2F',
                warning: '#D65108'
            }
        }
    }
}

export default new Vuetify(opts)
