<template>
<!--    {{// rooms.map(({title}) => title)}}-->
<!--    <div v-for="vote in rooms">-->
<!--        {{ vote.title }}-->
<!--        {{ vote.quantity }}-->
<!--&lt;!&ndash;&ndash;&gt;-->
<!--    </div>-->
<!--    {{}}-->

    <div className="">

        <Bar
            :chart-options="chartOptions"
            :chart-data="chartData"
            :chart-id="chartId"
            :dataset-id-key="datasetIdKey"
            :plugins="plugins"
            :css-classes="cssClasses"
            :styles="styles"
            :width="width"
            :height="height"
        />

    </div>
</template>

<script>

import {Bar} from 'vue-chartjs'
import {Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale} from 'chart.js'

import Navbar from "@/Components/Navbar";

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
export default {

    components: {Navbar, Bar},
    props: {
        rooms: [],
        chartId: {
            type: String,
            default: 'bar-chart'
        },
        datasetIdKey: {
            type: String,
            default: 'label'
        },
        width: {
            type: Number,
            default: 100
        },
        height: {
            type: Number,
            default: 100
        },
        cssClasses: {
            default: '',
            type: String
        },
        styles: {
            type: Object,
            default: () => {
            }
        },
        plugins: {
            type: Object,
            default: () => {
            }
        }
    },
    data() {
        return {
            chartData: {
                labels: Object.values(this.rooms).map(({title}) => title),
                datasets: [{data: Object.values(this.rooms).map(({quantity}) => quantity)}]
            },
            chartOptions: {
                responsive: true
            }
        }
    },

}
</script>

<style scoped>

</style>
