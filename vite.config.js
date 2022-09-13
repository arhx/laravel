import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/admin.scss',
                'resources/js/admin.js',
                'resources/sass/public.scss',
                'resources/js/public.js',
            ],
            refresh: true,
        }),
    ],
});
