
<script setup >
import { Link, usePage ,useForm} from "@inertiajs/vue3";
import doctorLayout from "../../Layouts/doctorLayout.vue";

</script>

<template>


<doctorLayout>
    <div class="w-full max-w-sm mt-10 border border-gray-200 rounded-lg card-profile">
    <div class="flex justify-end px-4 pt-4">
        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500  rounded-lg text-sm p-1.5" type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
            </svg>
        </button>
        <!-- Dropdown menu -->

    </div>
    <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg profile-card"  src="/icons/doctor.png" />
        <h5 class="mb-1 text-xl font-medium text-gray-900 "> Welcome Mubarak</h5>
        <span class="text-sm text-gray-500 ">Doctor</span>
        <div class="flex mt-4 md:mt-6">
            <Link href=""   class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-[#6200FF] rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">Diagonoses</Link>
            <Link href="/profile" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg ms-2 focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">profile</Link>
        </div>
    </div>
</div>
</doctorLayout>


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

</style>
