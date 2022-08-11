<script setup>
import NavbarAdmin from "@/Components/Navbar/NavbarAdmin.vue";
import Sidebar from "@/Components/Sidebar/Sidebar.vue";
import Footer from "@/Components/Footer/Footer.vue";
</script>
<style lang="scss" scoped>
.layout-container {
    height: 100%;
    min-height: 100vh;
    .content-container {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        margin-left: 20rem;
        min-height: calc(100vh - 3rem);
        min-width: calc(100vw - 22rem);
        .content {
            padding: 0 1rem;
        }
    }
}
</style>
<template>
    <div class="layout-container bgPrimaryA">
        <Sidebar />
        <div class="content-container bgMid">
            <NavbarAdmin />
            <div class="content">
                <!-- Page Heading -->

                <!-- Page Content -->
                <main>
                    <slot />
                </main>
            </div>
        </div>
        <Footer />
    </div>
</template>
