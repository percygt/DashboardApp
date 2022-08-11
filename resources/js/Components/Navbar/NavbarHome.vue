<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import logo from "@/Assets/Logo/logoB.svg";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<style lang="scss" scoped>
nav {
    // background-color: var(--clearA);
    width: 100vw;
    display: flex;
    position: fixed;
    top: 0;
    justify-content: space-between;
    padding: 0 5rem;
    height: 4rem;
    align-items: center;
    .nav-right {
        display: flex;
        .n-link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.3rem 0.75rem;
            border-radius: 1rem;
            font-weight: 900;
            color: var(--textB);
            border: 0.5px solid transparent;
            background-color: var(--accentB);
            &:hover {
                color: var(--accentA);
                background-color: transparent;
                border: 0.5px solid var(--accentA);
                scale: 0.975;
                transition: var(--transitionA);
            }
        }
    }

    .logo-svg {
        height: 1.5rem;
    }
    /* CSS */
}
</style>
<template>
    <nav v-if="canLogin" class="sm:block">
        <img :src="logo" alt="..." class="logo-svg" />
        <div class="nav-right">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="text-sm n-link"
            >
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm n-link">
                    Log in
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 text-sm n-link"
                >
                    Register
                </Link>
            </template>
        </div>
    </nav>
</template>
