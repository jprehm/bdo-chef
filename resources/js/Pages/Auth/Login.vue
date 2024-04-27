<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Logo from '@/Components/Logo.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <Logo classes="text-center h-50"/>
                <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-white">Sign in to your
                    account</h2>
            </div>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Email" />

                        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                            autofocus autocomplete="username" />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div>
                        <InputLabel for="password" value="Password" />

                        <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                            required autocomplete="current-password" />

                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-3">
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign
                            in</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-400">
                    Not a member?
                    {{ ' ' }}
                    <Link :href="route('register')"
                        class="font-semibold leading-6 text-indigo-400 hover:text-indigo-300">
                    Register</Link>
                </p>
            </div>
        </div>
    </GuestLayout>
</template>
