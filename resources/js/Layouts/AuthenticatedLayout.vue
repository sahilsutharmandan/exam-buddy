<template>
    <div>
        <div class="min-h-screen">
            <NavBar />

            <main class="-mt-32">
                <div
                    style="height: calc(100vh - 80px)"
                    class="p-4 mx-auto overflow-auto bg-white shadow max-w-7xl sm:p-6 rounded-xl scrollbar"
                >
                    <slot></slot>
                </div>
            </main>
        </div>
    </div>
</template>
<script setup>
import { ref } from "vue";
import NavBar from "./NavBar.vue";
</script>
