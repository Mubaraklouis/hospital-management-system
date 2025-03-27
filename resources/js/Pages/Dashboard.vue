<script setup>
import mainLayout from '@/Layouts/mainLayout/mainLayout.vue';
import { Link, usePage ,useForm} from "@inertiajs/vue3";

const page = usePage()
let prop = defineProps({
    pat:Object
})


import { onMounted } from "vue";
// import Graph from  "../services/chart.js"
import Graph from "../services/chart.js"

/*
 * Chart : this is the class that allows us to use charts in the website
 * chartBluePrint: Is a function used to get a chart type and it properties
 *
 **/


 //get the auth user's name

 const name = page.props.auth.user.name;

//get the count of patients

const patient_count = page.props.patient_count




const currentDate = new Date();

const getFormattedDate = (date) => {
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-based, so add 1
  const day = String(date.getDate()).padStart(2, '0');
  return `${year}-${month}-${day}`;
};

// Get the current date (day 7)
const date7 = getFormattedDate(currentDate);

// Decrement the date by 1 day for each previous day
const date6 = getFormattedDate(new Date(currentDate.setDate(currentDate.getDate() - 1)));
const date5 = getFormattedDate(new Date(currentDate.setDate(currentDate.getDate() - 1)));
const date4 = getFormattedDate(new Date(currentDate.setDate(currentDate.getDate() - 1)));
const date3 = getFormattedDate(new Date(currentDate.setDate(currentDate.getDate() - 1)));
const date2 = getFormattedDate(new Date(currentDate.setDate(currentDate.getDate() - 1)));
const date1 = getFormattedDate(new Date(currentDate.setDate(currentDate.getDate() - 1)));






const Chart = new Graph();

//get all the patient according the specific date
let pat={
    "date1":prop.pat.date1,
    "date2":prop.pat.date2,
    "date3":prop.pat.date3,
    "date4":prop.pat.date4,
    "date5":prop.pat.date5,
    "date6":prop.pat.date6,
    "date7":prop.pat.date7
}

let monthlyChart={
    "date1":prop.pat.date1,
    "date2":prop.pat.date2,
    "date3":prop.pat.date3,
    "date4":prop.pat.date4,
    "date5":prop.pat.date5,
    "date6":prop.pat.date6,
    "date7":prop.pat.date7
}





onMounted(() => {
  //plot a line chart
  const lineCtx = document.getElementById("lineCanvas");
  Chart.chartBluePrint(lineCtx, "line", "#6200FF",pat,date1,date2,date3,date4,date5,date6,date7);
  //plotting a bar chart
  const barCtx1 = document.getElementById("barCanvas1");
  Chart.chartBluePrint(barCtx1, "bar", ["#6200FF","#B086F3"],pat,date1,date2,date3,date4,date5,date6,date7);
  //ploting the second bar chart
  const barCtx =document.getElementById('barCanvas')
  Chart.chartBluePrint(barCtx, "bar", ["#118E25","#B086F3"],pat,date1,date2,date3,date4,date5,date6,date7);

});
</script>


<template>
    <div>
<mainLayout>
    <div class="mr-10">
    <div class="pb-5 mb-5 shadow-md line-chart">
      <div class="grid grid-cols-2">
        <div class="line-chart-about">
          <h6 class="text-xs font-extrabold">summery</h6>
          <h6 class="mt-4 text-xs font-extrabold text-gray-500">total patient</h6>
          <h2 class="mt-3 font-extrabold text-md">{{ patient_count }}</h2>
          <div>
            <button class="text-xs btn-component">Increase by 20% </button>
            <h6 class="text-xs font-extrabold text-gray-500">
     since {{ date7 }}
            </h6>
          </div>
        </div>
        <div>
          <canvas id="lineCanvas" class="line-chart-body"> </canvas>

        </div>
      </div>

    </div>

    <div class="grid grid-cols-2 bar-chart-wrapper gap-x-4">
      <div class="shadow-md bar-graph">
        <div class="flex justify-between">
          <h6 class="text-xs font-extrabold">number of patient by Previous Days</h6>
          <h6 class="text-xs font-bold text-gray-500">view all</h6>
        </div>
        <h2 class="mt-1 text-sm font-extrabold">{{ name }}</h2>
        <canvas id="barCanvas1" class="line-chart-body"> </canvas>
      </div>
      <div class="shadow-md bar-graph">
        <div class="flex justify-between">
          <h6 class="text-xs font-extrabold">number of patient by Previous months</h6>
          <h6 class="text-xs font-bold text-gray-500">view all</h6>
        </div>
        <h2 class="mt-1 text-sm font-extrabold">{{name}}</h2>
        <canvas id="barCanvas" class="line-chart-body"> </canvas>
      </div>
    </div>
  </div>

</mainLayout>

    </div>
</template>
<style>

.line-chart {
  width: 80%;
  height: 250px;
  margin-right: 20px;
  background-color: white;
  padding: 30px;
  margin-right: 30px;
  border-radius: 15px;
}
.line-chart-about {
  border-right: 1px solid gray;
}
.bar-graph {
  height: 250px;
  background-color: white;
  border-radius: 15px;
  padding: 15px;
  margin-bottom: 20px;
}
.bar-chart-wrapper {
  width: 80%;
  margin-right: 20px;
}

.line-chart-body {
  width: 200px;
  height: 300px;
  margin-left: 10px;
  /* background-color: red; */
}

</style>
