<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";

import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>
<script>
import LayoutGuest from "@/Layouts/LayoutGuest.vue";
export default {
    layout: LayoutGuest,
};
</script>
<style>
form {
    color: black;
}
</style>
<template>
    <Head title="Log in" />

    <BreezeValidationErrors class="mb-4" />

    <div v-if="status" class="mb-4 font-medium text-sm textB">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div>
            <BreezeLabel for="email" value="Email" />
            <BreezeInput
                id="email"
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                required
                autofocus
                autocomplete="username"
            />
        </div>

        <div class="mt-4">
            <BreezeLabel for="password" value="Password" />
            <BreezeInput
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password"
                required
                autocomplete="current-password"
            />
        </div>

        <div class="block mt-4">
            <label class="flex items-center">
                <BreezeCheckbox
                    name="remember"
                    v-model:checked="form.remember"
                />
                <span class="ml-2 text-sm textB">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <Link
                :href="route('register')"
                class="underline text-sm textB hover:text-gray-600 pr-3"
            >
                Not yet Registered?
            </Link>
            <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="underline text-sm textB hover:text-gray-600 px-3"
            >
                Forgot your password?
            </Link>

            <BreezeButton
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Log in
            </BreezeButton>
        </div>
    </form>
</template>
