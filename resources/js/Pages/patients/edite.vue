<template>
    <div>


<mainLayout>


    <form @submit.prevent="submitForm()" class="grid grid-cols-1 mb-5 in-product-form" action="">
                <label class="text-sm font-extrabold" for="name"> Name</label>

                <input v-model="form.name" class="p-1 text-xs text-gray-500" type="text" placeholder="patient's name" />
                <label class="text-sm font-extrabold" for="phone">Phone </label>

                <input v-model="form.phone" class="p-1 text-xs text-gray-500" type="text"
                    placeholder="phone number" />
                <label class="text-sm font-extrabold" for="Serial Number">Gender</label>


                <select placeholder="gender..."  v-model="form.gender" name="gender" id="countries"   class="p-1 text-xs text-gray-500 bg-blue-100 rounded-lg">
            <option value="male"  selected>Male</option>
            <option value="female"  selected>Female</option>
        </select>


                <label class="text-sm font-extrabold" for="Product Name">Age</label>

                <input v-model="form.age" class="p-1 text-xs text-gray-500" type="text" placeholder="enter age" />

                <button type="submit" class="text-sm btn-component text-bold">
                    submit
                </button>
            </form>


</mainLayout>



    </div>
</template>

<script setup>

import { useForm } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import { defineProps } from "vue";
import mainLayout from "@/Layouts/mainLayout/mainLayout.vue";

const props=defineProps({
    patient:Array
})




const page = usePage();

// const user = computed(() => page.props.auth.user);

const form = useForm({
    id:props.patient.id,
    name: props.patient.name,
    gender: props.patient.gender,
    phone: props.patient.phone,
    age: props.patient.age,
});



const submitForm = () => {

    form.put(route('patient.update',form.id));
}
</script>
<style></style>
