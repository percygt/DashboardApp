<script setup>
import AppLogoA from "@/Components/ApplicationLogoA.vue";
import NavLink from "@/Components/Navlink/NavLink.vue";
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
            <AppLogoA class="app-logo" />
        </div>
    </div>
    <div class="sidebar-content">
        <div className="sidebar-b">
            <div class="sidebar-b-link">
                <NavLink
                    :href="route('dashboard')"
                    :active="$page.component === 'Dashboard' ? true : false"
                >
                    <ViewDashboardIcon :size="30" />
                </NavLink>
                <NavLink
                    :href="route('users')"
                    :active="$page.component === 'Users/Index' ? true : false"
                >
                    <AccountGroupIcon :size="30" />
                </NavLink>
            </div>
        </div>
        <div className="sidebar-c">
            <div class="sidebar-c-link">
                <a href="https://percygt.github.io/portfolio/" target="_blank"
                    ><WebIcon :size="30"
                /></a>

                <a href="https://www.linkedin.com/in/percygt/" target="_blank"
                    ><LinkedinIcon :size="30"
                /></a>
                <a href="https://github.com/percygt/" target="_blank"
                    ><GithubIcon :size="30"
                /></a>
                <a href="https://t.me/prcygt" target="_blank">
                    <Telegram />
                </a>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.sidebar-a {
    display: flex;
    padding: 0 1rem;
    justify-content: center;

    .side-link {
        height: 4rem;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        border-bottom: 1px solid var(--textC);
        cursor: pointer;
        .app-logo {
            height: 2rem;
        }
    }
}
.sidebar-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: calc(100vh - 4rem);

    .sidebar-b {
        align-items: center;
        display: flex;
        flex-direction: column;
        .sidebar-b-link {
            margin: 3rem 0 1rem;
            align-items: center;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
    }
    .sidebar-c {
        display: flex;
        flex-direction: column;

        padding: 1rem;
        .sidebar-c-link {
            border-top: 1px solid var(--textC);
            padding-top: 1rem;
            align-items: center;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
    }
}
</style>
