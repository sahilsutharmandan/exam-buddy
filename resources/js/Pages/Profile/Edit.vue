<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <div class="-m-6 rounded-xl">
            <div>
                <img
                    class="object-cover w-full h-32 lg:h-48 rounded-t-xl"
                    :src="profile.backgroundImage"
                    alt=""
                />
            </div>
            <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
                <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                    <div class="flex">
                        <img
                            class="w-24 h-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                            :src="profile.avatar"
                            alt=""
                        />
                    </div>
                    <div
                        class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1"
                    >
                        <div class="flex-1 min-w-0 mt-6 sm:hidden md:block">
                            <h1
                                class="text-2xl font-bold text-gray-900 truncate"
                            >
                                {{ profile.name }}
                            </h1>
                        </div>
                        <div
                            class="flex flex-col mt-6 space-y-3 justify-stretch sm:flex-row sm:space-x-4 sm:space-y-0"
                        >
                            <button
                                type="button"
                                class="inline-flex justify-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                            >
                                <EnvelopeIcon
                                    class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400"
                                    aria-hidden="true"
                                />
                                <span>Message</span>
                            </button>
                            <button
                                type="button"
                                class="inline-flex justify-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                            >
                                <PhoneIcon
                                    class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400"
                                    aria-hidden="true"
                                />
                                <span>Call</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex-1 hidden min-w-0 mt-6 sm:block md:hidden">
                    <h1 class="text-2xl font-bold text-gray-900 truncate">
                        {{ profile.name }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                </div>

                <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import { Head } from "@inertiajs/vue3";
import { EnvelopeIcon, PhoneIcon } from "@heroicons/vue/20/solid";
defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
const profile = {
    name: "Ricardo Cooper",
    email: "ricardo.cooper@example.com",
    avatar: "https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80",
    backgroundImage:
        "https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80",
    fields: [
        ["Phone", "(555) 123-4567"],
        ["Email", "ricardocooper@example.com"],
        ["Title", "Senior Front-End Developer"],
        ["Team", "Product Development"],
        ["Location", "San Francisco"],
        ["Sits", "Oasis, 4th floor"],
        ["Salary", "$145,000"],
        ["Birthday", "June 8, 1990"],
    ],
};
</script>
