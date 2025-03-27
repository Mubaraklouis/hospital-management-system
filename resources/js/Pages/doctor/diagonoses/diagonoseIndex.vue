
<script setup >
import { Link, usePage ,useForm} from "@inertiajs/vue3";
import doctorLayout from "../../../Layouts/doctorLayout.vue";
import MainLayout from "@/Layouts/mainLayout/mainLayout.vue";

defineProps({
    diagonoses:Array

})

const form = useForm({
    id:null
})


const deleteDiagonose = (id)=>{
    //delete a diagonose

    if(confirm("Are you sure you want to the diagonose")){
    form.delete(route('diagonose.delete',id))
    }
}

</script>

<template>


<MainLayout>

    <div>
        <Link :href="route('diagonose.create')" class="  bg-[#6200FF] font-bold rounded-md text-white p-2">Add diagonose</Link>
    </div>
    <br>
    <div class="relative mr-16 overflow-x-auto shadow-md sm:rounded-lg">
        <!-- this is the patient -->
        <table class="w-full text-xs text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 table-secondary">
            <tr>
                <th scope="col" class="px-3 py-4">Title</th>
                <th scope="col" class="px-3 py-4">price</th>
                <th scope="col" class="px-3 py-4">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="diagonose in diagonoses" :key="diagonose.id" class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <p>{{ diagonose.title }}</p>
                </th>

                <td class="px-6 py-4">{{ diagonose.price }}</td>
                <td  class="px-6 py-4">
                    <div class="flex gap-4">
                        <div class="p-2 font-medium text-white bg-red-400 rounded-md hover:underline">
                            <td  as="button" >  <Link href="#" @click="deleteDiagonose(diagonose.id)" ><img class="w-4 h-4 cursor-pointer" src="/icons/trash.png" alt /></Link> </td>
                        </div>
                        <div class="p-2 font-medium text-white bg-green-600 rounded-md hover:underline table-primary">
                            <p href="/">
                        <Link href="#" ><img class="w-4 h-4" src="/icons/file-edit.png" alt /></Link>
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</MainLayout>




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
