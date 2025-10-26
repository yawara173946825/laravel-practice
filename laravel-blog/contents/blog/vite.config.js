import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react'; // 追加

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.jsx'], // app.js → app.jsx に変更
            refresh: true,
        }),
        react(), // Reactプラグインを有効化
    ],
});
