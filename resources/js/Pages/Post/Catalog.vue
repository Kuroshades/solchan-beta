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

</script>
<template>
  <div class="container mx-auto grid gap-4 min-h-screen" :style="{ backgroundColor: '#FFFFEE' }">
    <!-- First Row: Logo -->
    <div class="row-span-1 flex justify-center items-center">
      <img src="/images/logo.png" alt="Solchan Logo" class="max-w-sm">
    </div>

     <!-- Second Row: Footer with Buttons and Links -->
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
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 pl-6 pr-6">
        <!-- Example item, repeat for other items -->
        <div class="border p-4 flex flex-col items-center">
          <img src="/path/to/image1.jpg" alt="Item Image" class="w-full h-40 object-cover">
          <div class="mt-2 text-center">
            <p class="text-gray-800">Item Description</p>
            <p class="text-gray-600 text-sm">Replies: 1 | Files: 1</p>
          </div>
        </div>
        <!-- Repeat similar divs for other items -->
          <!-- Example item, repeat for other items -->
        <div class="border p-4 flex flex-col items-center">
          <img src="/path/to/image1.jpg" alt="Item Image" class="w-full h-40 object-cover">
          <div class="mt-2 text-center">
            <p class="text-gray-800">Item Description</p>
            <p class="text-gray-600 text-sm">Replies: 1 | Files: 1</p>
          </div>
        </div>
        <!-- Repeat similar divs for other items -->
          <!-- Example item, repeat for other items -->
        <div class="border p-4 flex flex-col items-center">
          <img src="/path/to/image1.jpg" alt="Item Image" class="w-full h-40 object-cover">
          <div class="mt-2 text-center">
            <p class="text-gray-800">Item Description</p>
            <p class="text-gray-600 text-sm">Replies: 1 | Files: 1</p>
          </div>
        </div>
        <!-- Repeat similar divs for other items -->
          <!-- Example item, repeat for other items -->
        <div class="border p-4 flex flex-col items-center">
          <img src="/path/to/image1.jpg" alt="Item Image" class="w-full h-40 object-cover">
          <div class="mt-2 text-center">
            <p class="text-gray-800">Item Description</p>
            <p class="text-gray-600 text-sm">Replies: 1 | Files: 1</p>
          </div>
        </div>
        <!-- Repeat similar divs for other items -->
      </div>

      <!-- Pagination -->
      <div class="flex justify-center space-x-2 mt-4 mb-6">
        <button class="w-10 h-10 rounded border bg-white text-blue-500 hover:bg-blue-500 hover:text-white flex items-center justify-center">1</button>
        <button class="w-10 h-10 rounded border bg-white text-blue-500 hover:bg-blue-500 hover:text-white flex items-center justify-center">2</button>
        <button class="w-10 h-10 rounded border bg-white text-blue-500 hover:bg-blue-500 hover:text-white flex items-center justify-center">3</button>
        <!-- Add more pagination buttons as needed -->
      </div>


  </div>
</template>
