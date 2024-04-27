<script setup>

defineProps({
    classes: {
        type: String
    }
})

</script>

<template>
    <img :class="classes" src="/images/logo.webp" alt="BDO Chef" />
</template>
