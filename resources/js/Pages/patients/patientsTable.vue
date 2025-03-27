<script setup>
import { Link, usePage ,useForm} from "@inertiajs/vue3";
defineProps({
    patients:Object
});

const form = useForm({
    id:null
})

//creating a function to delete a single patient from the database
function deletePatient(id){
    if(confirm("Are you sure you want to the patient")){
  form.delete(route('patient.delete',id),{
    id
  })


    }
}



</script>

<template>
    <div class="relative mr-16 overflow-x-auto shadow-md sm:rounded-lg">
        <!-- this is the patient -->
        <table class="w-full text-xs text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 table-secondary">
            <tr>
                <th scope="col" class="px-3 py-4">Name</th>
                <th scope="col" class="px-3 py-4"> Patient's ID</th>
                <th scope="col" class="px-3 py-4">Gender</th>
                <th scope="col" class="px-3 py-4">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="patient in patients" :key="patient.id" class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <p>{{ patient.name }}</p>
                </th>
                <td class="px-6 py-4">{{ patient.patient_id }}</td>
                <td class="px-6 py-4">{{ patient.gender }}</td>
                <td  class="px-6 py-4">
                    <div class="flex gap-4">
                        <div class="p-2 font-medium text-white bg-red-400 rounded-md hover:underline">
                            <td  as="button" >  <Link href="#" @click="deletePatient(patient.id)"><img class="w-4 h-4 cursor-pointer" src="/icons/trash.png" alt /></Link> </td>
                        </div>
                        <div class="p-2 font-medium text-white bg-green-500 rounded-md hover:underline">
                            <td  as="button" >  <a :href="route('receipt.register',patient.id)" ><img class="w-4 h-4 cursor-pointer" src="/icons/invoice.png" alt /></a> </td>
                        </div>
                        <div class="p-2 font-medium text-white bg-green-600 rounded-md hover:underline table-primary">
                            <p href="/">
                        <Link :href="route('patient.show',patient.id)"><img class="w-4 h-4" src="/icons/file-edit.png" alt /></Link>
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style >
.table-secondary {
    background-color: #cecbf7;
}
.table-primary {
    background-color: #b086f3;
}

</style>
