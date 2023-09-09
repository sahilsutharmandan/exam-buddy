<template>
    <div class="pb-32 bg-cyan-600">
        <Disclosure
            as="nav"
            class="border-b border-opacity-25 border-cyan-300 bg-cyan-600 lg:border-none"
            v-slot="{ open }"
        >
            <div class="px-2 mx-auto max-w-7xl sm:px-4 lg:px-8">
                <div
                    class="relative flex items-center justify-between h-16 lg:border-b lg:border-cyan-400 lg:border-opacity-25"
                >
                    <div class="flex items-center px-2 lg:px-0">
                        <div class="flex-shrink-0">
                            <Link :href="route('dashboard')">
                                <ApplicationLogo
                                    class="block w-auto text-gray-800 fill-current h-9"
                                />
                            </Link>
                        </div>
                        <div class="hidden lg:ml-10 lg:block">
                            <div class="flex space-x-4">
                                <Link
                                    v-for="item in navigation"
                                    :key="item.name"
                                    :href="item.href"
                                    :class="[
                                        item.current
                                            ? 'bg-cyan-700 text-white'
                                            : 'text-white hover:bg-cyan-500 hover:bg-opacity-75',
                                        'rounded-md py-2 px-3 text-sm font-medium',
                                    ]"
                                    :aria-current="
                                        item.current ? 'page' : undefined
                                    "
                                    >{{ item.name }}</Link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex justify-center flex-1 px-2 lg:ml-6 lg:justify-end"
                    >
                        <div class="w-full max-w-lg lg:max-w-xs">
                            <label for="search" class="sr-only">Search</label>
                            <div
                                class="relative text-gray-400 focus-within:text-gray-600"
                            >
                                <div
                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                                >
                                    <MagnifyingGlassIcon
                                        class="w-5 h-5"
                                        aria-hidden="true"
                                    />
                                </div>
                                <input
                                    id="search"
                                    class="block w-full rounded-md border-0 bg-white py-1.5 pl-10 pr-3 text-gray-900 focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-cyan-600 sm:text-sm sm:leading-6"
                                    placeholder="Search"
                                    type="search"
                                    name="search"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="flex lg:hidden">
                        <!-- Mobile menu button -->
                        <DisclosureButton
                            class="relative inline-flex items-center justify-center p-2 rounded-md text-cyan-200 bg-cyan-600 hover:bg-cyan-500 hover:bg-opacity-75 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-cyan-600"
                        >
                            <span class="absolute -inset-0.5" />
                            <span class="sr-only">Open main menu</span>
                            <Bars3Icon
                                v-if="!open"
                                class="block w-6 h-6"
                                aria-hidden="true"
                            />
                            <XMarkIcon
                                v-else
                                class="block w-6 h-6"
                                aria-hidden="true"
                            />
                        </DisclosureButton>
                    </div>
                    <div class="hidden lg:ml-4 lg:block">
                        <div class="flex items-center">
                            <button
                                type="button"
                                class="relative flex-shrink-0 p-1 rounded-full text-cyan-200 bg-cyan-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-cyan-600"
                            >
                                <span class="absolute -inset-1.5" />
                                <span class="sr-only">View notifications</span>
                                <BellIcon class="w-6 h-6" aria-hidden="true" />
                            </button>

                            <!-- Profile dropdown -->
                            <Menu as="div" class="relative flex-shrink-0 ml-3">
                                <div>
                                    <MenuButton
                                        class="relative flex text-sm text-white rounded-full bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-cyan-600"
                                    >
                                        {{ $page.props.auth.user.name }}

                                        <svg
                                            class="ml-2 -mr-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </MenuButton>
                                </div>
                                <transition
                                    enter-active-class="transition duration-100 ease-out"
                                    enter-from-class="transform scale-95 opacity-0"
                                    enter-to-class="transform scale-100 opacity-100"
                                    leave-active-class="transition duration-75 ease-in"
                                    leave-from-class="transform scale-100 opacity-100"
                                    leave-to-class="transform scale-95 opacity-0"
                                >
                                    <MenuItems
                                        class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    >
                                        <MenuItem
                                            v-for="item in userNavigation"
                                            :key="item.name"
                                            v-slot="{ active }"
                                        >
                                            <Link
                                                :href="item.href"
                                                :class="[
                                                    active ? 'bg-gray-100' : '',
                                                    'block px-4 py-2 text-sm text-gray-700',
                                                ]"
                                                >{{ item.name }}</Link
                                            >
                                        </MenuItem>
                                        <MenuItem>
                                            <Link
                                                :href="route('admin.logout')"
                                                method="post"
                                                as="button"
                                                :class="[
                                                    active ? 'bg-gray-100' : '',
                                                    'block px-4 py-2 text-sm text-gray-700',
                                                ]"
                                                >Logout</Link
                                            >
                                        </MenuItem>
                                    </MenuItems>
                                </transition>
                            </Menu>
                        </div>
                    </div>
                </div>
            </div>

            <DisclosurePanel class="lg:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <DisclosureButton
                        v-for="item in navigation"
                        :key="item.name"
                        as="a"
                        :href="item.href"
                        :class="[
                            item.current
                                ? 'bg-cyan-700 text-white'
                                : 'text-white hover:bg-cyan-500 hover:bg-opacity-75',
                            'block rounded-md py-2 px-3 text-base font-medium',
                        ]"
                        :aria-current="item.current ? 'page' : undefined"
                        >{{ item.name }}</DisclosureButton
                    >
                </div>
                <div class="pt-4 pb-3 border-t border-cyan-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img
                                class="w-10 h-10 rounded-full"
                                :src="user.imageUrl"
                                alt=""
                            />
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-white">
                                {{ user.name }}
                            </div>
                            <div class="text-sm font-medium text-cyan-300">
                                {{ user.email }}
                            </div>
                        </div>
                        <button
                            type="button"
                            class="relative flex-shrink-0 p-1 ml-auto rounded-full text-cyan-200 bg-cyan-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-cyan-600"
                        >
                            <span class="absolute -inset-1.5" />
                            <span class="sr-only">View notifications</span>
                            <BellIcon class="w-6 h-6" aria-hidden="true" />
                        </button>
                    </div>
                    <div class="px-2 mt-3 space-y-1">
                        <DisclosureButton
                            v-for="item in userNavigation"
                            :key="item.name"
                            as="a"
                            :href="item.href"
                            class="block px-3 py-2 text-base font-medium text-white rounded-md hover:bg-cyan-500 hover:bg-opacity-75"
                            >{{ item.name }}</DisclosureButton
                        >
                    </div>
                </div>
            </DisclosurePanel>
        </Disclosure>
    </div>
</template>
<script setup>
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from "@headlessui/vue";
import { MagnifyingGlassIcon } from "@heroicons/vue/20/solid";
import { Bars3Icon, BellIcon, XMarkIcon } from "@heroicons/vue/24/outline";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const user = {
    name: "Tom Cook",
    email: "tom@example.com",
    imageUrl:
        "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
};
const navigation = [
    {
        name: "Dashboard",
        href: route("admin.dashboard"),
        current: window.location.pathname === "/admin/dashboard",
    },
    {
        name: "Tests",
        href: route("admin.tests.index"),
        current: window.location.pathname === "/admin/tests",
    },
    { name: "Projects", href: "#", current: false },
    { name: "Calendar", href: "#", current: false },
    { name: "Reports", href: "#", current: false },
];
const userNavigation = [
    { name: "Your Profile", href: route("admin.profile.edit") },
    { name: "Settings", href: route("admin.profile.edit") },
];
</script>
