<script setup>
import mainLayout from "@/Layouts/mainLayout/mainLayout.vue"
import PatientsTable from "@/Pages/patients/patientsTable.vue";
defineProps(
{
    patients:Array
}
)

</script>

<template>


    <main-layout>
        <div>
            <patients-table :patients="patients"/>
        </div>
    </main-layout>
</template>
