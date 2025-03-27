<script setup >
import { Link, usePage ,useForm} from "@inertiajs/vue3";
import DropdownLink from "@/Components/DropdownLink.vue";
import Dropdown from '@/Components/Dropdown.vue';

import { computed } from "vue";
const page = usePage();


const diagonoses = computed(() => page.props.diagonoses)

const form = useForm({
   search:''
});


const search =()=>{
    form.get(route('doctor.search'))
}


</script>

<template>
    <div>
        <section class="grid h-full grid-cols-5">
            <nav class="w-full nav-border">
                <!-- creating the logo div -->
                <div class="pt-2 pb-2 ">
                    <!-- this div contains the user avater -->

                    <div class="flex gap-2 mt-10 align-center">
                        <img
                            class="w-12 h-12 rounded-full user-border"
                            src="/icons/observation.png"
                            alt=""
                        />
                        <div>
                            <h5 class="mt-2 text-sm font-extrabold">Hospital MS</h5>
                            <h5 class="text-xs secondary-text">HM-system</h5>
                        </div>
                    </div>
                </div>
                <section>
                    <div class="mt-16">
                        <ul class="flex flex-col gap-5 text-xs font-extrabold text-bold">
                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div><img class="w-4 h-4" src="/icons/home.png" alt="" /></div>
                              <Link :href="route('dashboard')">Dashboard</Link>
                            </li>
                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/doctor.png" alt="" />
                                </div>
                                <Link :href="route('doctor.home')"> Doctor</Link>
                            </li>


                        </ul>
                    </div>
                </section>

                <!-- creating the user section and the icon -->
                <div class="pt-2 pb-2 mt-32">
                    <!-- this div contains the user avater -->

                    <div class="flex gap-2 align-center rounded-border">
                        <img
                            class="w-12 h-12 rounded-full user-border"
                            src="/icons/doctor.png"
                            alt=""
                        />
                        <div>
                            <h5 class="mt-2 text-sm font-extrabold">Mubarak Louis</h5>
                            <h5 class="text-xs secondary-text">in-system</h5>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- main page markup -->


            <div class="col-span-4">
                <!-- the h4 is for the main title -->


                
                <div>
                    <h4 class="pt-6 pl-20 font-extrabold uppercase text-md">

                   <!-- <Link :href="route('patients.index')">Patients</Link> -->
                    </h4>
                </div>
                <!-- here is the mini navbar for reports,inproducts etc.. -->
                <div class="w-full pl-20 mt-10 mini-nav-border">
                    <ul class="flex gap-4 text-sm font-extrabold text-bold">
                        <li>
                          <Link :href="route('dashboard')">Dashboard</Link>
                            <div class="indicator-bar"></div>
                        </li>

                        <li class="secondary-text">  <Link :href="route('patients.index')">Patients</Link>   </li>
                        <li class="secondary-text"><Link :href="route('diagonoses.index')">Diagonoses</Link></li>
                    </ul>
                </div>

                <!-- forms inputs
               search->it is the seach
               calender dropdown -->
                <div class="flex pl-12 m-8 filters-inputs gap-x-8">
                    <div
                        class="grid items-center justify-center grid-cols-3 gap-2 pl-4 calender-input"
                    >
                        <div class="flex col-span-2 gap-2">
                            <img class="w-6 h-6" src="/icons/calendar-lines-pen.png" alt="" />
                            <div>
                                <p class="text-xs font-bold text-gray-500">Date</p>
                                <h4 class="text-xs font-extrabold">Last Year</h4>
                            </div>
                        </div>

                        <div>
                            <img class="w-4 h-4" src="/icons/angle-small-down.png" alt="" />
                        </div>
                    </div>
                    <!-- workinf on the category -->

                    <div class="grid items-center justify-center grid-cols-3 gap-2 pl-4 cursor-pointer calender-input">
                        <!-- Settings Dropdown -->
                        <div class="relative ml-1">
                            <Dropdown align="center" width="48">
                                <br>
                                <template #trigger>
                                    <span class="inline-flex rounded-md ">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                            Diagonoses

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
                                    <DropdownLink name="search" :href="route('doctor.assign',diagonose.id)" v-for="diagonose in diagonoses" :key="diagonose.id">
                                        {{ diagonose.title }}
                                    </DropdownLink>




                                </template>
                            </Dropdown>
                        </div>
                    </div>


                    <!-- code for the search button -->

                    <form @submit.prevent="search()"  method="GET">
                    <input v-model="form.search" name="search" class="grid items-center justify-center grid-cols-3 gap-2 pl-4 text-xs calender-input"
                        placeholder="search  CTR+K" />
                  </form>
                </div>

                <div class="grid justify-center grid-cols-1 pl-20">


                    <!-- <inProductForm/> -->
                    <!-- <inProductTable></inProductTable> -->
<!--                    <DashBoard/>-->
                    <slot/>

                </div>
            </div>
        </section>
    </div>
</template>
<style>
.test-dropdown{
    width: 200px;
}

</style>
