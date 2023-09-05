<template>
    <AuthenticatedLayout>
        <div>
            <div>
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <h2
                        class="max-w-2xl mx-auto text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none"
                    >
                        Recent activity
                    </h2>
                </div>

                <div class="flow-root mx-8">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div
                            class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
                        >
                            <div class="flex justify-end py-2">
                                <Link :href="route('tests.create')">
                                    <button
                                        :href="route('tests.create')"
                                        class="btn btn-secondary !w-32"
                                    >
                                        <PlusIcon class="w-5 h-5" /> Add Test
                                    </button></Link
                                >
                            </div>
                            <div
                                class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg"
                            >
                                <table
                                    class="min-w-full divide-y divide-gray-300"
                                >
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                            >
                                                Id
                                            </th>
                                            <th
                                                scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                            >
                                                Name
                                            </th>
                                            <th
                                                scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                            >
                                                Subject
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                            >
                                                Date
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                            >
                                                Questions Qty
                                            </th>

                                            <th
                                                scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                            >
                                                Duration
                                            </th>

                                            <th
                                                scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                            >
                                                Review
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200"
                                    >
                                        <tr
                                            v-for="test in tests"
                                            :key="test?.id"
                                        >
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"
                                            >
                                                {{ test?.id }}
                                            </td>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"
                                            >
                                                {{ test?.test_name }}
                                            </td>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"
                                            >
                                                {{ test?.subject }}
                                            </td>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"
                                            >
                                                {{
                                                    formatDate(
                                                        test?.date_range[0]
                                                    )
                                                }}-{{
                                                    formatDate(
                                                        test?.date_range[1]
                                                    )
                                                }}
                                            </td>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"
                                            >
                                                {{ test?.questions.length }}
                                            </td>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"
                                            >
                                                {{
                                                    formatTime(
                                                        test?.test_duration_time
                                                    )
                                                }}
                                            </td>

                                            <td
                                                class="relative flex items-center gap-3 py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6"
                                            >
                                                <Link
                                                    :href="
                                                        route(
                                                            'tests.edit',
                                                            test.id
                                                        )
                                                    "
                                                    class="text-indigo-600 hover:text-indigo-900"
                                                >
                                                    <i
                                                        class="text-lg pi pi-pencil"
                                                    ></i>
                                                </Link>
                                                <Link
                                                    :href="
                                                        route(
                                                            'tests.delete',
                                                            test.id
                                                        )
                                                    "
                                                    class="text-red-500 hover:text-red-700"
                                                >
                                                    <i
                                                        class="pi pi-trash test-lg"
                                                    ></i>
                                                </Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { PlusIcon } from "@heroicons/vue/24/outline";
defineProps({
    tests: [Object, Array],
});
</script>
