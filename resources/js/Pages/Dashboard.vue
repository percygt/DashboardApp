<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import CardLineChart from "@/Components/Cards/CardLineChart.vue";
import CardBarChart from "@/Components/Cards/CardBarChart.vue";
import CardPageVisits from "@/Components/Cards/CardPageVisits.vue";
import CardSocialTraffic from "@/Components/Cards/CardSocialTraffic.vue";
import LayoutHeader from "@/Layouts/LayoutHeader.vue";
import { permissions } from "@/Plugins/permissions";
const props = defineProps({
    can: Object,
});
permissions.canCreateUser = props.can.create_user;
</script>
<script>
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
export default {
    layout: LayoutAuthenticated,
};
</script>
<style lang="scss" scoped>
.dash-bottom {
    margin: 2rem 0;
}
</style>
<template>
    <Head title="Dashboard" />
    <LayoutHeader> Dashboard </LayoutHeader>

    <div class="flex flex-wrap scroll-hide">
        <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
            <CardLineChart />
        </div>
        <div class="w-full xl:w-4/12 px-4">
            <CardBarChart />
        </div>
    </div>
    <div class="dash-bottom flex flex-wrap mt-4">
        <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
            <CardPageVisits />
        </div>
        <div class="w-full xl:w-4/12 px-4">
            <CardSocialTraffic />
        </div>
    </div>
</template>
