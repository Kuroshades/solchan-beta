<script setup>
const form = ref({
    name: "",
    subject: "",
    message: "",
    embed: "",
    password: "",
    spoiler: false,
});
</script>

<template>
    <!-- First Row: Logo -->
    <div class="row-span-1 flex justify-center items-center">
        <img src="/images/logo.png" alt="Solchan Logo" class="max-w-sm" />
    </div>

    <!-- Second Row: Form -->
    <div class="flex justify-center items-center">
        <form class="w-full max-w-lg grid grid-cols-4 gap-1">
            <div
                class="flex items-center col-span-1"
                :style="{ backgroundColor: '#EEAA88' }"
            >
                <label
                    class="block tracking-wide text-md font-bold ml-2 mb-2"
                    for="name"
                    :style="{ color: '#800000' }"
                >
                    Name
                </label>
            </div>
            <div class="col-span-3 flex items-center">
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="name"
                    type="text"
                    placeholder="Your Name"
                />
            </div>

            <div
                class="flex items-center col-span-1"
                :style="{ backgroundColor: '#EEAA88' }"
            >
                <label
                    class="block tracking-wide text-md font-bold ml-2 mb-2"
                    for="name"
                    :style="{ color: '#800000' }"
                >
                    Subject
                </label>
            </div>
            <div class="col-span-3">
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="subject"
                    type="text"
                    placeholder="Subject"
                />
            </div>

            <div
                class="flex items-center col-span-1"
                :style="{ backgroundColor: '#EEAA88' }"
            >
                <label
                    class="block tracking-wide text-md font-bold ml-2 mb-2"
                    for="name"
                    :style="{ color: '#800000' }"
                >
                    Message
                </label>
            </div>
            <div class="col-span-3">
                <textarea
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="message"
                    rows="3"
                    placeholder="Your Message"
                ></textarea>
            </div>

            <div
                class="flex items-center col-span-1"
                :style="{ backgroundColor: '#EEAA88' }"
            >
                <label
                    class="block tracking-wide text-md font-bold ml-2 mb-2"
                    for="name"
                    :style="{ color: '#800000' }"
                >
                    CAPTCHA
                </label>
            </div>
            <div class="col-span-3">
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="captcha"
                    type="text"
                    placeholder="Enter CAPTCHA"
                />
            </div>

            <div
                class="flex items-center col-span-1"
                :style="{ backgroundColor: '#EEAA88' }"
            >
                <label
                    class="block tracking-wide text-md font-bold ml-2 mb-2"
                    for="name"
                    :style="{ color: '#800000' }"
                >
                    File
                </label>
            </div>
            <div class="col-span-3">
                <input
                    class="appearance-none block w-full border rounded py-3 px-4 leading-tight text-black"
                    id="file"
                    type="file"
                />
            </div>

            <div
                class="flex items-center col-span-1"
                :style="{ backgroundColor: '#EEAA88' }"
            >
                <label
                    class="block tracking-wide text-md font-bold ml-2 mb-2"
                    for="name"
                    :style="{ color: '#800000' }"
                >
                    Embed
                </label>
            </div>
            <div class="col-span-3">
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="embed"
                    type="text"
                    placeholder="Embed Code"
                />
            </div>

            <div
                class="flex items-center col-span-1"
                :style="{ backgroundColor: '#EEAA88' }"
            >
                <label
                    class="block tracking-wide text-md font-bold ml-2 mb-2"
                    for="name"
                    :style="{ color: '#800000' }"
                >
                    Password
                </label>
            </div>
            <div class="col-span-3">
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="password"
                    type="password"
                    placeholder="Password"
                />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center col-span-1"></div>
            <div class="flex items-center col-span-3">
                <button
                    type="submit"
                    class="block bg-gray-200 text-gray-700 hover:bg-blue-200 hover:text-blue-700 tracking-wide text-md font-bold mb-2 px-4 py-1 rounded"
                >
                    Submit
                </button>
            </div>
        </form>
    </div>

    <!-- Third Row: Footer with Buttons and Links -->
    <div class="text-white flex justify-between items-center py-4 px-4">
        <button
            class="bg-blue-200 hover:text-red-700 text-blue-700 font-bold py-2 px-4 rounded"
        >
            Catalog
        </button>
        <div class="flex space-x-4">
            <button
                class="bg-blue-200 hover:text-red-700 text-blue-700 font-bold py-2 px-4 rounded"
            >
                Tips
            </button>
            <button
                class="bg-blue-200 hover:text-red-700 text-blue-700 font-bold py-2 px-4 rounded"
            >
                Twitter
            </button>
            <button
                class="bg-blue-200 hover:text-red-700 text-blue-700 font-bold py-2 px-4 rounded"
            >
                Telegram
            </button>
        </div>
    </div>
</template>
