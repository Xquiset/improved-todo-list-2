require('@/bootstrap');

import Vue from 'vue';
import vuetify from "@/plugins/vuetify";
import { App as InertiaApp, plugin as InertiaPlugin } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress";

Vue.use(InertiaPlugin);

const el = document.getElementById('app');

new Vue({
    vuetify,
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default,
        },
    }),
}).$mount(el);

InertiaProgress.init( {color: '#264a7f'});
Vue.prototype.$route = route;
Vue.mixin(require('@/plugins/translation'))
