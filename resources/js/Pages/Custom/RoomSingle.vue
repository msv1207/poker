<template>
    <navbar />
{{choose}}
    <div class="px-20 py-10">
    <StoryModel :id="room.id"/>
        <h1 class="text-2xl">Story:             {{story[id].title}} </h1>
        <br>
        <div class="  float-right  w-64 relative overflow-x-auto shadow-md sm:rounded-lg">
            <vote-form :selected="selected" :cards="room.cards"/>
<br>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">send invite</label>
                <input v-model="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@email.com" required>
                <button  class="  text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-800" @click="sendInvite" > sendInvite </button>
            </div>
            <a type="button" href="/choose" class=" text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-800"> finish vote</a>
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
        story: null,
        choose:null
    },
    data() {
        return {
            id:0,
            selected: 'your vote',
            email:null
        }
    },
    components: {VoteForm, StoryModel, LotModel, Navbar, RoomCards},
    methods:{
        nextStory(){
            Inertia.post('/choose', { choose: this.selected, story_id: this.story[this.id].id })
            this.id++;
        },
        test(card){
            this.selected=card
        },
        sendInvite(){
            var currentUrl = window.location.pathname;
            Inertia.get('/choose')
            Inertia.post('/send-email', { currentUrl: currentUrl, email: this.email })
        }
    }
}
</script>

<style scoped>

</style>
