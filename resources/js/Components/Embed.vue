<script setup>
const props = defineProps({
    html: {
        type: String,
        required: true,
    },
});
</script>
<template v-html="html"></template>
