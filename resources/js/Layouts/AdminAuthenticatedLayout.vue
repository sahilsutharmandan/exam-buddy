<template>
    <div>
        <div class="min-h-screen">
            <AdminNavBar />

            <main class="-mt-32">
                <div
                    style="min-height: calc(100vh - 100px)"
                    class="p-4 mx-auto bg-white shadow max-w-7xl sm:p-6 rounded-xl"
                >
                    <slot></slot>
                </div>
            </main>
        </div>
    </div>
</template>
<script setup>
import AdminNavBar from "./AdminNavBar.vue";
</script>
