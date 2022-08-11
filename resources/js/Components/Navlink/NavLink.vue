<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => (props.active ? "active" : ""));
</script>
<style lang="scss" scoped>
.link {
    color: var(--textC);

    &:hover {
        color: var(--textA);
    }
}
.active {
    color: var(--textA);
}
</style>
<template>
    <Link :href="href" class="link" :class="classes">
        <slot />
    </Link>
</template>
