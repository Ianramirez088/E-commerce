"use strict";

import App from "./App.js";
import store from "./store/index.js";
import router from "./routes/index.js";

const { createApp } = Vue;

createApp(App).use(store).use(router).mount("#app");
