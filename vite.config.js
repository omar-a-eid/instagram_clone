import livewire from "@defstudio/vite-livewire-plugin"; // Here we import it
import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: false,
        }),
        livewire({
            refresh: ["resources/css/app.css"],
        }),
    ],
});
