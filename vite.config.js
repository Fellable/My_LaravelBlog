import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'
import vue from "@vitejs/plugin-vue";
import * as fs from "fs";
import rewrite from 'vite-plugin-rewrite'
import nodePolyfills from 'rollup-plugin-node-polyfills';

export default defineConfig({
    base: '',
    server: {

        hmr : {
            host: 'laravel.test'
        },

    },

    plugins: [
        vue(),
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        rewrite({
            '^/@vite/client': '/@vite/client',
        }), // Для НЕ https
        nodePolyfills(),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },

});
