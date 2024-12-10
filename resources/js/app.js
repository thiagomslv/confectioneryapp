import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

import { Head } from '@inertiajs/vue3';
import BackButton from '../js/Pages/BackButton.vue';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .component('Head', Head)
      .component('BackButton', BackButton)
      .use(plugin)
      .mount(el)
  },
})