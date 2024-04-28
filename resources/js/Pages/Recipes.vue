<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import StackedTable from '@/Components/Tables/Stacked.vue'
import Combobox from '@/Components/Combobox.vue'

const props = defineProps({
    recipes: {
        type: Array
    },
    selected: {
        type: Object,
        required: false,
        default: null
    },
    recipe: {
        type: Object
    }
})

const form = useForm({
    selected: props.selected
});

const submit = (selected) => {
    form.selected = selected
    form.get(route('recipes'), {
        preserveScroll: true,
    })
}
</script>

<template>

    <Head title="Recipes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Recipes</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div v-if="recipe?.data" class="p-6 text-gray-900 dark:text-gray-100">You Can Craft <span
                            class="font-semibold">{{ recipe.data.crafts }}</span> {{ recipe.data.name }}'s!</div>
                </div>
                <form @submit.prevent="submit">
                    <Combobox label="Recipe" :items="recipes" v-model="form.selected" @changed="submit" />
                </form>

                <StackedTable v-if="recipe?.data" :recipe="recipe.data" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
