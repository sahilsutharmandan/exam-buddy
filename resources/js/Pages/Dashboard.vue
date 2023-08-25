<template>
    <AuthenticatedLayout>
        <div>
            <div class="px-4 pb-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h2
                    class="max-w-2xl mx-auto text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none"
                >
                    Student Performance Overview
                </h2>
            </div>
            <div
                class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5"
            >
                <dl
                    class="grid grid-cols-1 mx-auto max-w-7xl sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0"
                >
                    <div
                        v-for="(stat, statIdx) in stats"
                        :key="stat.name"
                        :class="[
                            statIdx % 2 === 1
                                ? 'sm:border-l'
                                : statIdx === 2
                                ? 'lg:border-l'
                                : '',
                            'flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8',
                        ]"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-500">
                            {{ stat.name }}
                        </dt>
                        <dd
                            :class="[
                                stat.changeType === 'negative'
                                    ? 'text-rose-600'
                                    : 'text-gray-700',
                                'text-xs font-medium',
                            ]"
                        >
                            {{ stat.change }}
                        </dd>
                        <dd
                            class="flex-none w-full text-3xl font-medium leading-10 tracking-tight text-gray-900"
                        >
                            {{ stat.value }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div
                class="absolute left-0 origin-top-left -rotate-90 translate-y-40 top-full -z-10 mt-96 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50"
                aria-hidden="true"
            >
                <div
                    class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#FF80B5] to-[#9089FC]"
                    style="
                        clip-path: polygon(
                            100% 38.5%,
                            82.6% 100%,
                            60.2% 37.7%,
                            52.4% 32.1%,
                            47.5% 41.8%,
                            45.2% 65.6%,
                            27.5% 23.4%,
                            0.1% 35.3%,
                            17.9% 0%,
                            27.7% 23.4%,
                            76.2% 2.5%,
                            74.2% 56%,
                            100% 38.5%
                        );
                    "
                />
            </div>
        </div>

        <div class="py-16 space-y-16 xl:space-y-20">
            <!-- Recent activity table -->
            <div>
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <h2
                        class="max-w-2xl mx-auto text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none"
                    >
                        Recent activity
                    </h2>
                </div>
                <div class="flow-root mx-8 lg:mt-8">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div
                            class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
                        >
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
                                                Name
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
                                                Subject
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                            >
                                                Score
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                            >
                                                Percentile
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
                                                Correct Answers
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                            >
                                                Incorrect Answers
                                            </th>

                                            <th
                                                scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                            >
                                                Unanswered
                                            </th>
                                            <th
                                                scope="col"
                                                class="relative py-3.5 pl-3 pr-4 sm:pr-6"
                                            >
                                                <span class="sr-only"
                                                    >Review Status</span
                                                >
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200"
                                    >
                                        <tr>
                                            <td
                                                v-for="person in people"
                                                :key="person"
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"
                                            >
                                                {{ person }}
                                            </td>

                                            <td
                                                class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6"
                                            >
                                                <a
                                                    href="#"
                                                    class="text-indigo-600 hover:text-indigo-900"
                                                    >Edit</a
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent client list-->
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="max-w-2xl mx-auto lg:mx-0 lg:max-w-none">
                    <div class="flex items-center justify-between">
                        <h2
                            class="text-base font-semibold leading-7 text-gray-900"
                        >
                            Purchased Courses
                        </h2>
                        <a
                            href="#"
                            class="text-sm font-semibold leading-6 text-indigo-600 hover:text-indigo-500"
                            >View all<span class="sr-only">, clients</span></a
                        >
                    </div>
                    <ul
                        role="list"
                        class="grid grid-cols-1 mt-6 gap-x-6 gap-y-8 lg:grid-cols-3 xl:gap-x-8"
                    >
                        <li
                            v-for="client in clients"
                            :key="client.id"
                            class="overflow-hidden border border-gray-200 rounded-xl"
                        >
                            <div
                                class="flex items-center p-6 border-b gap-x-4 border-gray-900/5 bg-gray-50"
                            >
                                <img
                                    :src="client.imageUrl"
                                    :alt="client.name"
                                    class="flex-none object-cover w-12 h-12 bg-white rounded-lg ring-1 ring-gray-900/10"
                                />
                                <div
                                    class="text-sm font-medium leading-6 text-gray-900"
                                >
                                    {{ client.name }}
                                </div>
                                <Menu as="div" class="relative ml-auto">
                                    <MenuButton
                                        class="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500"
                                    >
                                        <span class="sr-only"
                                            >Open options</span
                                        >
                                        <EllipsisHorizontalIcon
                                            class="w-5 h-5"
                                            aria-hidden="true"
                                        />
                                    </MenuButton>
                                    <transition
                                        enter-active-class="transition duration-100 ease-out"
                                        enter-from-class="transform scale-95 opacity-0"
                                        enter-to-class="transform scale-100 opacity-100"
                                        leave-active-class="transition duration-75 ease-in"
                                        leave-from-class="transform scale-100 opacity-100"
                                        leave-to-class="transform scale-95 opacity-0"
                                    >
                                        <MenuItems
                                            class="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                        >
                                            <MenuItem v-slot="{ active }">
                                                <a
                                                    href="#"
                                                    :class="[
                                                        active
                                                            ? 'bg-gray-50'
                                                            : '',
                                                        'block px-3 py-1 text-sm leading-6 text-gray-900',
                                                    ]"
                                                    >View<span class="sr-only"
                                                        >,
                                                        {{ client.name }}</span
                                                    ></a
                                                >
                                            </MenuItem>
                                            <MenuItem v-slot="{ active }">
                                                <a
                                                    href="#"
                                                    :class="[
                                                        active
                                                            ? 'bg-gray-50'
                                                            : '',
                                                        'block px-3 py-1 text-sm leading-6 text-gray-900',
                                                    ]"
                                                    >Edit<span class="sr-only"
                                                        >,
                                                        {{ client.name }}</span
                                                    ></a
                                                >
                                            </MenuItem>
                                        </MenuItems>
                                    </transition>
                                </Menu>
                            </div>
                            <dl
                                class="px-6 py-4 -my-3 text-sm leading-6 divide-y divide-gray-100"
                            >
                                <div class="flex justify-between py-3 gap-x-4">
                                    <dt class="text-gray-500">Last invoice</dt>
                                    <dd class="text-gray-700">
                                        <time
                                            :datetime="
                                                client.lastInvoice.dateTime
                                            "
                                            >{{ client.lastInvoice.date }}</time
                                        >
                                    </dd>
                                </div>
                                <div class="flex justify-between py-3 gap-x-4">
                                    <dt class="text-gray-500">Amount</dt>
                                    <dd class="flex items-start gap-x-2">
                                        <div class="font-medium text-gray-900">
                                            {{ client.lastInvoice.amount }}
                                        </div>
                                        <div
                                            :class="[
                                                statuses[
                                                    client.lastInvoice.status
                                                ],
                                                'rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset',
                                            ]"
                                        >
                                            {{ client.lastInvoice.status }}
                                        </div>
                                    </dd>
                                </div>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref } from "vue";
import {
    Dialog,
    DialogPanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from "@headlessui/vue";
import {
    ArrowDownCircleIcon,
    ArrowPathIcon,
    ArrowUpCircleIcon,
    Bars3Icon,
    EllipsisHorizontalIcon,
    PlusSmallIcon,
} from "@heroicons/vue/20/solid";
import { BellIcon, XMarkIcon } from "@heroicons/vue/24/outline";

const navigation = [
    { name: "Home", href: "#" },
    { name: "Invoices", href: "#" },
    { name: "Clients", href: "#" },
    { name: "Expenses", href: "#" },
];
const secondaryNavigation = [
    { name: "Last 7 days", href: "#", current: true },
    { name: "Last 30 days", href: "#", current: false },
    { name: "All-time", href: "#", current: false },
];
const stats = [
    {
        name: "Revenue",
        value: "$405,091.00",
        change: "+4.75%",
        changeType: "positive",
    },
    {
        name: "Overdue invoices",
        value: "$12,787.00",
        change: "+54.02%",
        changeType: "negative",
    },
    {
        name: "Outstanding invoices",
        value: "$245,988.00",
        change: "-1.39%",
        changeType: "positive",
    },
    {
        name: "Expenses",
        value: "$30,156.00",
        change: "+10.18%",
        changeType: "negative",
    },
];
const statuses = {
    Paid: "text-green-700 bg-green-50 ring-green-600/20",
    Withdraw: "text-gray-600 bg-gray-50 ring-gray-500/10",
    Overdue: "text-red-700 bg-red-50 ring-red-600/10",
};
const people = [
    "Lindsay Walton",
    "Front-end Developer",
    "lindsay.walton@example.com",
    "lindsay.walton@example.com",
    "lindsay.walton@example.com",
    "lindsay.walton@example.com",

    "Member",
    "Member",
];
const clients = [
    {
        id: 1,
        name: "Tuple",
        imageUrl: "https://tailwindui.com/img/logos/48x48/tuple.svg",
        lastInvoice: {
            date: "December 13, 2022",
            dateTime: "2022-12-13",
            amount: "$2,000.00",
            status: "Overdue",
        },
    },
    {
        id: 2,
        name: "SavvyCal",
        imageUrl: "https://tailwindui.com/img/logos/48x48/savvycal.svg",
        lastInvoice: {
            date: "January 22, 2023",
            dateTime: "2023-01-22",
            amount: "$14,000.00",
            status: "Paid",
        },
    },
    {
        id: 3,
        name: "Reform",
        imageUrl: "https://tailwindui.com/img/logos/48x48/reform.svg",
        lastInvoice: {
            date: "January 23, 2023",
            dateTime: "2023-01-23",
            amount: "$7,600.00",
            status: "Paid",
        },
    },
];

const mobileMenuOpen = ref(false);
</script>
