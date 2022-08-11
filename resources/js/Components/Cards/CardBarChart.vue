<script setup>
import { BarChart } from "vue-chart-3";
import { ref, computed } from "vue";
import {
    Chart,
    BarController,
    CategoryScale,
    LinearScale,
    BarElement,
} from "chart.js";
Chart.register(BarController, CategoryScale, LinearScale, BarElement);
const data = computed(() => ({
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: new Date().getFullYear(),
            backgroundColor: "#ed64a6",
            borderColor: "#ed64a6",
            data: [30, 78, 56, 34, 100, 45, 13],
            fill: false,
            barThickness: 8,
        },
        {
            label: new Date().getFullYear() - 1,
            fill: false,
            backgroundColor: "#4c51bf",
            borderColor: "#4c51bf",
            data: [27, 68, 86, 74, 10, 4, 87],
            barThickness: 8,
        },
    ],
}));
const options = ref({
    plugins: {
        maintainAspectRatio: false,
        responsive: true,
        title: {
            display: false,
            text: "Orders Chart",
        },
        tooltips: {
            mode: "index",
            intersect: false,
        },
        hover: {
            mode: "nearest",
            intersect: true,
        },
        legend: {
            labels: {
                color: "rgba(255, 255, 255, 0.15)",
            },
            align: "end",
            position: "bottom",
        },
    },
    interaction: {
        intersect: false,
    },
    scales: {
        x: {
            grid: {
                display: false,
                borderDash: [2],
                borderDashOffset: [2],
                color: "rgba(255, 255, 255, 0.15)",
            },
            ticks: {
                display: false,
            },
        },
        y: {
            grid: {
                borderDashOffset: [2],
                color: "rgba(255, 255, 255, 0.15)",
            },
        },
    },
});
</script>
<style lang="scss" scoped>
.card-bar-chart {
    position: relative;
    display: flex;
    flex-direction: column;
    padding: 1rem 2rem;
    min-width: 0px;
    overflow-wrap: break-word;
    width: 100%;
    border-radius: 0.25rem;
    height: 100%;
}
</style>
<template>
    <div class="card-bar-chart shadow-lg rounded bgSecondaryA">
        <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full max-w-full flex-grow flex-1">
                    <h6
                        class="uppercase text-blueGray-400 mb-1 text-xs font-semibold"
                    >
                        Performance
                    </h6>
                    <h2 class="text-blueGray-700 text-m font-semibold">
                        Total orders
                    </h2>
                </div>
            </div>
        </div>
        <div class="p-4 flex-auto">
            <BarChart
                id="bar-chart"
                class="relative max-h-72"
                :height="600"
                :chart-data="data"
                :options="options"
            />
        </div>
    </div>
</template>
