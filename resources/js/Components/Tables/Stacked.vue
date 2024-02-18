<script setup>
import StackedItem from '@/Components/Tables/StackedItem.vue'

const props = defineProps({
    recipe: {
        type: Object,
        required: false,
        default: null
    },
    ingredients: {
        type: Array,
        required: false,
        default: null
    }
})

let ingredients = props.recipe?.ingredients || props.ingredients

</script>

<template>
    <ul v-if="ingredients" role="list"
        class="divide-y divide-gray-100 overflow-hidden bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl mt-8">
        <StackedItem :ingredients="ingredients"></StackedItem>
    </ul>
</template>
