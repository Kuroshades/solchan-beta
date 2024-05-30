<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Pagination from "../../Components/Pagination.vue";
import { onMounted } from "vue";

const props = defineProps({
    tips: {
        type: Object,
        required: true,
    },
    price: {
        type: Number,
        required: true,
    },
});

onMounted(() => {
    console.log(props.tips);
});

const abbreviate_wallet = (wallet) => {
    if (wallet.endsWith(".sol")) {
        return wallet;
    } else {
        // first 4 letter ... last 4 letter
        return wallet.slice(0, 4) + "..." + wallet.slice(-4);
    }
};
</script>

<template>
    <Head title="Tip Leaderboards" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex flex-col items-center space-y-4">
                <h1
                    class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100"
                >
                    Tip Leaderboards
                </h1>
                <p class="text-center text-gray-600 dark:text-gray-400">
                    See who's tipping the most on Solchan.
                </p>
            </div>
            <div class="flex overflow-x-auto flex-col items-center space-y-4">
                <table
                    class="w-full mt-8 bg-white dark:bg-gray-800 rounded-lg shadow-lg"
                >
                    <thead>
                        <tr>
                            <th
                                class="py-3 px-4 bg-gray-100 dark:bg-gray-700 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase"
                            >
                                Rank
                            </th>
                            <th
                                class="py-3 px-4 bg-gray-100 dark:bg-gray-700 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase"
                            >
                                Name
                            </th>
                            <th
                                class="py-3 px-4 bg-gray-100 dark:bg-gray-700 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase"
                            >
                                Total Tips
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(tip, index) in tips.data"
                            :key="tip.id"
                            class="border-b border-gray-200 dark:border-gray-700"
                        >
                            <td
                                class="py-3 px-4 text-sm text-gray-600 dark:text-gray-300"
                            >
                                {{ index + 1 }}
                            </td>
                            <td
                                v-if="
                                    abbreviate_wallet(tip.tipper_name) ===
                                    tip.tipper_name
                                "
                                class="py-3 px-4 text-sm text-gray-600 dark:text-gray-300"
                            >
                                {{ tip.tipper_name }}
                            </td>
                            <td
                                v-else
                                class="py-3 px-4 text-sm text-gray-600 dark:text-gray-300"
                            >
                                <a
                                    :href="`https://solscan.io/account/${tip.tipper_name}`"
                                >
                                    {{ abbreviate_wallet(tip.tipper_name) }}
                                </a>
                            </td>
                            <td
                                class="py-3 px-4 text-sm text-gray-600 dark:text-gray-300"
                            >
                                {{ tip.total_amount }} (${{
                                    tip.total_amount * price
                                }})
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                <Pagination :links="tips.links" />
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
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
