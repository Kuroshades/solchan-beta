<script setup>
import { ref } from "vue";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";

dayjs.extend(relativeTime);

const props = defineProps({
    post: {
        type: Object,
        required: true,
    },
});

const thumb_is_expanded = ref(false);
</script>

<template>
    <div class="card relative lg:card-side bg-base-100 shadow-xl w-full">
        <figure
            class="cursor-pointer"
            @click="thumb_is_expanded = !thumb_is_expanded"
        >
            <img
                :src="`${$page.props.app.alpha_url}/thumb/${post.thumb}`"
                :width="post.thumb_width"
                :height="post.thumb_height"
                :alt="post.file_original"
                v-if="!thumb_is_expanded"
            />
            <img
                v-else
                :src="`${$page.props.app.alpha_url}/src/${post.file}`"
                :width="post.file_width"
                :height="post.file_height"
                :alt="post.file_original"
            />
        </figure>
        <div class="card-body">
            <div class="absolute text-2xl right-4 top-4 flex gap-2">
                <p v-if="post.parent == 0">OP</p>
                <p>#{{ post.id }}</p>
            </div>
            <div class="flex gap-2">
                <img
                    v-if="post.pfp.pfp_link"
                    width="100px"
                    height="100px"
                    :src="post.pfp.pfp_link"
                    alt="PFP"
                />
                <div class="flex flex-col h-fit">
                    <h2 class="card-title">{{ post.subject }}</h2>
                    <p class="font-bold">{{ post.name }}</p>
                    <p :title="dayjs(post.timestamp * 1000)">
                        {{ dayjs(post.timestamp * 1000).fromNow() }}
                    </p>
                    <hr class="dark:border-white/50 border-black/50" />
                    <p v-html="post.message"></p>
                </div>
            </div>
        </div>
    </div>
</template>
