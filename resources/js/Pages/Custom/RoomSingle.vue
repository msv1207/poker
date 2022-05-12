<template>
    <navbar />

    <div class="px-20 py-10">
    <StoryModel :id="room.id"/>
        <h1 class="text-2xl">Story:             {{story[id].title}} </h1>
        <br>
        <div class="  float-right  w-64 relative overflow-x-auto shadow-md sm:rounded-lg">
            <vote-form :selected="selected" :cards="room.cards"/>
<br>
            <button class="  text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-800" @click="nextStory"> vote</button>
        </div>
        <div class=" p-6 py-5">
            <span  v-for="card in room.cards ">
           <room-cards @card="test($event)" :card="card"/>
       <span> &nbsp;</span>
        </span>

            <div v-if="$page.props.flash.message" class="alert">
                {{ $page.props.flash.message }}
            </div>

            </div>
    </div>
</template>

<script>
import RoomCards from "../../Components/RoomCards";
import Navbar from "@/Components/Navbar";
import LotModel from "@/Components/StoryModel";
import StoryModel from "@/Components/StoryModel";
import VoteForm from "@/Components/VoteForm";
import {Inertia} from "@inertiajs/inertia";
export default {
    name: "RoomSingle",
    props:{
        room : Object,
        story: null
    },
    data() {
        return {
            id:0,
            selected: null
        }
    },
    components: {VoteForm, StoryModel, LotModel, Navbar, RoomCards},
    methods:{
        nextStory(){
            Inertia.post('/', selected)
            this.id++;
        },
        test(card){
            this.selected=card
        }
    }
}
</script>

<style scoped>

</style>
