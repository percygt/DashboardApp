<script setup>
import NavDropdown from "@/Components/Dropdown/NavDropdown.vue";
import { Link } from "@inertiajs/inertia-vue3";

import Search from "../Input/Search.vue";
</script>

<template>
    <nav class="bgSecondaryB">
        <div class="nav-left"></div>
        <div class="nav-right">
            <NavDropdown align="right" width="100">
                <template #trigger>
                    <span class="nav-profile">
                        <button type="button">
                            <i class="fa-solid fa-user"></i>
                        </button>
                    </span>
                </template>

                <template #content>
                    <div class="nav-dropdown">
                        <span>Welcome!</span>
                        <div class="drop-link">
                            <a href="#" method="post" as="button">
                                <i class="fa-solid fa-user"></i>
                                My Account
                            </a>
                            <Link href="#" method="post" as="button"
                                ><i class="fa-solid fa-comments"></i>
                                Support
                            </Link>
                            <Link
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Log Out
                            </Link>
                        </div>
                    </div>
                </template>
            </NavDropdown>
        </div>
    </nav>
</template>
<style lang="scss" scoped>
nav {
    z-index: 99999;
    display: flex;
    height: 4rem;
    align-items: center;
    padding: 0 2rem;
    justify-content: space-between;

    .nav-right {
        .nav-profile {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            color: var(--textA);
            cursor: pointer;
            box-shadow: var(--shadow);
            height: 4rem;
            padding: 0 1rem;
            background-image: var(--blurA);

            button {
                i {
                    display: flex;
                    place-items: center;
                    justify-content: center;
                    font-size: 1rem;
                    width: 2.5rem;
                    height: 2.5rem;
                    background-color: var(--accentA);
                    border-radius: 1.25rem;
                    box-shadow: var(--shadow);
                }
            }
            &:hover {
                transition: var(--transitionA);
                color: var(--textB);
                i {
                    transition: var(--transitionA);
                    background-color: var(--accentB);
                }
            }
        }
        .nav-dropdown {
            span {
                display: flex;
                justify-content: center;
                font-size: 0.8rem;
                color: var(--textA);
                height: 2rem;
                align-items: center;
                border-bottom: var(--lineA);
            }
            .drop-link {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
                margin-top: 0.5rem;
                padding-bottom: 0.25rem;
                color: var(--textB);

                > * {
                    display: flex;
                    width: 100%;
                    font-size: 1rem;
                    padding: 0.5rem 1.5rem;
                    display: flex;
                    gap: 0.5rem;
                    align-items: center;
                    &:hover {
                        background-image: var(--blurA);
                    }
                }
            }
        }
    }
}
</style>
