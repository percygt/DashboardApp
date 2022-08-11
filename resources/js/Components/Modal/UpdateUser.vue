<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import { onClickOutside } from "@vueuse/core";
import { ref, computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const modalRef = ref(null);
const props = defineProps({
    isModalOpen: Boolean,
    userData: Object,
});
const errors = computed(() => usePage().props.value.errors);
const hasErrors = computed(() => Object.keys(errors.value).length > 0);

const emit = defineEmits(["update:isModalOpen", "submit"]);

if (!hasErrors) {
    emit("update:isModalOpen", false);
}

onClickOutside(modalRef, () => emit("update:isModalOpen", false));
const submit = () => {
    props.userData.post(route("users.update", { id: props.userData.id }), {
        onFinish: () => {
            props.userData.password = "";
        },
    });
};
computed;
</script>
<template>
    <Teleport to="#modal">
        <div class="modal-bg" v-if="isModalOpen">
            <div class="modal relative" ref="modalRef">
                <span
                    @click="$emit('update:isModalOpen', false)"
                    class="close absolute top-2 right-4 cursor-pointer text-xl"
                    >&times;</span
                >

                <form @submit.prevent="submit">
                    <div class="mt-4 relative">
                        <div
                            class="text-red-500 text-xs mt-1 absolute right-0"
                        ></div>
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
                            v-model="userData.name"
                            required
                        />
                    </div>

                    <div class="mt-4 relative">
                        <div
                            class="text-red-500 text-xs mt-1 absolute right-0"
                        ></div>
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
                            v-model="userData.email"
                            required
                        />
                    </div>

                    <div class="mt-4 relative">
                        <div
                            class="text-red-500 text-xs mt-1 absolute right-0"
                        ></div>
                        <!-- <input type="password" /> -->
                        <BreezeLabel for="role" value="Role" />
                        <select
                            id="cars"
                            name="cars"
                            class="mt-1 block w-full rounded-md text-black"
                            v-model="userData.role"
                        >
                            <option value="Admin">Admin</option>
                            <option value="Editor">Editor</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                    <div class="mt-4 relative">
                        <div
                            class="text-red-500 text-xs mt-1 absolute right-0"
                        ></div>
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
                            v-model="userData.password"
                            autocomplete="new-password"
                            autofocus
                            required
                        />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <BreezeButton
                            class="ml-4"
                            :class="{ 'opacity-25': userData.processing }"
                            :disabled="userData.processing"
                        >
                            update
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>
    </Teleport>
</template>

<style lang="scss" scoped>
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
