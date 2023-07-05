import { createApp } from "vue";

import Home from "./components/Home.vue";
import Report from "./components/Report.vue";
import Form from "./components/Form.vue";

const app = createApp({});

app.component("Home", Home);
app.component("Report", Report);
app.component("form-html", Form);

app.mount(".app");
