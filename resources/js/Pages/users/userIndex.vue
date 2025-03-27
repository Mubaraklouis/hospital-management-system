<script setup>
import mainLayout from '@/Layouts/mainLayout/mainLayout.vue';
import { Link, usePage ,useForm} from "@inertiajs/vue3";
import pagePagination from '@/Components/pagePagination.vue';
defineProps({
    users:Array
})



const form = useForm({
    id:null
})



//creating a function to delete a single user from the database
function deleteUser(id){
    if(confirm("Are you sure you want to the user")){
  form.delete(route('users.destroy',id),{
    id
  })


    }
}
</script>

<template>
    <div>
        <mainLayout>

            <div v-if="users.data.length === 0">
                <p class="font-bold text-center">User Does exist</p>
            </div>

            <div  v-else class="relative mr-16 overflow-x-auto shadow-md sm:rounded-lg">
        <!-- this is the patient -->
        <table class="w-full text-xs text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 table-secondary">
            <tr>
                <th scope="col" class="px-3 py-4">Name</th>
                <th scope="col" class="px-3 py-4">Email</th>
                <th scope="col" class="px-3 py-4">Role</th>
                <th scope="col" class="px-3 py-4">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users.data" :key="user.id" class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <p>{{ user.name }}</p>
                </th>

                <td class="px-6 py-4">{{ user.email }}</td>
                <td v-if="user.roles[0]?.title" class="px-6 py-4">{{ user.roles[0]?.title }}</td>
                <td v-else class="px-6 py-4">not assigned role</td>
                <td  class="px-6 py-4">
                    <div class="flex gap-4">
                        <div class="p-2 font-medium text-white bg-red-400 rounded-md hover:underline">
                            <td  as="button" >  <Link href="#" @click="deleteUser(user.id)" ><img class="w-4 h-4 cursor-pointer" src="/icons/trash.png" alt /></Link> </td>
                        </div>
                        <div class="p-2 font-medium text-white bg-green-600 rounded-md hover:underline table-primary">
                            <p href="/">
                        <Link :href="route('user.show',user.id)" ><img class="w-4 h-4" src="/icons/file-edit.png" alt /></Link>
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <pagePagination :Links="users.links" />
        </mainLayout>

    </div>
</template>
