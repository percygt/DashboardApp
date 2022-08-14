<script setup>
import LayoutHeader from "@/Layouts/LayoutHeader.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import UpdateUser from "@/Components/Modal/UpdateUser.vue";
import AddUser from "@/Components/Modal/AddUser.vue";
import AccountPlusIcon from "vue-material-design-icons/AccountPlus.vue";
import AccountEditIcon from "vue-material-design-icons/AccountEdit.vue";
import TrashCanIcon from "vue-material-design-icons/TrashCan.vue";

const props = defineProps({ users: Object, filters: Object, can: Object });
const isModalOpen = ref(false);
const isAddUserOpen = ref(false);
const search = ref(props.filters.search);

const userData = useForm({
    id: "",
    name: "",
    email: "",
    role: "",
    password: "",
});
watch(
    search,
    debounce((value) => {
        Inertia.get(
            "/users",
            { search: value },
            { preserveState: true, replace: true }
        );
    }, 300)
);

const destroy = (id) => {
    if (confirm("Are  you sure?")) {
        Inertia.delete(route("users.destroy", id));
    }
};
</script>
<script>
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";

export default {
    layout: LayoutAuthenticated,
};
</script>

<template>
    <UpdateUser v-model:isModalOpen="isModalOpen" v-model:userData="userData" />
    <AddUser v-model:isAddUserOpen="isAddUserOpen" />
    <Head title="User Management" />
    <div class="table-container">
        <div class="table">
            <LayoutHeader>
                <span class="border-gray-300"> User Management</span>
            </LayoutHeader>

            <div
                class="user-table overflow-x-auto relative shadow-md sm:rounded-lg"
            >
                <div class="button-container">
                    <div>
                        <button
                            class="text-blue-600"
                            v-if="props.can.create_user"
                            @click="
                                {
                                    isAddUserOpen = true;
                                }
                            "
                        >
                            <AccountPlusIcon :size="20" />
                            <span class="add-user">Create User</span>
                        </button>
                    </div>

                    <input
                        v-model="search"
                        type="text"
                        placeholder="Search User"
                        class="bg-gray-0 border my-4 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    />
                </div>

                <table class="dark:text-gray-400">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users.data" :key="user.id">
                            <th scope="row">
                                {{ user.id }}
                            </th>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                {{ user.role }}
                            </td>
                            <td>
                                <button
                                    @click="
                                        {
                                            isModalOpen = true;
                                            userData.id = user.id;
                                            userData.name = user.name;
                                            userData.email = user.email;
                                            userData.role = user.role;
                                        }
                                    "
                                    v-if="user.can.update"
                                    class="font-medium text-blue-600 dark:text-blue-500 mx-1"
                                >
                                    <AccountEditIcon />
                                </button>
                                <button
                                    @click="destroy(user.id)"
                                    v-if="user.can.update"
                                    class="font-medium text-blue-600 dark:text-blue-500 mx-1"
                                >
                                    <TrashCanIcon />
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="paginate">
                    <Link
                        :is="link.url ? 'Link' : 'span'"
                        v-for="link in users.links"
                        :href="link.url"
                        v-html="link.label"
                        :class="
                            link.url
                                ? link.active
                                    ? 'page-active'
                                    : ''
                                : 'text-gray-400'
                        "
                        preserve-scroll
                    ></Link>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
.dash-bottom {
    margin: 2rem 0;
}
.table-container {
    display: flex;
    justify-content: center;
    .table {
        width: 90vw;
        max-width: 100rem;
        .user-table {
            display: flex;
            width: 100%;
            align-items: flex-end;
            flex-direction: column;
            background-color: var(--secondaryA);
            margin: 1rem;
            .button-container {
                margin: 0 2rem;
                display: flex;
                width: calc(100% - 4rem);
                justify-content: space-between;
                align-items: center;
                button {
                    display: flex;
                    width: 8rem;
                    height: 2rem;
                    justify-content: center;
                    gap: 0.25rem;
                    align-items: center;
                    font-size: 1rem;
                    line-height: 1rem;
                    transition: var(--transitionB);
                    &:hover {
                        color: var(--textC);
                        text-decoration: underline;
                    }
                    .add-user {
                        margin-top: 0.15rem;
                    }
                }
            }
            table {
                width: 100%;
                font-size: 0.875rem /* 14px */;
                line-height: 1.25rem /* 20px */;
                text-align: left;
                thead {
                    z-index: 999999;
                    tr {
                        background-color: var(--accentB);
                        height: 2.5rem;
                        color: var(--textA);
                        th {
                            padding-left: 1rem;
                            &:first-child {
                                border-top-left-radius: 0.5rem;
                                border-bottom-left-radius: 0.5rem;
                                width: 5rem;
                            }
                            &:last-child {
                                border-top-right-radius: 0.5rem;
                                border-bottom-right-radius: 0.5rem;
                            }
                            &:not(:first-child, :last-child) {
                                width: 25%;
                            }
                        }
                    }
                }
                tbody {
                    background-color: var(--primaryB);
                    tr {
                        height: 3rem;

                        td,
                        th {
                            padding-left: 1rem;
                        }
                        td:last-child {
                            display: flex;
                            align-items: center;
                            height: 3rem;
                        }
                    }
                    tr:nth-child(even) {
                        background-color: var(--secondaryB);
                    }
                }
            }

            .paginate {
                padding: 1rem;
                > * {
                    padding: 0.5rem 1rem;
                    &:hover {
                        color: var(--accentA);
                    }
                }
            }
        }
    }
}

.page-active {
    color: var(--accentA);
    font-size: 1.2rem;
    font-weight: 900;
}
</style>
