<script setup>
import AppLogo from "@/Components/ApplicationLogoB.vue";
import NavLink from "@/Components/Navlink/NavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { onMounted, onUnmounted, ref } from "vue";
import { permissions } from "@/Plugins/permissions";

const closeOnEscape = (e) => {
    if (open.value && e.key === "Escape") {
        open.value = false;
    }
};
const open = ref(false);
onMounted(() => document.addEventListener("keydown", closeOnEscape));
onUnmounted(() => document.removeEventListener("keydown", closeOnEscape));
</script>

<style lang="scss" scoped>
aside {
    background-color: var(--secondaryA);
    width: 20rem;

    height: 100vh;
    position: fixed;
    z-index: 9999;
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
        align-items: center;
        justify-content: flex-start;
        padding: 1rem;
        margin: 0 1rem 2rem;
        gap: 1rem;
        background-image: var(--blurB);

        border-radius: 0.25rem;
        i {
            font-size: 1.5rem;
            background-color: var(--accentB);
            height: 3rem;
            width: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 2rem;
        }
    }
    .sidebar-c {
        display: flex;
        flex-direction: column;
        padding: 0 2rem;
        gap: 1rem;
        .sidebar-c-label {
            font-size: 0.7rem;
            color: var(--textC);
        }
        .sidebar-c-link {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            .sidebar-c-dashboard,
            .sidebar-c-usermanagement {
                display: flex;
                gap: 1rem;
                align-items: center;
                cursor: pointer;
            }

            .usermanagement-content {
                display: flex;
                flex-direction: column;
                margin-left: 3rem;
            }
        }
    }
    .link-close {
        color: var(--textC);
    }
    .dropdown-open {
        transform: rotate(180deg);
    }
}
</style>

<template>
    <aside>
        <div className="sidebar-a">
            <Link :href="route('home')" class="side-link">
                <AppLogo class="app-logo" />
            </Link>
        </div>

        <div className="sidebar-b shadow">
            <i class="fa-solid fa-user"></i>
            <span> {{ $page.props.auth.user.name }}</span>
        </div>
        <div className="sidebar-c">
            <span class="sidebar-c-label">NAVIGATION</span>
            <div class="sidebar-c-link">
                <NavLink
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                    class="sidebar-c-dashboard"
                >
                    <i class="fa fa-home fa-fw"></i>
                    Dashboard
                </NavLink>

                <span
                    @click="open = !open"
                    class="sidebar-c-usermanagement"
                    :class="{
                        'link-close':
                            !route().current('users') &&
                            !route().current('users.create'),
                    }"
                >
                    <i class="fa fa-user-group fa-fw" />
                    User Management
                    <i
                        class="fa-solid fa-caret-down"
                        :class="{ 'dropdown-open': open }"
                    />
                </span>
                <transition
                    enter-active-class="transition ease-out duration-200"
                    enter-from-class="transform opacity-0 scale-95"
                    enter-to-class="transform opacity-100 scale-100"
                    leave-active-class="transition ease-in duration-75"
                    leave-from-class="transform opacity-100 scale-100"
                    leave-to-class="transform opacity-0 scale-95"
                >
                    <span v-show="open" class="usermanagement-content">
                        <NavLink
                            :href="route('users')"
                            :active="$page.url === '/users' ? true : false"
                        >
                            User List
                        </NavLink>
                        <NavLink
                            v-if="permissions.canCreateUser"
                            :href="route('users.create')"
                            :active="
                                $page.url === '/users/create' ? true : false
                            "
                        >
                            Create User
                        </NavLink>
                    </span>
                </transition>
            </div>
        </div>
    </aside>
</template>
