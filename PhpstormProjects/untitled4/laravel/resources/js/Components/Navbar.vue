<template>
    <nav
        class=" bg-purple-800 relative w-full flex flex-wrap items-center justify-between py-4 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg">
        <div class="container-fluid w-full flex flex-wrap items-center justify-between px-20 ">
            <!--            <div class=" container-fluid">-->
            <a class="float-left flex items-center text-gray-900 hover:text-gray-900 focus:text-gray-900 mt-2 lg:mt-0 mr-1"
               href="#">
                 <logo/>
            </a>
            <a class="text-white" style="float: right;">
                <p class="font-mono" >Name Surname</p>
            </a>
            <!--            </div>-->
        </div>
    </nav>
</template>

<script>
import Logo from "@/Components/Logo";
export default {
    name: "Navbar",
    components: {Logo}
}
</script>

<style scoped>

</style>
