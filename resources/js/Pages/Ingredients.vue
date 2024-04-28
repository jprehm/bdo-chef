<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import CardTable from '@/Components/Tables/CardTable.vue'
import debounce from 'lodash.debounce'
import TextInput from '@/Components/TextInput.vue'
import InputLabel from '@/Components/InputLabel.vue'

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
    form.get(route('ingredients.index'), {
        preserveState: true,
        preserveScroll: true,
    })

}, 500)
</script>

<template>

    <Head title="Ingredients" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Ingredients</h2>
        </template>

        <div class="py-12">
            <div class="m-12">
                <form @submit.prevent="submit">
                    <InputLabel for="search">Quick search</InputLabel>
                    <div class="relative mt-2 flex items-center">
                        <TextInput type="text" name="search" id="search" v-model="form.term" @input="submit" />
                    </div>
                </form>
            </div>

            <CardTable :ingredients="ingredients" />
        </div>
    </AuthenticatedLayout>
</template>
