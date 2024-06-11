<script setup>

import { Head, Link } from "@inertiajs/vue3";
import { onMounted } from "vue";
import Pagination from "../../Components/Pagination.vue";
import { ref } from 'vue';

const form = ref({
  name: '',
  subject: '',
  message: '',
  embed: '',
  password: '',
  spoiler: false,
});

const props = defineProps({
  posts: Object,
});

console.log(props.posts);

</script>
<template>
  <div class="container mx-auto grid gap-4 min-h-screen" :style="{ backgroundColor: '#FFFFEE' }">
    <!-- First Row: Logo -->
    <div class="row-span-1 flex justify-center items-center">
      <img src="/images/logo.png" alt="Solchan Logo" class="max-w-sm">
    </div>

    <!-- Second Row: Form -->
    <div class="flex justify-center items-center">
      <form class="w-full max-w-lg grid grid-cols-4 gap-1">
        <div class="flex items-center col-span-1" :style="{ backgroundColor: '#EEAA88' }">
          <label class="block tracking-wide text-md font-bold ml-2 mb-2" for="name" :style="{ color: '#800000' }">
            Name
          </label>
        </div>
        <div class="col-span-3 flex items-center">
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="name" type="text" placeholder="Your Name">
        </div>

        <div class="flex items-center col-span-1" :style="{ backgroundColor: '#EEAA88' }">
          <label class="block tracking-wide text-md font-bold ml-2 mb-2" for="name" :style="{ color: '#800000' }">
            Subject
          </label>
        </div>
        <div class="col-span-3">
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="subject" type="text" placeholder="Subject">
        </div>

        <div class="flex items-center col-span-1" :style="{ backgroundColor: '#EEAA88' }">
          <label class="block tracking-wide text-md font-bold ml-2 mb-2" for="name" :style="{ color: '#800000' }">
            Message
          </label>
        </div>
        <div class="col-span-3">
          <textarea
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="message" rows="3" placeholder="Your Message"></textarea>
        </div>

        <div class="flex items-center col-span-1" :style="{ backgroundColor: '#EEAA88' }">
          <label class="block tracking-wide text-md font-bold ml-2 mb-2" for="name" :style="{ color: '#800000' }">
            CAPTCHA
          </label>
        </div>
        <div class="col-span-3">
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="captcha" type="text" placeholder="Enter CAPTCHA">
        </div>

        <div class="flex items-center col-span-1" :style="{ backgroundColor: '#EEAA88' }">
          <label class="block tracking-wide text-md font-bold ml-2 mb-2" for="name" :style="{ color: '#800000' }">
            File
          </label>
        </div>
        <div class="col-span-3">
          <input class="appearance-none block w-full border rounded py-3 px-4 leading-tight text-black " id="file"
            type="file">
        </div>

        <div class="flex items-center col-span-1" :style="{ backgroundColor: '#EEAA88' }">
          <label class="block tracking-wide text-md font-bold ml-2 mb-2" for="name" :style="{ color: '#800000' }">
            Embed
          </label>
        </div>
        <div class="col-span-3">
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="embed" type="text" placeholder="Embed Code">
        </div>

        <div class="flex items-center col-span-1" :style="{ backgroundColor: '#EEAA88' }">
          <label class="block tracking-wide text-md font-bold ml-2 mb-2" for="name" :style="{ color: '#800000' }">
            Password
          </label>
        </div>
        <div class="col-span-3">
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="password" type="password" placeholder="Password">
        </div>

        <!-- Submit Button -->
        <div class="flex items-center col-span-1"></div>
        <div class="flex items-center col-span-3">
          <button type="submit"
            class="block bg-gray-200 text-gray-700 hover:bg-blue-200 hover:text-blue-700 tracking-wide text-md font-bold mb-2 px-4 py-1 rounded">
            Submit
          </button>
        </div>
      </form>
    </div>

    <!-- Third Row: Footer with Buttons and Links -->
    <div class="text-white flex justify-between items-center py-4 px-4">
      <button class="bg-blue-200 hover:text-red-700 text-blue-700 font-bold py-2 px-4 rounded">
        Catalog
      </button>
      <div class="flex space-x-4">
        <button class="bg-blue-200 hover:text-red-700 text-blue-700 font-bold py-2 px-4 rounded">
          Tips
        </button>
        <button class="bg-blue-200 hover:text-red-700 text-blue-700 font-bold py-2 px-4 rounded">
          Twitter
        </button>
        <button class="bg-blue-200 hover:text-red-700 text-blue-700 font-bold py-2 px-4 rounded">
          Telegram
        </button>
      </div>
    </div>

    <!-- Fourth Row: Blank -->
    <div class="p-4" v-for="post in posts.data" :key="post.id">
      <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
        <p>User was tipped {{ post.total_tipped }} Solchan (${{ post.total_tipped_USD }}) for this post.</p>
      </div>
      <div class="flex justify-between items-center mb-4">
        <a href="#" class="text-blue-500 hover:underline">File: 171228907504.jpg—(1.04MB, 3021x2429, IMG_9778.jpeg)</a>
        <div class="flex space-x-2">
          <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-1 px-2 rounded">
            Tip OP
          </button>
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
            Reply
          </button>
        </div>
      </div>
      <div class="flex">
        <img :src="post.thumb_image_link" alt="User image" class="w-1/6 h-auto mr-4">
        <div>
          <p class="text-red-600 font-bold text-xl">{{ post.subject }}</p>
          <div v-html="post.nameblock" class="text-red-900"></div>
          <p  class="mb-2 text-red-900 "> No.{{ post.id }}</p>
          <p class="text-red-900 mb-2">{{ post.message }}</p>
        </div>
      </div>
      <p class="text-sm mt-4">Click Reply to view {{ post.replies_count }} more posts.</p>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center space-x-2 mt-4 mb-6">
      <button class="px-3 py-1 rounded border bg-white text-blue-500 hover:bg-blue-500 hover:text-white">1</button>
      <button class="px-3 py-1 rounded border bg-white text-blue-500 hover:bg-blue-500 hover:text-white">2</button>
      <button class="px-3 py-1 rounded border bg-white text-blue-500 hover:bg-blue-500 hover:text-white">3</button>
      <!-- Add more pagination buttons as needed -->
    </div>

  </div>
</template>
