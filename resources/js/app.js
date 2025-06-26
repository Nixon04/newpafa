import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import 'bootstrap/dist/css/bootstrap.css';
import { createPinia } from 'pinia';
import './Pages/assets/style.css';
import './Pages/assets/media.css';

const pinia = createPinia();

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
     // ⚠️ Add global warning handler
     app.config.warnHandler = (msg, vm, trace) => {
      console.warn('[Vue warning]:', msg, trace);
    };

    // 🧨 Optional: Add global error handler
    app.config.errorHandler = (err, vm, info) => {
      console.error('[Vue error]:', err, info);
    };

    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(pinia)
      .mount(el)
  },
})