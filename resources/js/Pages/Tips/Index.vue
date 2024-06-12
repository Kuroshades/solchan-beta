<script setup>
import SolchanLayout from "@/Layouts/SolchanLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import Pagination from "../../Components/Pagination.vue";
import { onMounted } from "vue";
import { ref } from "vue";
import { abbreviate_wallet } from "../../functions";

const props = defineProps({
    tips: {
        type: Object,
        required: true,
    },
    price: {
        type: String,
        required: true,
    },
});

const ref_price = ref(parseFloat(props.price));

onMounted(() => {
    console.log(props.tips);
});
</script>

<template>
    <Head title="Tip Leaderboards" />

    <SolchanLayout>
        <div class="flex flex-col items-center space-y-4">
            <h1 class="text-3xl font-bold text-center text-primary">
                Tip Leaderboards
            </h1>
            <p class="text-center text-secondary">
                See who's tipping the most on Solchan.
            </p>
        </div>
        <div class="overflow-x-auto max-w-7xl mx-auto lg:p-8">
            <table class="w-full mt-8 bg-secondary rounded-lg shadow-lg">
                <thead>
                    <tr>
                        <th
                            class="text-center py-3 px-4 bg-primary text-sm font-semibold text-primary-content uppercase"
                        >
                            Rank
                        </th>
                        <th
                            class="text-center py-3 px-4 bg-primary text-sm font-semibold text-primary-content uppercase"
                        >
                            Name
                        </th>
                        <th
                            class="text-center py-3 px-4 bg-primary text-sm font-semibold text-primary-content uppercase"
                        >
                            Total Tips
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(tip, index) in tips.data"
                        :key="tip.id"
                        class="border-b border-accent-content"
                    >
                        <td class="py-3 px-4 text-sm text-secondary-content">
                            {{ tips.from + index }}
                        </td>
                        <td
                            v-if="
                                abbreviate_wallet(tip.tipper_name) ===
                                tip.tipper_name
                            "
                            class="py-3 px-4 text-sm text-secondary-content"
                        >
                            {{ tip.tipper_name }}
                        </td>
                        <td
                            v-else
                            class="py-3 px-4 text-sm text-secondary-content"
                        >
                            <a
                                :title="tip.tipper_name"
                                :href="`https://solscan.io/account/${tip.tipper_name}`"
                                target="_blank"
                            >
                                {{ abbreviate_wallet(tip.tipper_name) }}
                            </a>
                        </td>
                        <td class="py-3 px-4 text-sm text-secondary-content">
                            {{ Intl.NumberFormat().format(tip.total_amount) }}
                            (${{ (tip.total_amount * ref_price).toFixed(2) }})
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
    </SolchanLayout>
</template>
