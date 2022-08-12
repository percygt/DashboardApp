<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import { onClickOutside } from "@vueuse/core";
import { ref, computed } from "vue";
import { Head, Link, useForm, usePage } from "@inertiajs/inertia-vue3";
const props = defineProps({
    isAddUserOpen: Boolean,
});
const modalRef = ref(null);
const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const hasErrors = computed(() => Object.keys(form.errors).length > 0);

const emit = defineEmits(["update:isAddUserOpen", "submit"]);

const close = () => {
    emit("update:isAddUserOpen", false);
};

onClickOutside(modalRef, () => close());
const submit = () => {
    form.post(route("users"), {
        onSuccess: () => {
            form.password = "";
            form.password_confirmation = "";
            close();
        },
    });
};
</script>
<template>
    <Teleport to="#modal">
        <Transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div class="modal-bg" v-if="isAddUserOpen">
                <div class="modal relative" ref="modalRef">
                    <span
                        @click="close"
                        class="close absolute top-2 right-4 cursor-pointer text-xl"
                        >&times;</span
                    >
                    <h1>Create User</h1>
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
            </div>
        </Transition>
    </Teleport>
</template>

<style lang="scss" scoped>
h1 {
    display: flex;
    justify-content: center;
    font-weight: 900;
}
.modal-bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 99999999;
}
.modal {
    background-color: var(--secondaryA);
    width: 30rem;
    height: 30rem;
    padding: 3rem 2rem;
    border-radius: 1rem;
    margin-top: 2rem;
    input {
        color: black;
    }
}
</style>
