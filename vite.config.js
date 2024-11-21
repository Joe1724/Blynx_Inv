import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/sass/app.scss', 'resources/js/app.js'], // Correct path
      refresh: true,
    }),
  ],
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "resources/sass/_variables.scss";`, // Include global SCSS variables or mixins if needed
      },
    },
  },
});
