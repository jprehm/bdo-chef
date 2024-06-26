<script setup>
import { ref } from 'vue'
import { Dialog, DialogPanel } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import NavLink from '@/Components/NavLink.vue';
import Logo from '@/Components/Logo.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import Footer from '@/Layouts/Footer.vue'

const navigation = [
    { name: 'Recipes', href: route('recipes'), active: route().current('recipes') },
    { name: 'Ingredients', href: route('ingredients.index'), active: route().current('ingredients.index') },
]

const mobileMenuOpen = ref(false)
</script>

<template>
    <div class="min-h-screen flex flex-col justify-between">
        <header class="">
            <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <Link :href="route('welcome')" class="-m-1.5 p-1.5">
                    <span class="sr-only">BDO Chef</span>
                    <Logo classes="h-10" />
                    </Link>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400"
                        @click="mobileMenuOpen = true">
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-8">
                    <NavLink v-for="item in navigation" :key="item.name" :href="item.href" :active="item.active"
                        class="text-sm font-semibold leading-6 text-white">{{ item.name }}</NavLink>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <NavLink :href="route('profile.edit')" :active="route().current('profile.edit')"
                        class="ml-4 text-sm font-semibold leading-6 text-white">Profile</NavLink>
                    <NavLink :href="route('logout')" method="post"
                        as="Button"
                        class="ml-4 text-sm font-semibold leading-6 text-white">Log Out</NavLink>
                </div>
            </nav>
            <Dialog as="div" class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
                <div class="fixed inset-0 z-10" />
                <DialogPanel
                    class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">BDO Chef</span>
                            <Logo classes="h-8" />
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
                                <ResponsiveNavLink v-for="item in navigation" :key="item.name" :href="item.href"
                                    :class="[item.active ? 'text-indigo-600' : '']"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">
                                    {{
                        item.name }}</ResponsiveNavLink>
                            </div>
                            <div class="py-6">
                                <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                                <ResponsiveNavLink :href="route('logout') " method="post" as="button">
                                    Log Out
                                </ResponsiveNavLink>
                            </div>
                        </div>
                    </div>
                </DialogPanel>
            </Dialog>
        </header>
        <!-- Page Content -->
        <main class="bg-gray-900">
            <slot />
        </main>

        <!-- Footer -->
        <Footer />
    </div>
</template>
