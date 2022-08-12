<script setup>
import NavbarAdmin from "@/Components/Navbar/NavbarAdmin.vue";
import Sidebar from "@/Components/Sidebar/Sidebar.vue";
import Footer from "@/Components/Footer/Footer.vue";
import { sidebar } from "@/Plugins/eventBus";
</script>
<style lang="scss" scoped>
.layout-container {
    height: 100%;
    min-height: 100vh;

    .content-container {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        margin-left: 5rem;
        height: 100%;
        min-width: calc(100vw - 22rem);

        .content {
            min-height: calc(100vh - 6.5rem);
            padding: 0 1rem;
        }
    }
    .active {
        margin-left: 20rem;
        transition: var(--transitionA);
    }
    .not-active {
        margin-left: 5rem;
        transition: var(--transitionA);
    }
}
</style>
<template>
    <div class="layout-container bgPrimaryA">
        <Sidebar />
        <div
            class="content-container bgMid"
            :class="sidebar.isActive ? 'active' : 'not-active'"
        >
            <NavbarAdmin />
            <div class="content">
                <!-- Page Heading -->

                <!-- Page Content -->
                <main>
                    <slot />
                </main>
            </div>
            <Footer />
        </div>
    </div>
</template>
