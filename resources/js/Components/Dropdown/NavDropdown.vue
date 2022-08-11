<script setup>
import { computed, onMounted, onUnmounted, ref } from "vue";
import { onClickOutside } from "@vueuse/core";
const open = ref(false);
const profileRef = ref(null);
const props = defineProps({
    align: {
        default: "right",
    },
    width: {
        default: "48",
    },
});

onClickOutside(profileRef, () => (open.value = false));
const closeOnEscape = (e) => {
    if (open.value && e.key === "Escape") {
        open.value = false;
    }
};

onMounted(() => document.addEventListener("keydown", closeOnEscape));
onUnmounted(() => document.removeEventListener("keydown", closeOnEscape));

const widthClass = computed(() => {
    return {
        48: "w-48",
    }[props.width.toString()];
});

const alignmentClasses = computed(() => {
    if (props.align === "left") {
        return "origin-top-left left-0";
    } else if (props.align === "right") {
        return "origin-top-right right-0";
    } else {
        return "origin-top";
    }
});
</script>
<style lang="scss" scoped>
.drop-content {
    background-color: var(--secondaryA);
    margin-top: 0.25rem;
    border-radius: 0.375rem;
}
.dd-content {
    width: 11rem;
}
</style>
<template>
    <div class="relative">
        <div @click="open = !open">
            <slot name="trigger" />
        </div>

        <!-- Full Screen Dropdown Overlay -->

        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-show="open"
                class="absolute z-50 rounded-md shadow-lg dd-content"
                :class="[widthClass, alignmentClasses]"
                style="display: none"
                @click="open = false"
            >
                <div
                    class="ring-1 ring-black ring-opacity-5 drop-content"
                    ref="profileRef"
                >
                    <slot name="content" />
                </div>
            </div>
        </transition>
    </div>
</template>
