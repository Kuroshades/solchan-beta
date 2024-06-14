<script setup>
import Logo from "../../images/logo.svg";
import { onMounted } from "vue";
import { themeChange } from "theme-change";
import { Link } from "@inertiajs/vue3";
import Nav from "@/Components/Nav.vue";
import { ref } from "vue";
const themes = [
    "cupcake",
    "bumblebee",
    "emerald",
    "corporate",
    "synthwave",
    "retro",
    "cyberpunk",
    "valentine",
    "halloween",
    "garden",
    "forest",
    "aqua",
    "lofi",
    "pastel",
    "fantasy",
    "wireframe",
    "black",
    "luxury",
    "dracula",
    "cmyk",
    "autumn",
    "business",
    "acid",
    "lemonade",
    "night",
    "coffee",
    "winter",
    "dim",
    "nord",
    "sunset",
];

const dark_themes = [
    "synthwave",
    "halloween",
    "forest",
    "aqua",
    "black",
    "luxury",
    "dracula",
    "business",
    "night",
    "coffee",
    "dim",
    "sunset",
];

const light_themes = [
    "cupcake",
    "bumblebee",
    "emerald",
    "corporate",
    "retro",
    "cyberpunk",
    "valentine",
    "garden",
    "lofi",
    "pastel",
    "fantasy",
    "wireframe",
    "cmyk",
    "autumn",
    "acid",
    "lemonade",
    "winter",
    "nord",
];

const is_dark = ref(window.matchMedia("(prefers-color-scheme: dark)").matches);

const theme_changed = (theme) => {
    if (dark_themes.includes(theme)) {
        is_dark.value = true;
    } else if (light_themes.includes(theme)) {
        is_dark.value = false;
    } else {
        is_dark.value = window.matchMedia(
            "(prefers-color-scheme: dark)"
        ).matches;
    }
};

const capitalize = (string) => {
    return string.charAt(0).toUpperCase() + string.slice(1);
};

onMounted(() => {
    themeChange(false);
});
</script>

<template>
    <div
        data-theme
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-base-100 selection:bg-accent selection:textarea-secondary"
        :class="{
            'bg-dots-darker': !is_dark,
            'bg-dots-lighter': is_dark,
        }"
    >
        <select
            v-on:change="theme_changed($event.target.value)"
            class="absolute top-2 right-2 select select-primary"
            data-choose-theme
        >
            <option value="">Default</option>
            <option v-for="theme in themes" :value="theme" :key="theme">
                {{ capitalize(theme) }}
            </option>
        </select>
        <div class="max-w-7xl mx-auto p-0 lg:p-8 w-full">
            <Link :href="route('posts.index')">
                <figure class="flex justify-center items-center">
                    <img
                        :src="Logo"
                        alt="Solchan Logo"
                        width="384px"
                        height="auto"
                    />
                </figure>
            </Link>
            <Nav />
            <slot />
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.1)'/%3E%3C/svg%3E");
}
.bg-dots-lighter {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.1)'/%3E%3C/svg%3E");
}
</style>
