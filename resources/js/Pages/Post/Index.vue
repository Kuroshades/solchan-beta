<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { onMounted } from "vue";
import Pagination from "../../Components/Pagination.vue";
import IndexPost from "../../Components/IndexPost.vue";
import SolchanLayout from "@/Layouts/SolchanLayout.vue";
import { ref } from "vue";

const props = defineProps({
    posts: {
        type: Object,
        required: true,
    },
});

onMounted(() => {
    console.log(props.posts);
});
</script>
<template>
    <SolchanLayout>
        <section class="w-full max-w-7xl flex flex-col gap-4">
            <IndexPost v-for="post in posts.data" :key="post.id" :post="post" />
        </section>

        <Pagination :links="posts.links" />
    </SolchanLayout>
</template>
