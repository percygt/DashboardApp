<script setup>
import { sidebar } from "@/Plugins/eventBus";
import SidebarWide from "./SidebarWide.vue";
import SidebarNarrow from "./SidebarNarrow.vue";
</script>

<template>
    <aside :class="sidebar.isActive ? 'active-side' : 'not-active-side'">
        <div v-if="!sidebar.isActive"><SidebarNarrow /></div>
        <div v-else>
            <SidebarWide />
        </div>
    </aside>
</template>

<style lang="scss" scoped>
.active-side {
    width: 20rem;
    background-color: var(--secondaryA);
    height: 100vh;
    position: fixed;
    z-index: 9999;
    transition: var(--transitionA);
}
.not-active-side {
    width: 5rem;
    background-color: var(--secondaryA);
    transition: var(--transitionA);
    height: 100vh;
    position: fixed;
    z-index: 9999;
}
</style>
