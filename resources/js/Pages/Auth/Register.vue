<template>
    <Head title="Register" />
    <AuthLayout>
        <template #header>
            <h2
                class="mt-8 text-2xl font-bold leading-9 tracking-tight text-gray-900"
            >
                Sign up to your account
            </h2>
            <p class="mt-2 text-sm leading-6 text-gray-500">
                Already a member?
                {{ " " }}
                <Link
                    :href="route('login')"
                    class="text-sm text-yellow-500 underline rounded-md hover:text-yellow-400 focus:outline-none"
                >
                    Sign In.
                </Link>
            </p>
        </template>
        <template #body>
            <form @submit.prevent="submit" class="space-y-5">
                <TextInput
                    label="Name"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.name"
                    :error="errors?.form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <TextInput
                    label="Email"
                    type="email"
                    class="block w-full mt-1"
                    v-model="form.email"
                    :error="errors?.form.email"
                    required
                    autocomplete="username"
                />

                <TextInput
                    label="Password"
                    type="password"
                    class="block w-full mt-1"
                    v-model="form.password"
                    required
                    :error="errors?.form.password"
                    autocomplete="new-password"
                />

                <TextInput
                    label="Confirm Password"
                    type="password"
                    class="block w-full mt-1"
                    v-model="form.password_confirmation"
                    required
                    :error="errors?.form.password_confirmation"
                    autocomplete="new-password"
                />

                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
                </PrimaryButton>
            </form>
        </template>
    </AuthLayout>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import AuthLayout from "./AuthLayout.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>
