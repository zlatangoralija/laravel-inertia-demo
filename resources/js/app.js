import './bootstrap';
import { createApp, h } from 'vue'
import {createInertiaApp, Link, Head} from '@inertiajs/vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from "./Shared/Layout.vue";

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

        let page = pages[`./Pages/${name}.vue`]
        if(page.default.layout === undefined){
            page.default.layout  = Layout
        }

        return pages[`./Pages/${name}.vue`]
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link', Link)
            .component('Head', Head)
            .mount(el)
    },

    title: title => `Interia app demo | ${title}`,
});

InertiaProgress.init({
    color: 'red',
    showSpinner: true,
});
