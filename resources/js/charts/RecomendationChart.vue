<template>
    <div>
        <canvas ref="chartCanvas" height="150"></canvas>
    </div>
</template>

<script>
import { ref, watch, onMounted } from 'vue';
import Chart from 'chart.js/auto';

export default {
    name: 'RecommendationBarChart',
    props: {
        fiscalYearId: {
            type: [Number, String],
            required: true
        },
        month: {
            type: [Number, String],
            required: true
        },
        recommendationTypes: {
            type: Array,
            required: true
        }
    },
    setup(props) {
        const chartInstance = ref(null);
        const chartCanvas = ref(null);

        const fetchDataAndRenderChart = () => {
            if (!props.fiscalYearId || !props.month) return;

            fetch(`/ward-recommendations/data?fiscal_year_id=${props.fiscalYearId}&month=${props.month}`)
                .then(res => res.json())
                .then(data => {
                    const labels = props.recommendationTypes.map(t => t.name);
                    const ids = props.recommendationTypes.map(t => t.id);

                    const totalApplications = [];
                    const totalRecommended = [];
                    const totalDarta = [];
                    const totalChalani = [];

                    ids.forEach(id => {
                        const rec = data[id] || {};
                        totalApplications.push(rec.total_application ?? 0);
                        totalRecommended.push(rec.total_recomended ?? 0);
                        totalDarta.push(rec.total_darta ?? 0);
                        totalChalani.push(rec.total_chalani ?? 0);
                    });

                    const chartData = {
                        labels,
                        datasets: [
                            {
                                label: 'निवेदन संख्या (Applications)',
                                data: totalApplications,
                                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            },
                            {
                                label: 'सिफारिस संख्या (Recommended)',
                                data: totalRecommended,
                                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                            },
                            {
                                label: 'दर्ता संख्या (Darta)',
                                data: totalDarta,
                                backgroundColor: 'rgba(255, 206, 86, 0.7)',
                            },
                            {
                                label: 'चलानी संख्या (Chalani)',
                                data: totalChalani,
                                backgroundColor: 'rgba(255, 99, 132, 0.7)',
                            },
                        ],
                    };

                    const chartOptions = {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { stepSize: 1 },
                            },
                        },
                        plugins: {
                            legend: { position: 'top' },
                            title: {
                                display: true,
                                text: 'वडा सिफारिस तथ्यांक (Ward Recommendation Statistics)',
                            },
                        },
                    };

                    if (chartInstance.value) {
                        chartInstance.value.data = chartData;
                        chartInstance.value.options = chartOptions;
                        chartInstance.value.update();
                    } else {
                        chartInstance.value = new Chart(chartCanvas.value, {
                            type: 'bar',
                            data: chartData,
                            options: chartOptions,
                        });
                    }
                })
                .catch(() => {
                    // Handle error or reset chart data to zeros
                    if (chartInstance.value) {
                        chartInstance.value.data.datasets.forEach(dataset => dataset.data.fill(0));
                        chartInstance.value.update();
                    }
                });
        };

        watch(() => [props.fiscalYearId, props.month], fetchDataAndRenderChart, { immediate: true });

        onMounted(() => {
            fetchDataAndRenderChart();
        });

        return {
            chartCanvas,
        };
    },
};
</script>
