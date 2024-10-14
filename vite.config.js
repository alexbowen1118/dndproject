import { defineConfig } from 'vite';
import { svelte } from "@sveltejs/vite-plugin-svelte";
import { rm } from 'node:fs/promises';
import * as path from 'path';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        svelte(),
            {
                name: "Clean assets folder",
                async buildStart() {
                    await rm(path.resolve(__dirname, 'public/assets/'), { recursive: true, force: true });
                }
            },
    ],
    resolve: {
        alias: {
            '@components': path.resolve(__dirname, 'resources/js/components'),
            '@vendor': path.resolve(__dirname, 'resources/vendor')
        }
    }
});
