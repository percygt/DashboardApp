<script setup>
import AppLogoB from "@/Components/ApplicationLogoB.vue";
import AppLogoA from "@/Components/ApplicationLogoA.vue";
import NavLink from "@/Components/Navlink/NavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { onMounted, onUnmounted, ref } from "vue";
import { permissions, sidebar } from "@/Plugins/eventBus";
import ViewDashboardIcon from "vue-material-design-icons/ViewDashboard.vue";
import AccountGroupIcon from "vue-material-design-icons/AccountGroup.vue";

const closeOnEscape = (e) => {
    if (open.value && e.key === "Escape") {
        open.value = false;
    }
};

const open = ref(false);
onMounted(() => document.addEventListener("keydown", closeOnEscape));
onUnmounted(() => document.removeEventListener("keydown", closeOnEscape));
</script>

<template>
    <div className="sidebar-a">
        <Link :href="route('home')" class="side-link">
            <AppLogoB class="app-logo" />
        </Link>
    </div>

    <div className="sidebar-b">
        <span class="sidebar-b-label">NAVIGATION</span>
        <div class="sidebar-b-link">
            <NavLink
                :href="route('dashboard')"
                :active="route().current('dashboard')"
            >
                <ViewDashboardIcon :size="30" />
                Dashboard
            </NavLink>
            <NavLink
                :href="route('users')"
                :active="$page.url === '/users' ? true : false"
            >
                <AccountGroupIcon :size="30" />
                User Management
            </NavLink>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.sidebar-a {
    display: flex;
    padding: 1rem 2rem;
    .side-link {
        height: 4rem;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

        .app-logo {
            height: 2.5rem;
            padding-right: 1rem;
        }
    }
}

.sidebar-b {
    display: flex;
    flex-direction: column;
    padding: 0 2rem;
    gap: 1rem;
    margin-top: 1.5rem;
    .sidebar-b-label {
        font-size: 0.7rem;
        color: var(--textC);
    }
    .sidebar-b-link {
        margin-top: 1rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;

        > * {
            display: flex;
            gap: 1rem;
            align-items: center;
            width: 15rem;
        }
    }
}
</style>
