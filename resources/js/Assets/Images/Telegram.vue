<template>
    <span
        v-bind="$attrs"
        :aria-hidden="!title"
        :aria-label="title"
        class="material-design-icon telegram-icon"
        role="img"
        @click="$emit('click', $event)"
    >
        <svg
            :fill="fillColor"
            class="material-design-icon__svg"
            :width="size"
            :height="size"
            viewBox="0 0 32 32"
        >
            <path
                d="M16 0.5c-8.563 0-15.5 6.938-15.5 15.5s6.938 15.5 15.5 15.5c8.563 0 15.5-6.938 15.5-15.5s-6.938-15.5-15.5-15.5zM23.613 11.119l-2.544 11.988c-0.188 0.85-0.694 1.056-1.4 0.656l-3.875-2.856-1.869 1.8c-0.206 0.206-0.381 0.381-0.781 0.381l0.275-3.944 7.181-6.488c0.313-0.275-0.069-0.431-0.482-0.156l-8.875 5.587-3.825-1.194c-0.831-0.262-0.85-0.831 0.175-1.231l14.944-5.763c0.694-0.25 1.3 0.169 1.075 1.219z"
            ></path>
        </svg>
    </span>
</template>

<script>
export default {
    name: "TelegramIcon",
    emits: ["click"],
    props: {
        title: {
            type: String,
        },
        fillColor: {
            type: String,
            default: "currentColor",
        },
        size: {
            type: Number,
            default: 26,
        },
    },
};
</script>
