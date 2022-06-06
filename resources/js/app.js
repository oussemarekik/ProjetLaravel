/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
import { createApp } from "vue";
import App from "./App.vue";
import axios from "axios";
import router from "./routes";
import "bootstrap/dist/css/bootstrap.min.css";
const app = createApp(App).use(router);
app.config.globalProperties.axios = axios;
app.mount("#app");
