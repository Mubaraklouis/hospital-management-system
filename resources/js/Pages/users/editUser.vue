<template>
    <div>


<mainLayout>


    <form @submit.prevent="submitForm()" class="grid grid-cols-1 mb-5 in-product-form" action="">
                <label class="text-sm font-extrabold" for="name"> Name</label>

                <input v-model="form.name" class="p-1 text-xs text-gray-500" type="text" placeholder="Enter your Name" />
                <label class="text-sm font-extrabold" for="phone">Email </label>

                <input v-model="form.email" class="p-1 text-xs text-gray-500" type="text"
                    placeholder="Enter your email" />
                <label class="text-sm font-extrabold" for="Serial Number">password</label>



                <input v-model="form.password" class="p-1 text-xs text-gray-500" type="password" placeholder="Enter your password" />

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
   user:Object
})




const page = usePage();

// const user = computed(() => page.props.auth.user);

const form = useForm({
    id:props.user.id,
    name: props.user.name,
    password: props.user.password,
    email: props.user.email,

});



const submitForm = () => {

    form.put(route('user.update',form.id));
}
</script>
<style></style>
