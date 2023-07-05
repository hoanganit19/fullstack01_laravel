import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
// import react from "@vitejs/plugin-react";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        // laravel({
        //     input: ["resources/scss/app.scss", "resources/js/app.js"],
        //     refresh: true,
        // }),
        // laravel(["resources/jsx/app.jsx"]),
        // react(),
        laravel(["resources/vue/app.js"]),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
        },
    },
});
