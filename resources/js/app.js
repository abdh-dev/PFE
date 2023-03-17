import './bootstrap';
import '../css/app.css';

import ColorInput from 'vue-color-input'
import vuetify from "./vuetify";
import Notification from "notiwind"

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import clickOutside from "./directives/ClickOutside";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ColorInput)
            .use(vuetify)
            .use(Notification)
            .use(ZiggyVue, Ziggy)
            .directive("click-outside", clickOutside)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
