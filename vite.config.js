import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import vue from "@vitejs/plugin-vue";
import * as fs from "fs";
import nodePolyfills from 'rollup-plugin-node-polyfills';

export default defineConfig({
    base: '',
    server: {
        https: {
            key: fs.readFileSync(path.join(__dirname, './.docker/nginx/cert.key')), // путь к ключу
            cert: fs.readFileSync(path.join(__dirname, './.docker/nginx/cert.crt')), // путь к сертификату
        },
        hmr: {
            protocol: 'wss', // Использование WebSocket Secure для HMR
            host: 'laravel.test',
        },
    },
    plugins: [
        vue(),
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        nodePolyfills(),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        },
    },
});
