<script setup>
import mainLayout from '@/Layouts/mainLayout/mainLayout.vue';
import DropdownLink from "@/Components/DropdownLink.vue";
import Dropdown from '@/Components/Dropdown.vue';
import { Link, usePage ,useForm} from "@inertiajs/vue3";
let props =defineProps({
    roles:Array,
    user:Object
})



const form = useForm({
    user_id:props.user[0]?.id

});




const submitRole = (role_id) => {

form.post(route('user.assign',role_id))
}



</script>

<template>
    <div>
<mainLayout>


<div v-if="user.length > 0">


    <div  class="grid items-center justify-center grid-cols-3 gap-2 pb-4 cursor-pointer ">

<!-- Settings Dropdown -->
<div class="relative ml-1">
    <Dropdown align="center" width="48">
        <br>
        <template #trigger>
            <span class="inline-flex bg-gray-200 rounded-md ">
                <button type="button"
                    class=" bg-[#6200FF] inline-flex  ms-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out border border-transparent rounded-md ">
                   Assign Role

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
            <DropdownLink name="search" @click.prevent="submitRole(role.id)" v-for="role in roles" :key="role.id">
                {{role.title }}
            </DropdownLink>




        </template>
    </Dropdown>
</div>
</div>

<div class="mb-4 bg-white border rounded-lg shadow info-card">

<div class="px-6 py-3">
<h3 class="text-lg font-bold leading-6 text-gray-900">
User Information
</h3>
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
{{ user[0].name }}
</dd>
</div>

<div class="grid grid-cols-3 py-5 sm:gap-4 sm:px-6">
<dt class="text-sm font-bold text-gray-500">
Email
</dt>
<dd class="col-span-2 mt-0 text-sm text-gray-900 ">
{{ user[0].email }}
</dd>
</div>
<div class="grid grid-cols-3 gap-4 px-6 py-3 sm:py-5">
<dt class="text-sm font-bold text-gray-500">
Role
</dt>
<dd v-if="user[0].roles[0]" class="col-span-2 mt-1 text-sm text-gray-900">
<!-- {{ patient[0].gender }} -->
  {{user[0].roles[0].title}}
</dd>
<dd v-else class="col-span-2 mt-1 text-sm text-gray-900">
<!-- {{ patient[0].gender }} -->
Not assign role
</dd>

</div>

</dl>
</div>
</div>


</div>
            <div class="mt-10" v-else>
                <p class="font-bold ">User Does not exist</p>

            </div>


</mainLayout>

    </div>
</template>


<style scope>

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
