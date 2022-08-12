<script setup>
import BreezeApplicationLogo from "@/Components/ApplicationLogoA.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-img"
    >
        <div>
            <Link href="/">
                <BreezeApplicationLogo
                    class="w-20 h-20 fill-current textB hover-minus"
                />
            </Link>
        </div>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 auth-form shadow-md overflow-hidden sm:rounded-lg demo"
        >
            <div>Demo</div>
            <span>Email: admin@admin.com | Password: admin123</span>
        </div>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 auth-form shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
<style lang="scss" scoped>
.bg-img {
    background-image: url("/assets/img/bg-auth.svg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
.auth-form {
    background-color: var(--primaryB);
}

.hover-minus:hover {
    scale: 0.975;
}
.demo {
    display: flex;
    flex-direction: column;
    font-size: 0.8rem;
    align-items: center;
    div {
        font-weight: 900;
        font-size: 1rem;
    }
}
</style>
