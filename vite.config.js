import { defineConfig } from 'vite';
import { svelte } from "@sveltejs/vite-plugin-svelte";
import { rm } from 'node:fs/promises';
import * as path from 'path';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: 'public',
        manifest: true,
        emptyOutDir: false,
        copyPublicDir: false,
        rollupOptions: {
            input: {
                app: 'resources/js/app.js',
                css: 'resources/css/app.css',
            },
            output: {
                entryFileNames: 'assets/js/[name].js',
                chunkFileNames: 'assets/js/[name]-[hash].js',
                assetFileNames: (assetInfo) => {
                    let info = assetInfo.name.split(".");
                    let extType = info[info.length - 1];
                    if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(extType)) {
                        extType = "img";
                    } else if (/woff|woff2|ttf/.test(extType)) {
                        extType = "fonts";
                    }
                    return `assets/${extType}/[name][extname]`;
                },
            },
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
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
