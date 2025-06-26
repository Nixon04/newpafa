import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
import ip from 'ip';
import path from 'path';

export default defineConfig({
    
    build: {
        sourcemap: true,
        minify: true,
        chunkSizeWarningLimit: 1600, // Adjust the limit as necessary
        rollupOptions: {
            output: {
                manualChunks(id) {
                    // Create separate chunks for node_modules
                    if (id.includes('node_modules')) {
                        return id.split('node_modules/')[1].split('/')[0]; // Chunk by package name
                    }
                }   
            }
        }
    },

    resolve:{
        alias: {
            '@' : path.resolve(__dirname, 'resources/js'),
        },
    },
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],

    // server:{
    //     host: ip.address(),
    //     port: '5713',
    // }
});
