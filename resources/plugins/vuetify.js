import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify)

export default new Vuetify({
    theme: {
        themes: {
            light: {
                primary: '#CC915A',
                secondary: '#9A9590',
                accent: '#8c9eff',
                error: '#b71c1c',
                background: '#FAFBFE',
                active: '#CC915A',
                greyPrimary: '#CDC8C3',
                greyDark: '#9A9590',
                greyLight: '#F2F0EF',
                black: '#000000',
                red: '#DD7474',
                tableInOrder: '#EFB256',
                tableActive: '#6BC899',
                blue: '#5A95CC',
                brownDarker: '#48332E',
                orange: '#DAA407'
            },
        },
    },
})
