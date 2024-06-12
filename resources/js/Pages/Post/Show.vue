<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Post from "../../Components/Post.vue";
import { onMounted } from "vue";
import { abbreviate_wallet } from "../../functions";
import SolchanLayout from "@/Layouts/SolchanLayout.vue";

const props = defineProps({
    post: {
        type: Object,
        required: true,
    },
});
</script>
<template>
    <Head :title="`Post #${post.id}`" />
    <SolchanLayout>
        <Post :post="post" />
    </SolchanLayout>
</template>
