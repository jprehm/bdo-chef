<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import CardTable from '@/Components/Tables/CardTable.vue'
import debounce from 'lodash.debounce'

const props = defineProps({
    ingredients: {
        type: Array
    },
    term: {
        type: String,
        required: false,
        default: ''
    }
})

const form = useForm({
    term: props.term
});

const submit = debounce(() => {
    // console.log(form.term)
    form.get(route('ingredients.index'))
}, 500)
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Ingredients</h2>
        </template>

        <div class="py-12">
            <div class="m-12">
                <form @submit.prevent="submit">
                    <label for="search" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Quick
                        search</label>
                    <div class="relative mt-2 flex items-center">
                        <input type="text" name="search" id="search"
                            class="block w-full rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            v-model="form.term"
                            @input="submit"/>
                        <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                            <kbd
                                class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">⌘K</kbd>
                        </div>
                    </div>
                </form>
            </div>

            <CardTable :ingredients="ingredients" />
        </div>
    </AuthenticatedLayout>
</template>
