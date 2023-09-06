<template>
    <AdminAuthenticatedLayout> Admin Dashboard here </AdminAuthenticatedLayout>
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
