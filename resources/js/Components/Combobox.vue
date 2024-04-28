<script setup>
import { computed, ref, watch } from 'vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import {
    Combobox,
    ComboboxButton,
    ComboboxInput,
    ComboboxLabel,
    ComboboxOption,
    ComboboxOptions,
} from '@headlessui/vue'

const props = defineProps({
    label: {
        type: String
    },
    items: {
        type: Array
    },
    selected: {
        type: Object
    }
})
const emit = defineEmits(['changed'])

let selected = ref(props.selected)
const query = ref('')
const filteredItems = computed(() =>
    query.value === ''
        ? props.items
        : props.items.filter((item) => {
            return item.name.toLowerCase().includes(query.value.toLowerCase())
        })
)

watch(selected, (newValue, oldValue) => {
    emit('changed', newValue)
})
</script>

<template>
    <Combobox as="div" v-model="selected" nullable>
        <ComboboxLabel class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">{{ label }}
        </ComboboxLabel>
        <div class="relative mt-2">
            <ComboboxButton as="div">
                <ComboboxInput
                    class="w-full rounded-md border-0 bg-white dark:bg-gray-900 py-1.5 pl-3 pr-10 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-gray-800 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    @change="query = $event.target.value" placeholder="Select an item"
                    :display-value="(item) => item?.name" />
            </ComboboxButton>

            <ComboboxButton class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
                <ChevronUpDownIcon class="h-5 w-5 text-gray-400 dark:text-white" aria-hidden="true" />
            </ComboboxButton>

            <ComboboxOptions v-if="filteredItems.length > 0"
                class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white dark:bg-gray-900 py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                <ComboboxOption v-for="item in filteredItems" :key="item.id" :value="item" as="template"
                    v-slot="{ active, selected }">
                    <li
                        :class="['relative cursor-default select-none py-2 pl-3 pr-9', active ? 'bg-indigo-600 text-white dark:text-gray-900' : 'text-gray-900 dark:text-white']">
                        <span :class="['block truncate', selected && 'font-semibold']">
                            {{ item.name }}
                        </span>

                        <span v-if="selected"
                            :class="['absolute inset-y-0 right-0 flex items-center pr-4', active ? 'text-white' : 'text-indigo-600']">
                            <CheckIcon class="h-5 w-5" aria-hidden="true" />
                        </span>
                    </li>
                </ComboboxOption>
            </ComboboxOptions>
        </div>
    </Combobox>
</template>
