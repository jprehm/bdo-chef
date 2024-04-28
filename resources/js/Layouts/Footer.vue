<script setup>
import { Link } from '@inertiajs/vue3';

const footerNavigation = {
    support: [
        { name: 'Bug Report', href: '#' },
        { name: 'Feature Request', href: '#' },
        { name: 'Status', href: '#' },
    ],
}
</script>

<template>
    <footer class="relative mt-32 sm:mt-40" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl px-6 pb-8 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-8">
                    <img class="h-7" src="/images/logo.webp" alt="BDO Chef" />
                    <p class="text-sm leading-6 text-gray-300">We love cooking</p>
                </div>
                <div class="mt-16 grid grid-cols-1 gap-8 xl:col-span-2 xl:mt-0">
                    <h3 class="text-sm font-semibold leading-6 text-white">Support</h3>
                    <dl
                        class="mt-3 grid grid-cols-1 gap-x-8 gap-y-12 sm:mt-3 sm:grid-cols-2 sm:gap-y-16 lg:mt-3 lg:grid-cols-3">
                        <div v-for="item in footerNavigation.support" :key="item.name"
                            class="flex flex-col-reverse gap-y-3 border-l border-white/20 pl-6">
                            <Link :href="item.href" class="text-sm leading-6 text-gray-300 hover:text-white">{{
                            item.name }}<span v-if="item.href === '#'"
                                class="inline-flex items-center rounded-md bg-red-50 ml-2 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-red-600/10">
                                Comming Soon</span>
                            </Link>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="mt-16 border-t border-white/10 pt-8 sm:mt-20 lg:mt-24">
                <p class="text-xs leading-5 text-gray-400">&copy; 2024 All rights reserved.</p>
            </div>
        </div>
    </footer>
</template>
