import "./bootstrap";
import "../css/app.css";
import "../css/app.scss";
import "../css/dashboard.css";
import "../css/button.css";
import "../css/dropdown.scss";
import "../css/input.css";

import "primevue/resources/themes/viva-light/theme.css";
import "primeicons/primeicons.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import Checkbox from "@/Components/Checkbox.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Dropdown from "@/Components/Dropdown.vue";
import RadioBox from "@/Components/RadioBox.vue";
import Timer from "@/Components/Timer.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import PrimeVue from "primevue/config";
import FormatService from "@/Services/FormatService";
// Primevue components

import Calendar from "primevue/calendar";

import { Head, Link } from "@inertiajs/vue3";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(PrimeVue)
            .use(PrimeVue, { unstyled: true })
            .component("Checkbox", Checkbox)
            .component("PrimaryButton", PrimaryButton)
            .component("TextInput", TextInput)
            .component("Head", Head)
            .component("Link", Link)
            .component("AuthenticatedLayout", AuthenticatedLayout)
            .component("AdminAuthenticatedLayout", AdminAuthenticatedLayout)
            .component("Dropdown", Dropdown)
            .component("Calendar", Calendar)
            .component("RadioBox", RadioBox)
            .component("Timer", Timer)
            .mixin(FormatService)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
