<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import LayoutHeader from "@/Layouts/LayoutHeader.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("users"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<script>
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";

export default {
    layout: LayoutAuthenticated,
};
</script>
<style lang="scss" scoped>
.create-user {
    display: flex;
    justify-content: center;
    color: black;
    width: 100%;
    height: calc(100vh - 10rem);

    form {
        background-color: var(--secondaryA);
        width: 30rem;
        height: 30rem;
        padding: 3rem 2rem;
        border-radius: 1rem;
        margin-top: 2rem;
    }
}
</style>
<template>
    <Head title="Create User" />
    <LayoutHeader>
        <span class="border-gray-300"> User Management</span>
        <i class="fa-solid fa-caret-right"></i>
        <span class="text-white">Create User</span>
    </LayoutHeader>
    <div class="create-user">
        <form @submit.prevent="submit">
            <div class="mt-4 relative">
                <div
                    v-if="$page.props.errors.name"
                    v-text="$page.props.errors.name"
                    class="text-red-500 text-xs mt-1 absolute right-0"
                ></div>
                <BreezeLabel for="name" value="Name" />
                <BreezeInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    autofocus
                    autocomplete="name"
                    required
                />
            </div>

            <div class="mt-4 relative">
                <div
                    v-if="$page.props.errors.email"
                    v-text="$page.props.errors.email"
                    class="text-red-500 text-xs mt-1 absolute right-0"
                ></div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    autocomplete="username"
                    required
                />
            </div>

            <div class="mt-4 relative">
                <div
                    v-if="$page.props.errors.password"
                    v-text="$page.props.errors.password"
                    class="text-red-500 text-xs mt-1 absolute right-0"
                ></div>
                <BreezeLabel for="password" value="Password" />
                <BreezeInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    autocomplete="new-password"
                    required
                />
            </div>

            <div class="mt-4 relative">
                <div
                    v-if="$page.props.errors.password"
                    v-text="$page.props.errors.password"
                    class="text-red-500 text-xs mt-1 absolute right-0"
                ></div>
                <BreezeLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />
                <BreezeInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    autocomplete="new-password"
                    required
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <BreezeButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Create
                </BreezeButton>
            </div>
        </form>
    </div>
</template>
