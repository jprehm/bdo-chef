<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue'
import { Dialog, DialogPanel } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import Footer from '@/Layouts/Footer.vue'

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    recipe_count: {
        type: Number,
    },
    ingredient_count: {
        type: Number,
    },
    user_count: {
        type: Number
    }
});


const navigation = [
    { name: 'Recipes', href: route('recipes') },
    { name: 'Ingredients', href: route('ingredients.index') },
]
const stats = [
    { label: 'Recipes Supported', value: props.recipe_count },
    { label: 'Ingredients Supported', value: props.ingredient_count },
    { label: 'Chefs Registered', value: props.user_count },
]

const team = [
    {
        name: 'Jeff Prehm',
        role: 'Founder',
        imageUrl:
            '/images/jeff.webp',
        location: 'St. Louis, MO, USA',
    },
]
const mobileMenuOpen = ref(false)
</script>

<template>
    <GuestLayout>
        <div class="">
            <!-- Header -->
            <header class="absolute inset-x-0 top-0 z-50">
                <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                    <div class="flex lg:flex-1">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto" src="/images/logo.webp" alt="Logo" />
                        </a>
                    </div>
                    <div class="flex lg:hidden">
                        <button type="button"
                            class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400"
                            @click="mobileMenuOpen = true">
                            <span class="sr-only">Open main menu</span>
                            <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                        </button>
                    </div>
                    <div class="hidden lg:flex lg:gap-x-12">
                        <a v-for="item in navigation" :key="item.name" :href="item.href"
                            class="text-sm font-semibold leading-6 text-white">{{ item.name }}</a>
                    </div>
                    <div v-if="canLogin" class="hidden lg:flex lg:flex-1 lg:justify-end">
                        <Link v-if="canRegister" :href="route('register')"
                            class="text-sm font-semibold leading-6 dark:text-white">
                        Register</Link>

                        <Link :href="route('login')" class="text-sm font-semibold leading-6 pl-8 dark:text-white">
                        Log in<span class="pl-1" aria-hidden="true">&rarr;</span></Link>
                    </div>
                </nav>
                <Dialog as="div" class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
                    <div class="fixed inset-0 z-50" />
                    <DialogPanel
                        class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
                        <div class="flex items-center justify-between">
                            <a href="#" class="-m-1.5 p-1.5">
                                <span class="sr-only">Your Company</span>

                                <img class="h-8 w-auto"
                                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="" />
                            </a>
                            <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-400"
                                @click="mobileMenuOpen = false">
                                <span class="sr-only">Close menu</span>
                                <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                            </button>
                        </div>
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-gray-500/25">
                                <div class="space-y-2 py-6">
                                    <a v-for="item in navigation" :key="item.name" :href="item.href"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">{{
                                item.name }}</a>
                                </div>
                                <div class="py-6">
                                    <a href="#"
                                        class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-white hover:bg-gray-800">Log
                                        in</a>
                                </div>
                            </div>
                        </div>
                    </DialogPanel>
                </Dialog>
            </header>

            <main class="relative isolate">
                <!-- Background -->
                <div class="absolute inset-x-0 top-4 -z-10 flex transform-gpu justify-center overflow-hidden blur-3xl"
                    aria-hidden="true">
                    <div class="aspect-[1108/632] w-[69.25rem] flex-none bg-gradient-to-r from-[#80caff] to-[#4f46e5] opacity-25"
                        style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)" />
                </div>

                <!-- Header section -->
                <div class="px-6 pt-14 lg:px-8">
                    <div class="mx-auto max-w-2xl pt-24 text-center sm:pt-40">
                        <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">We love cooking</h2>
                        <p class="mt-6 text-lg leading-8 text-gray-300">Track your meal ingredients, and know how many
                            crafts are possible.</p>
                    </div>
                </div>

                <!-- Content section -->
                <div class="mx-auto mt-20 max-w-7xl px-6 lg:px-8">
                    <h2 class="text-3xl font-bold tracking-tight text-center text-white sm:text-4xl">Features</h2>
                    <h3 class="mb-5 text-lg font-semibold leading-8 tracking-tight text-white"></h3>
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                        <div
                            class="grid max-w-xl grid-cols-1 gap-8 text-base leading-7 text-gray-300 lg:max-w-none lg:grid-cols-2">
                            <div>
                                <p>Input your ingredients, and calculate how many of a recipe you can make.</p>
                                <p class="mt-3">Prevent overfarming one ingredient, while underfarming another.</p>
                            </div>
                            <div>
                                <p>Support for Valencia Meal, and it's ingredient. <span
                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                        Complete</span>
                                </p>
                                <p class="mt-3">Adding support for other Meal boxes. <span
                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">
                                        Future</span></p>
                                <p class="mt-3">Import Screenshot to update ingredient counts. <span
                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">
                                        Future</span></p>
                            </div>
                        </div>
                        <dl
                            class="mt-16 grid grid-cols-1 gap-x-8 gap-y-12 sm:mt-20 sm:grid-cols-2 sm:gap-y-16 lg:mt-28 lg:grid-cols-3">
                            <div v-for="(stat, statIdx) in stats" :key="statIdx"
                                class="flex flex-col-reverse gap-y-3 border-l border-white/20 pl-6">
                                <dt class="text-base leading-7 text-gray-300">{{ stat.label }}</dt>
                                <dd class="text-3xl font-semibold tracking-tight text-white">{{ stat.value }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Image section -->
                <!-- <div class="mt-32 sm:mt-40 xl:mx-auto xl:max-w-7xl xl:px-8">
                <img src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2894&q=80"
                    alt="" class="aspect-[9/4] w-full object-cover xl:rounded-3xl" />
            </div> -->

                <!-- Team section -->
                <div class="mx-auto mt-8 max-w-7xl px-6 sm:mt-8 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Our team</h2>
                        <p class="mt-6 text-lg leading-8 text-gray-300">This is a passion project, made by a small team.
                        </p>
                    </div>
                    <ul role="list"
                        class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-14 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 xl:grid-cols-4">
                        <li v-for="person in team" :key="person.name">
                            <img class="aspect-[14/13] w-full rounded-2xl object-cover" :src="person.imageUrl" alt="" />
                            <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-white">{{ person.name }}
                            </h3>
                            <p class="text-base leading-7 text-gray-300">{{ person.role }}</p>
                            <p class="text-sm leading-6 text-gray-500">{{ person.location }}</p>
                        </li>
                    </ul>
                </div>

                <!-- CTA section -->
                <div class="relative isolate -z-10 mt-16 sm:mt-40">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div
                            class="mx-auto flex max-w-2xl flex-col gap-16 bg-white/5 px-6 py-16 ring-1 ring-white/10 sm:rounded-3xl sm:p-8 lg:mx-0 lg:max-w-none lg:flex-row lg:items-center lg:py-20 xl:gap-x-20 xl:px-20">
                            <img class="h-96 w-full flex-none rounded-2xl object-cover shadow-xl lg:aspect-square lg:h-auto lg:max-w-sm"
                                src="https://images.unsplash.com/photo-1519338381761-c7523edc1f46?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80"
                                alt="" />
                            <div class="w-full flex-auto">
                                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Join the team</h2>
                                <p class="mt-3 text-lg leading-8 text-gray-300">Do you know Laravel and vuejs, and want
                                    to
                                    contribute?</p>
                                <p class="mt-3 text-lg leading-8 text-gray-300">Are you a UX/UI and want to provide
                                    design
                                    help?</p>
                                <div class="mt-5 flex">
                                    <a href="#" class="text-sm font-semibold leading-6 text-indigo-400">Contact me
                                        <span aria-hidden="true">&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-x-0 -top-16 -z-10 flex transform-gpu justify-center overflow-hidden blur-3xl"
                        aria-hidden="true">
                        <div class="aspect-[1318/752] w-[82.375rem] flex-none bg-gradient-to-r from-[#80caff] to-[#4f46e5] opacity-25"
                            style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)" />
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <Footer />
        </div>
    </GuestLayout>
</template>
