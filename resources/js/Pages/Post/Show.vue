<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Post from "../../Components/Post.vue";
import { onMounted } from "vue";
import { abbreviate_wallet } from "../../functions";

const props = defineProps({
    post: {
        type: Array,
        required: true,
    },
});
</script>
<template>
    <Head :title="`Post #${post.id}`" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <Post :post="post" />
        </div>
    </div>
</template>
