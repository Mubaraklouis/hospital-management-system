
<script setup >
import { Link, usePage ,useForm} from "@inertiajs/vue3";
import DropdownLink from "@/Components/DropdownLink.vue";
import Dropdown from '@/Components/Dropdown.vue';
import doctorLayout from "../../Layouts/doctorLayout.vue";
import mainLayout from "@/Layouts/mainLayout/mainLayout.vue";
const props = defineProps({
    patient:Array,
    diagonoses:Array
})





const form = useForm({
    patient_id:props.patient[0]?.id

});



const submitDiagonose = (diagonose_id) => {

    form.post(route('doctor.assign',diagonose_id))
}


</script>

<template>
<mainLayout>
    <div v-if="patient.length >0">
        <div class="grid items-center justify-center grid-cols-3 gap-2 pb-4 cursor-pointer ">

<!-- Settings Dropdown -->
<div class="relative ml-1">
    <Dropdown align="center" width="48">
        <br>
        <template #trigger>
            <span class="inline-flex bg-gray-200 rounded-md ">
                <button type="button"
                    class=" bg-[#6200FF] inline-flex  ms-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out border border-transparent rounded-md ">
                   Assign Diagonoses

                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </span>
        </template>
        <br>

        <template #content>
            <DropdownLink name="search" @click="submitDiagonose(diagonose.id)" v-for="diagonose in diagonoses" :key="diagonose.id">
                {{ diagonose.title }}
            </DropdownLink>




        </template>
    </Dropdown>
</div>
</div>

<div class="mb-4 bg-white border rounded-lg shadow info-card">

<div class="px-6 py-3">
<h3 class="text-lg font-bold leading-6 text-gray-900">
Patient Information
</h3>

<p class="pt-2"><span class="text-bold">ID:</span> <span class="text-sm text-gray-500 text-bold"> {{ patient[0].patient_id }}</span></p>
<!-- <p class="mt-1 text-sm text-gray-500">
This is some information about the Patient.
</p> -->
</div>


<div class="p-0 px-4 border-t border-gray-200">


<dl class="divide-y divide-gray-200">
<div class="grid grid-cols-3 gap-4 px-6 py-3 sm:py-5">
<dt class="text-sm font-bold text-gray-500">
Full name
</dt>
<dd class="col-span-2 mt-1 text-sm text-gray-900">
{{ patient[0].name }}
</dd>
</div>

<div class="grid grid-cols-3 py-5 sm:gap-4 sm:px-6">
<dt class="text-sm font-bold text-gray-500">
Phone number
</dt>
<dd class="col-span-2 mt-0 text-sm text-gray-900 ">
{{ patient[0].phone }}
</dd>
</div>
<div class="grid grid-cols-3 gap-4 px-6 py-3 sm:py-5">
<dt class="text-sm font-bold text-gray-500">
Gender
</dt>
<dd class="col-span-2 mt-1 text-sm text-gray-900">
{{ patient[0].gender }}
</dd>
</div>
<div class="grid grid-cols-3 gap-4 px-6 py-3 sm:py-5">
<dt class="text-sm font-bold text-gray-500">
Age
</dt>
<dd class="col-span-2 mt-1 text-sm text-gray-900">
{{ patient[0].age }}
</dd>
</div>
<div class="grid grid-cols-3 gap-4 px-6 py-3 sm:py-5">
<dt class="text-sm font-bold text-gray-500">
Diagonoses
</dt>
<dd class="col-span-2 mt-1 text-sm text-gray-900">

<span class="p-3 font-bold" v-for="diagonose in patient[0].diagonoses" :key="diagonose.key">{{ diagonose.title }},</span>

</dd>
</div>
</dl>
</div>
</div>

    </div>
    <div class="mt-10" v-else>
                <p class="font-bold ">Patient Does not exist</p>

            </div>
    <div>



    </div>


</mainLayout>


</template>

<style scoped>

.profile-card{
    border: 5px solid #6200FF;
    border-radius: 50%;




}
.card-profile{
    background-color: rgb(197, 194, 227);

}
/* .profile-wrapper{
    width: 500px;
    display:grid;
    grid-template-columns: 1fr;
    justify-content: center;
} */

.info-card{
    width:700px;
}
</style>
