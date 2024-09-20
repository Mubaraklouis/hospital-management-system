<script setup >
import { Link, usePage ,useForm} from "@inertiajs/vue3";

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
                                Dashboard
                            </li>
                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/doctor.png" alt="" />
                                </div>
                                <Link :href="route('doctor.home')"> Doctor</Link>
                            </li>
                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/observation.png" alt="" />
                                </div>
                    Lab Technician
                            </li>

                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div><img class="w-4 h-4" src="/icons/user.png" alt="" /></div>
                                Users
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
                   Patients
                   <!-- <Link :href="route('patients.index')">Patients</Link> -->
                    </h4>
                </div>
                <!-- here is the mini navbar for reports,inproducts etc.. -->
                <div class="w-full pl-20 mt-10 mini-nav-border">
                    <ul class="flex gap-4 text-sm font-extrabold text-bold">
                        <li>
                            Dashboard
                            <div class="indicator-bar"></div>
                        </li>
                        <li class="secondary-text">Users</li>
                        <li class="secondary-text">  <Link>Patients</Link>   </li>
                        <li class="secondary-text">Diagonoses</li>
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
                    <div
                        class="grid items-center justify-center grid-cols-3 gap-2 pl-4 calender-input"
                    >
                        <div class="flex col-span-2 gap-2">
                            <img class="w-6 h-6" src="/icons/object-group.png" alt="" />
                            <div>
                                <p class="text-xs font-bold text-gray-500">Category</p>
                                <h4 class="text-xs font-extrabold">All</h4>
                            </div>
                        </div>

                        <div>
                            <img class="w-4 h-4" src="/icons/angle-small-down.png" alt="" />
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
<style></style>
