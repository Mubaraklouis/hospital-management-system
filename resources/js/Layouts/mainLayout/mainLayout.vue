<script setup >
import { Link, usePage ,useForm} from "@inertiajs/vue3";

import { computed } from "vue";

let page = usePage();


const diagonoses = computed(() => page.props.diagonoses)

const name = page.props.auth.user.name;

const role = page.props.role[0]?.title ? page.props.role[0].title:'regular' ;


console.log(role)

//check if the user is a doctor
const doctor = ()=>{
    if(role === 'doctor' ){
        return true;
    }
}


//check if the user is a admin
const admin = ()=>{
    if(role == 'admin'){
        return true;
    }

}

//check if the user is a cashier
const cashier = ()=>{
    if(role === 'cashier' ){
        return true;
    }
}


//check if the user is a recept
const recept = ()=>{
    if(role === 'recept' ){
        return true;
    }
}

//check if the user is a lab
const lab = ()=>{
    if(role === 'lab' ){
        return true;
    }
}





//working on search functionalities

const form = useForm({
   search:''
});


const search =()=>{
    form.get(route('doctor.search'))
}



</script>

<template>
<div>

    <div  v-if="role === 'regular'">
        <p class="mt-32 font-bold text-center">You dont have a role waiting for admin to assign you role</p>


                   <div class="flex justify-center gap-4 mt-8">
                    <div><img class="w-6 h-6" src="/icons/logout.png" alt="" /></div>
                    <Link class="font-bold" :href="route('logout')" method="post"> Logout</Link>
                   </div>


    </div>
    <div v-else>

<section class="grid grid-cols-5 mainNav">
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
                    <h5 class="mt-2 text-sm font-extrabold">Hospital MIS</h5>
                    <h5 class="text-xs secondary-text">HM-system</h5>
                </div>
            </div>
        </div>
        <section>
            <div class="mt-32">
                <ul class="flex flex-col gap-5 text-xs font-extrabold text-bold">
                    <li class="flex items-center gap-y-6 gap-x-2">
                        <div><img class="w-4 h-4" src="/icons/home.png" alt="" /></div>
                    <Link :href="route('dashboard')"> Dashboard</Link>
                    </li>
                    <li v-if="admin() || doctor()" class="flex items-center gap-y-6 gap-x-2">
                        <div>
                            <img class="w-4 h-4" src="/icons/doctor.png" alt="" />
                        </div>
                        <Link :href="route('doctor.home')"> Doctor</Link>
                    </li>
                    <li v-if="lab() || admin()" class="flex items-center gap-y-6 gap-x-2">
                        <div>
                            <img class="w-4 h-4" src="/icons/observation.png" alt="" />
                        </div>
            Lab Technician
                    </li>
                    <li v-if="admin() || recept()" class="flex items-center gap-y-6 gap-x-2">
                        <div>
                            <img
                                class="w-4 h-4"
                                src="/icons/reception.png"
                                alt=""
                            />
                        </div>
                  <Link :href="route('receptant.home')"> Recept</Link>
                    </li>
                    <li v-if=" admin() || cashier()" class="flex items-center gap-y-6 gap-x-2">
                        <div>
                            <img class="w-4 h-4" src="/icons/cashier.png" alt="" />
                        </div>
                   cashier
                    </li>
                    <li v-if="admin()" class="flex items-center gap-y-6 gap-x-2">
                        <div><img class="w-4 h-4" src="/icons/user.png" alt="" /></div>
                    <Link href="#">users</Link>
                    </li>

                    <li  class="flex items-center gap-y-6 gap-x-2">
                        <div><img class="w-6 h-6" src="/icons/logout.png" alt="" /></div>
                    <Link class="font-bold" href="#">Logout</Link>
                    </li>


                </ul>
            </div>
        </section>


    </nav>

    <!-- main page markup -->
    <div class="col-span-4">
        <!-- the h4 is for the main title -->
        <div class="flex justify-between mr-10">
            <h4 class="pt-6 pl-20 font-extrabold text-md">
           {{ name }}
           <!-- <Link :href="route('patients.index')">Patients</Link> -->
            </h4>

                          <!-- creating the user section and the icon -->
<Link href="/profile">
<div class="pt-4 pb-4 ">
            <!-- this div contains the user avater -->

            <div class="gap-2 align-center">
                <img
                    class="w-12 h-12 rounded-full user-border"
                    src="/icons/doctor.png"
                    alt=""
                />
                <div>


                </div>
            </div>
        </div>


</Link>
        </div>
        <!-- here is the mini navbar for reports,inproducts etc.. -->
        <div class="w-full pl-20 mini-nav-border">
            <ul class="flex gap-4 text-sm font-extrabold text-bold">
                <li>
                    <Link :href="route('dashboard')">Dashboard</Link>
                    <div class="indicator-bar"></div>
                </li>
                <li v-if="admin()"  class="secondary-text"><Link href="#">users</Link></li>
                <li v-if="admin() || recept() || doctor()" class="secondary-text">  <Link :href="route('patients.index')"> Patients</Link>   </li>
                <li v-if="admin() || doctor()" class="secondary-text"><Link :href="route('diagonoses.index')"> Diagonoses</Link></li>
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

            <form   v-if="admin() || doctor()" @submit.prevent="search()"  method="GET">
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
</div>
</template>
<style>

.mainNav{
    height: 100vh;
}
</style>
