import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { viteStaticCopy } from 'vite-plugin-static-copy'

export default defineConfig({
    build: {
        outDir: './public_html/build/'
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/src/assets/main.scss",
                "resources/sass/app.scss",
                "resources/js/app.js"
            ],
            publicDirectory: "public_html",
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: "resources/src/assets/img",
                    dest: "../assets",
                },
            ],
            publicDirectory: "public_html",
        }),
    ],
});
