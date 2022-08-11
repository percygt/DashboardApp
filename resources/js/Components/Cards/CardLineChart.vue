<script setup>
import { LineChart } from "vue-chart-3";
import { ref, computed } from "vue";
import {
    Chart,
    LineController,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
} from "chart.js";
Chart.register(
    LineController,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement
);
const data = computed(() => ({
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: new Date().getFullYear(),
            backgroundColor: "#4c51bf",
            borderColor: "#4c51bf",
            data: [65, 78, 66, 44, 56, 67, 75],
            fill: false,
            tension: 0.5,
        },
        {
            label: new Date().getFullYear() - 1,
            fill: false,
            backgroundColor: "#fff",
            borderColor: "#fff",
            data: [40, 68, 86, 74, 56, 60, 87],
            tension: 0.5,
        },
    ],
}));
const options = ref({
    plugins: {
        maintainAspectRatio: false,
        responsive: true,
        title: {
            display: false,
            text: "Sales Charts",
            fontColor: "white",
        },
        legend: {
            labels: {
                color: "white",
            },
            align: "end",
            position: "bottom",
        },
        tooltips: {
            mode: "index",
            intersect: false,
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
                color: "rgba(33, 37, 41, 0.3)",
            },
        },
        y: {
            grid: {
                color: "rgba(255, 255, 255, 0.15)",
            },
        },
    },
});
</script>

<style lang="scss" scoped>
.card-line-chart {
    position: relative;
    display: flex;
    flex-direction: column;
    padding: 1rem 2rem;
    min-width: 0px;
    overflow-wrap: break-word;
    width: 100%;
    border-radius: 0.25rem;
}
</style>
<template>
    <div class="card-line-chart shadow-lg rounded bgSecondaryA">
        <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full max-w-full flex-grow flex-1">
                    <h6
                        class="uppercase text-blueGray-100 mb-1 text-xs font-semibold"
                    >
                        Overview
                    </h6>
                    <h2 class="text-white text-m font-semibold">Sales value</h2>
                </div>
            </div>
        </div>
        <div class="p-4 flex-auto">
            <!-- Chart -->

            <LineChart
                class="relative h-350-px"
                :chart-data="data"
                :options="options"
                :height="300"
                id="line-chart"
            ></LineChart>
        </div>
    </div>
</template>
