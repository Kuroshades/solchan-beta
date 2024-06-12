<script setup>
import { ref } from "vue";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import { Link } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { is_embed } from "@/functions";
import Embed from "./Embed.vue";
import { abbreviate_wallet } from "../functions";

dayjs.extend(relativeTime);

const props = defineProps({
    post: {
        type: Object,
        required: true,
    },
});

const thumb_is_expanded = ref(false);
onMounted(() => {
    console.log(props.post);
});
</script>

<template>
    <div
        class="grid rounded shadow-xl w-full"
        :class="{
            'bg-base-300': post.parent == 0,
            'bg-base-200': post.parent != 0,
        }"
    >
        <div v-if="post.tipper_tips.length > 0">
            <div
                class="bg-yellow-700 rounded-t text-white flex gap-4 items-center px-6 py-1"
            >
                <img
                    src="https://solchan.org/tip-coin-pixel.png"
                    width="30px"
                    height="30px"
                />
                <p>
                    This post included a tip of
                    <a
                        class="underline"
                        :href="`https://solscan.io/tx/${post.tipper_tips[0].tx}`"
                    >
                        {{ post.tipper_tips[0].amount }} Solchan
                    </a>
                </p>
            </div>
        </div>
        <div v-if="post.tipped_tips.length > 0">
            <div
                class="bg-yellow-700 rounded-t text-white flex gap-4 items-center px-6 py-1"
            >
                <img
                    src="https://solchan.org/tip-coin-pixel.png"
                    width="30px"
                    height="30px"
                />
                <p>
                    User was tipped
                    {{
                        post.tipped_tips.reduce(
                            (acc, tip) => acc + tip.amount,
                            0
                        )
                    }}
                    Solchan for this post
                </p>
            </div>
        </div>
        <div>
            <figure
                class="cursor-pointer float-left mr-4"
                @click="thumb_is_expanded = !thumb_is_expanded"
            >
                <img
                    :src="`${$page.props.app.alpha_url}/thumb/${post.thumb}`"
                    :width="post.thumb_width"
                    :height="post.thumb_height"
                    :alt="post.file_original"
                    v-if="!thumb_is_expanded"
                />
                <template v-else>
                    <Embed
                        v-if="is_embed(post.file_hex)"
                        v-html="post.file"
                    ></Embed>
                    <video
                        v-else-if="
                            post.file.endsWith('.webm') ||
                            post.file.endsWith('.mp4')
                        "
                        :width="post.image_width"
                        :height="post.image_height"
                        class="static inline"
                        controls
                        autoplay
                        loop
                    >
                        <source
                            :src="`${$page.props.app.alpha_url}/src/${post.file}`"
                        />
                    </video>
                    <img
                        v-else
                        :src="`${$page.props.app.alpha_url}/src/${post.file}`"
                        :width="post.image_width"
                        :height="post.image_height"
                        :alt="post.file_original"
                    />
                </template>
            </figure>
            <div>
                <div
                    class="flex gap-2 pt-1"
                    :class="{
                        'ml-4': !post.file,
                    }"
                >
                    <img
                        v-if="post.pfp && post.pfp.path != null"
                        class="w-16 lg:w-32"
                        :src="`${$page.props.app.alpha_url}/${post.pfp.path}`"
                        alt="PFP"
                    />
                    <img
                        v-else-if="post.pfp && post.pfp.pfp_link != ''"
                        class="w-16 lg:w-32"
                        :src="post.pfp.pfp_link"
                        alt="PFP"
                    />
                    <div class="flex flex-col h-fit">
                        <h2 class="card-title">{{ post.subject }}</h2>
                        <p v-if="post.name == ''" class="font-bold">
                            Anonymous
                        </p>
                        <p v-else :title="post.name" class="font-bold">
                            {{ abbreviate_wallet(post.name) }}
                        </p>
                        <p :title="dayjs(post.timestamp * 1000)">
                            {{ dayjs(post.timestamp * 1000).fromNow() }}
                        </p>
                        <hr class="border-accent/50" />
                    </div>
                    <div
                        class="text-2xl right-4 flex gap-2 ml-auto mr-4 pt-2"
                        :class="{
                            'lg:top-4 bottom-4': post.tipper_tips.length == 0,
                            'lg:top-12 bottom-4': post.tipper_tips.length > 0,
                        }"
                    >
                        <p v-if="post.parent == 0">OP</p>
                        <Link :href="route('posts.show', post.id)"
                            ><p>#{{ post.id }}</p></Link
                        >
                    </div>
                </div>
                <p class="mx-4 mb-2" v-html="post.message"></p>
                <slot />
            </div>
        </div>
    </div>
</template>
