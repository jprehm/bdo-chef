<script setup>
import { router } from '@inertiajs/vue3'

defineProps({
    ingredients: {
        type: Array,
        required: true
    }
})

function submit(item) {
    router.patch(route('ingredients.update', item.id), item);
}
</script>

<template>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Type
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Count
                                    </th>
                                    <!-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role
                                    </th> -->
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="item in ingredients" :key="item.id">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ item.name }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ item.type }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <input type="number" name="count" id="count" v-model="item.count" step="1"
                                            class="peer block w-full border-0 bg-gray-50 py-1.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="Enter Count" />
                                        <!-- <div class="absolute inset-x-0 bottom-0 border-t border-gray-300 peer-focus:border-t-2 peer-focus:border-indigo-600"
                                            aria-hidden="true" /> -->
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <button @click="submit(item)" type="button"
                                            class="text-indigo-600 hover:text-indigo-900">Save</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
