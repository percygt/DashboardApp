<script setup>
import AppLogoB from "@/Components/ApplicationLogoB.vue";
import AppLogoA from "@/Components/ApplicationLogoA.vue";
import NavLink from "@/Components/Navlink/NavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { onMounted, onUnmounted, ref } from "vue";
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
            <AppLogoA class="app-logo" />
        </Link>
    </div>
    <div className="sidebar-b">
        <div class="sidebar-b-link">
            <NavLink
                :href="route('dashboard')"
                :active="route().current('dashboard')"
            >
                <ViewDashboardIcon :size="30" />
            </NavLink>
            <NavLink
                :href="route('users')"
                :active="$page.url === '/users' ? true : false"
            >
                <AccountGroupIcon :size="30" />
            </NavLink>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.sidebar-a {
    display: flex;
    border-bottom: var(--border);
    justify-content: center;

    .side-link {
        height: 4rem;
        width: 80%;
        display: flex;
        align-items: center;
        justify-content: center;
        border-bottom: 1px solid var(--textC);
        .app-logo {
            height: 2rem;
        }
    }
}

.sidebar-b {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    .sidebar-b-link {
        margin-top: 2rem;
        align-items: center;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }
}
</style>
