import './bootstrap'
import '../css/app.css'

// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-ignore
import ColorInput from 'vue-color-input'
import vuetify from './vuetify'
import Notification from 'notiwind'

import { createApp, DefineComponent, h } from 'vue'
import { createPinia } from 'pinia'
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m'

const appName =
  window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel'

// noinspection JSIgnoredPromiseFromCall
createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) =>
    resolvePageComponent(
      `./Pages/${name}.vue`,
      import.meta.glob('./Pages/**/*.vue')
    ) as Promise<DefineComponent>,
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
      .use(createPinia())
      .use(plugin)
      .use(ColorInput)
      .use(vuetify)
      .use(Notification)
      .use(ZiggyVue, Ziggy)
    app.mount(el)
  },
  progress: {
    color: '#4B5563',
  },
})
