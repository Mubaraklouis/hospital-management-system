<script setup>
defineProps(
{
    patients:Array
}
)

</script>

<template>

    <div v-for="p in patients" :key="p.id">

        {{ p }}

    </div>

</template>
