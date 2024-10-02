<template>
    <div>


            <mainLayout>
                <form @submit.prevent="submitForm()" class="grid grid-cols-1 mb-5 in-product-form" action="">
                <label class="text-sm font-extrabold" for="name"> Title</label>
                <input v-model="form.title" class="p-1 text-xs text-gray-500" type="text" placeholder="Diagonose title..." />



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
import doctorLayout from "../../../Layouts/doctorLayout.vue"
import mainLayout from "@/Layouts/mainLayout/mainLayout.vue";




const page = usePage();

// const user = computed(() => page.props.auth.user);

const form = useForm({
    title: "",

});



const submitForm = () => {

    form.post(route("diagonose.store"));
}
</script>
<style></style>
