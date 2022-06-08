import { createApp, h } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import Notifications from 'notiwind'
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue';
import { Ziggy } from "./ziggy";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import 'flowbite';

InertiaProgress.init();

createInertiaApp({
    resolve: async (name) => {
        return (await import(`./Pages/${name}`)).default;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Toast)
            .use(ZiggyVue, Ziggy)
            .use(Notifications)
            .component("Link", Link)
            .component("Head", Head)
            .mixin({ methods: { route } })
            .mount(el);
    },
});
