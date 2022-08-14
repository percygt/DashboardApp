<script setup>
import AppLogoB from "@/Components/ApplicationLogoB.vue";
import NavLink from "@/Components/Navlink/NavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { onMounted, onUnmounted, ref } from "vue";
import ViewDashboardIcon from "vue-material-design-icons/ViewDashboard.vue";
import AccountGroupIcon from "vue-material-design-icons/AccountGroup.vue";
import GithubIcon from "vue-material-design-icons/Github.vue";
import LinkedinIcon from "vue-material-design-icons/Linkedin.vue";
import WebIcon from "vue-material-design-icons/Web.vue";
import Telegram from "@/Assets/Images/Telegram.vue";
import { sidebar } from "@/Plugins/eventBus";

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
        <div class="side-link" @click="sidebar.isActive = !sidebar.isActive">
            <AppLogoB class="app-logo" />
        </div>
    </div>
    <div class="sidebar-content">
        <div className="sidebar-b">
            <span class="sidebar-b-label">NAVIGATION</span>
            <div class="sidebar-b-link">
                <NavLink
                    :href="route('dashboard')"
                    :active="$page.component === 'Dashboard' ? true : false"
                >
                    <ViewDashboardIcon :size="30" />
                    Dashboard
                </NavLink>
                <NavLink
                    :href="route('users')"
                    :active="$page.component === 'Users/Index' ? true : false"
                >
                    <AccountGroupIcon :size="30" />
                    User Management
                </NavLink>
            </div>
        </div>
        <div className="sidebar-c">
            <div class="sidebar-c-link">
                <a
                    href="https://github.com/percygt/DashboardApp"
                    target="_blank"
                    ><WebIcon :size="30"
                /></a>

                <a
                    href="https://github.com/percygt/DashboardApp"
                    target="_blank"
                    ><LinkedinIcon :size="30"
                /></a>
                <a
                    href="https://github.com/percygt/DashboardApp"
                    target="_blank"
                    ><GithubIcon :size="30"
                /></a>
                <a
                    href="https://github.com/percygt/DashboardApp"
                    target="_blank"
                >
                    <Telegram />
                </a>
            </div>
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
        cursor: pointer;

        .app-logo {
            height: 2.5rem;
            padding-right: 1rem;
        }
    }
}

.sidebar-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: calc(100vh - 6rem);
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
    .sidebar-c {
        padding: 1rem;

        .sidebar-c-link {
            display: flex;
            justify-content: space-around;
            border-top: 1px solid var(--textC);
            align-items: center;
            padding-top: 1rem;
            display: flex;
            gap: 1rem;
        }
    }
}
</style>
