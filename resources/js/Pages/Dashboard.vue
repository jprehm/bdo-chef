<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'
import StackedTable from '@/Components/Tables/Stacked.vue'

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

const submit = () => {
    form.get(route('recipes'), {
    });
};
</script>

<template>
    <Head title="Dashboard" />

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
                    <Listbox as="div" v-model="form.selected">
                        <ListboxLabel class="block text-sm font-medium leading-6 text-gray-900">Assigned to</ListboxLabel>
                        <div class="relative mt-2">
                            <ListboxButton
                                class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <span class="block truncate">{{ form.selected?.name || 'Select A Recipe...' }}</span>
                                <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                </span>
                            </ListboxButton>

                            <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                                leave-to-class="opacity-0">
                                <ListboxOptions
                                    class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                    <ListboxOption as="template" v-for="item in recipes" :key="item.id" :value="item"
                                        v-slot="{ active, selected }">
                                        <li
                                            :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                            <span
                                                :class="[form.selected ? 'font-semibold' : 'font-normal', 'block truncate']">{{
                                                    item.name
                                                }}</span>

                                            <span v-if="form.selected"
                                                :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                                <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                            </span>
                                        </li>
                                    </ListboxOption>
                                </ListboxOptions>
                            </transition>
                        </div>
                    </Listbox>
                    <button :disabled="form.processing" @click="submit" type="submit"
                        class="rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit
                    </button>
                </form>

                <StackedTable v-if="recipe?.data" :recipe="recipe.data" />

            </div>
        </div>
    </AuthenticatedLayout>
</template>
