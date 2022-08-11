<template>
    <header class="shadow">
        <h2 class="font-semibold text-xl textC leading-tight">
            <slot />
        </h2>
    </header>
</template>

<style lang="scss" scoped>
header {
    padding: 2rem;
    h2 {
        display: flex;
        gap: 1rem;
    }
}
</style>
