<template>
    <navbar />
    <div class="px-20 py-10">
    <StoryModel :id="room.id"/>
        <h1 class="text-2xl">Story:             {{room.story[0].title}} </h1>
        <div class="p-6 py-5">

            <span  v-for="card in room.cards ">
<!--    <div v-for="card in room.cards ">-->
           <room-cards  :card="card"/>
       <span> &nbsp;</span>
<!--    </div>-->
        </span>
<!--            <div v-if="$page.props.flash.message" class="alert">-->
<!--                {{ $page.props.flash.message }}-->
<!--            </div>-->

            </div>
    </div>
</template>

<script>
import RoomCards from "../../Components/RoomCards";
import Navbar from "@/Components/Navbar";
import LotModel from "@/Components/StoryModel";
import StoryModel from "@/Components/StoryModel";
export default {
    name: "RoomSingle",
    props:{
        room : Object
    },
    components: {StoryModel, LotModel, Navbar, RoomCards},

}
</script>

<style scoped>

</style>
