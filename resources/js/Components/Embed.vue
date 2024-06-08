<script setup>
const props = defineProps({
    html: {
        type: String,
        required: true,
    },
});
</script>
<template>
    <div v-html="html"></div>
</template>
