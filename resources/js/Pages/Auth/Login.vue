<template>
    <AuthLayout>
        <template #header>
            <h2
                class="mt-8 text-2xl font-bold leading-9 tracking-tight text-gray-900"
            >
                Sign in to your account
            </h2>
            <p class="mt-2 text-sm leading-6 text-gray-500">
                Not a member?
                {{ " " }}
                <Link
                    :href="route('register')"
                    class="text-sm text-yellow-500 underline rounded-md hover:text-yellow-400 focus:outline-none"
                >
                    Sign Up.
                </Link>
            </p>
        </template>
        <template #body>
            <form class="space-y-6" @submit.prevent="submit">
                <TextInput
                    label="Email"
                    type="email"
                    class="block w-full mt-1"
                    v-model="form.email"
                    :error="errors.email"
                    autofocus
                    autocomplete="username"
                />

                <TextInput
                    label="Password"
                    type="password"
                    class="block w-full mt-1"
                    v-model="form.password"
                    :error="errors.password"
                    autocomplete="current-password"
                />

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <Checkbox
                            name="remember"
                            v-model:checked="form.remember"
                        />
                        <span class="ml-2 text-sm text-gray-600"
                            >Remember me</span
                        >
                    </div>

                    <div>
                        <Link
                            :href="route('password.request')"
                            class="text-sm text-yellow-500 underline rounded-md hover:text-yellow-400 focus:outline-none"
                        >
                            Forgot your password?
                        </Link>
                    </div>
                </div>

                <div class="flex justify-center">
                    <PrimaryButton
                        class=""
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </template>
    </AuthLayout>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import AuthLayout from "./AuthLayout.vue";
defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    errors: {
        type: Object,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>
