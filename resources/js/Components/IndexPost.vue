<script setup>
import Post from "./Post.vue";
const props = defineProps({
    post: {
        type: Object,
        required: true,
    },
});
</script>
<template>
    <div class="flex flex-col gap-2 w-full max-w-7xl">
        <Post :post="post" />
        <Post
            v-for="post in post.replies.sort((a, b) => a.id - b.id)"
            :key="post.id"
            :post="post"
        />
    </div>
</template>
