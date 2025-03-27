<script setup>
import mainLayout from "@/Layouts/mainLayout/mainLayout.vue"
import PatientsTable from "@/Pages/patients/patientsTable.vue";
import pagePagination from "@/Components/pagePagination.vue";
defineProps(
{
    patients:Array
}
)

</script>

<template>

    <main-layout>
        <div>
            <patients-table :patients="patients.data"/>

            <page-pagination :Links="patients.links"/>

        </div>
    </main-layout>
</template>
