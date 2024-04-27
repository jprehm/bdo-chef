<script setup>
import { ChevronDownIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'
import StackedItem from '@/Components/Tables/StackedItem.vue'

defineProps({
    ingredients: {
        type: Object,
        required: true
    },
    showLink: {
        type: Boolean,
        required: false,
        default: false
    }
})

const convertToInt = (value) => parseInt(value.replace(/,/g, ''))

const hasLowestCrafts = (item, ingredients) => {
    const min_recipe_crafts = Math.min(...ingredients.map(item => convertToInt(item.recipe_crafts)))

    return convertToInt(item.recipe_crafts) == min_recipe_crafts
}
const triggerCrafting = ((item) => {
    if (!item.ingredients) return;
    item.showCrafting = !item.showCrafting
})
</script>

<template>
    <li v-for="item in  ingredients " :key="item.name">
        <div class="relative flex justify-between gap-x-6 px-4 py-5 hover:bg-gray-50 sm:px-6">
            <span v-if="showLink" class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-slate-500" aria-hidden="true"></span>
            <div class="flex min-w-0 gap-x-4">
                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                    src="https://images.unsplash.com/photo-1708115106926-16b9c1591b07?q=80&w=2333&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="" />
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">
                    <p>{{ item.name }}</p>
                    </p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">
                    <p class="text-sm font-semibold">On Hand: <span class="text-gray-900">{{ item.on_hand }}</span></p>
                    <p class="text-sm font-semibold">Need: <span class="text-gray-900">{{ item.needed }}</span></p>
                    <p class="text-sm font-semibold">Can Craft: <span class="text-gray-900">{{ item.crafts }}</span></p>
                    <p class="text-sm font-semibold">Possible Recipe Crafts: <span
                            :class="[hasLowestCrafts(item, ingredients) ? 'text-red-900' : 'text-gray-900']" class="">{{
                                item.recipe_crafts }}</span></p>
                    </p>
                </div>
            </div>
            <div class="flex shrink-0 items-center gap-x-4" @click="triggerCrafting(item)">
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <span v-if="item.ingredients">
                        <p class="text-sm leading-6 text-gray-900">Ingredients</p>
                        <p v-if="!item.showCrafting" class="mt-1 text-xs leading-5 text-gray-500">
                            Show
                        </p>
                        <p v-else class="mt-1 text-xs leading-5 text-gray-500">
                            hide
                        </p>
                    </span>
                    <span v-else>
                        <p class="mr-12 text-sm leading-6 text-gray-900">{{ item.type }}</p>
                    </span>
                </div>
                <button v-if="item.ingredients">
                    <ChevronRightIcon v-if="!item.showCrafting" class="h-5 w-5 flex-none text-gray-400"
                        aria-hidden="true" />
                    <ChevronDownIcon v-else class="h-5 w-5 flex-none text-gray-400" aria-hidden="true" />
                </button>
            </div>
        </div>
        <div v-if="item.showCrafting" class="mx-8">
            <StackedItem :ingredients="item.ingredients" :showLink="true"></StackedItem>
        </div>
    </li>
</template>
