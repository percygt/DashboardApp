<script setup>
import GithubIcon from "vue-material-design-icons/Github.vue";
</script>
<template>
    <div class="footer-container">
        <a href="https://github.com/percygt/DashboardApp" target="_blank" s
            ><GithubIcon :size="20" />Github</a
        >

        <span>© 2022 PRCY. Built using Laravel 9, Vue 3 and Inertia.</span>
    </div>
</template>

<style lang="scss" scoped>
.footer-container {
    color: var(--textC);
    background-color: var(--secondaryB);
    display: flex;
    z-index: 99999;

    align-items: center;
    height: 2rem;
    justify-content: space-between;
    font-size: small;
    padding: 0 1rem;
    box-shadow: var(--shadow);
    a {
        min-width: 5rem;
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }
}
</style>
