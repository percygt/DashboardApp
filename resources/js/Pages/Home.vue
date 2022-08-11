<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import NavbarHome from "@/Components/Navbar/NavbarHome.vue";

import dashboard from "@/Assets/Images/Dashboard.svg";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Home" />

    <div
        class="home-container relative flex items-top justify-center min-h-screen bg-img dark:bg-gray-900"
    >
        <NavbarHome :canLogin="canLogin" :canRegister="canRegister" />
        <img :src="dashboard" alt="..." class="dashboard-svg" />
        <span class="text text-xl">Admin Dashboard</span>
    </div>
</template>

<style scoped>
.home-container {
    display: flex;
    align-items: center;
    display: flex;
    flex-direction: column;

    gap: 1rem;
}
.text {
    font-size: 2rem;
    font-weight: 900;
    color: var(--textB);
}

.dashboard-svg {
    height: 15rem;
}

.border-gray-200 {
    border-color: #edf2f7;
    border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
    color: #a0aec0;
    color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
    color: #718096;
    color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
    color: #4a5568;
    color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
    color: #1a202c;
    color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-gray-800 {
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
    }

    .dark\:bg-gray-900 {
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
    }

    .dark\:border-gray-700 {
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--tw-border-opacity));
    }

    .dark\:text-white {
        color: #fff;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .dark\:text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }
}
</style>
