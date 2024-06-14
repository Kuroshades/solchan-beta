<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Post from "../../Components/Post.vue";
import { onMounted } from "vue";
import { abbreviate_wallet } from "../../functions";
import SolchanLayout from "@/Layouts/SolchanLayout.vue";

const props = defineProps({
    posts: {
        type: Array,
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    tips_given: {
        type: Number,
        required: true,
    },
    tips_received: {
        type: Number,
        required: true,
    },
});

onMounted(() => {
    console.log(props.posts);
});
</script>

<template>
    <Head :title="`${name}'s Profile`" />

    <SolchanLayout>
        <div class="flex flex-col items-center space-y-4">
            <h1
                class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100"
            >
                {{ abbreviate_wallet(name) }}'s Profile
            </h1>
            <div class="grid grid-cols-2">
                <p class="text-center text-gray-600 dark:text-gray-400">
                    TIPS GIVEN
                </p>
                <p class="text-center text- gray-600 dark:text-gray-400">
                    TIPS RECEIVED
                </p>
                <p
                    class="text-center text- gray-600 dark:text-gray-400 font-bold"
                >
                    <!-- Sum the array.tipper_tips[].amount -->
                    {{ tips_given }}
                </p>
                <p
                    class="text-center text- gray-600 dark:text-gray-400 font-bold"
                >
                    {{ tips_received }}
                </p>
            </div>
        </div>
        <div
            class="flex flex-wrap gap-4 justify-center overflow-x-auto max-w-7xl mx-auto lg:p-8"
        >
            <Post v-for="post in props.posts" :post="post" :key="post.id" />
        </div>
    </SolchanLayout>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
