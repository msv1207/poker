<template>
    <navbar />

{{choose}}
    <div class="px-20 py-10">

        <StoryModel  :id="room.id"/>

        <h1 class="text-2xl">Story:             {{story[id].title}} </h1>
        <br>
<!--        <div class="flex space-x-4 float-right">-->
        <div class="space-x-4 space-x-reverse px-5 py-5 float-right  w-1/4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <vote-form @name="getName($event)" :selected="selected" :cards="room.cards"/>
<br>
            <button  class="  text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-800" @click="startVote" > start vote </button>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">send invite</label>
                <input v-model="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@email.com" required>
               <br>
                <button  class="  text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-800" @click="sendInvite" > sendInvite </button>
            </div>
            <button type="button" @click="finishVote(room.id, story[id].id)" class=" text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-800"> finish vote</button>
            <button class="  text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-800" @click="nextStory(room.id, story[id].id)"> vote</button>
        </div>
<!--            </div>-->
        <div  class=" w-2/3 p-6 py-5 relative overflow-x-auto shadow-md sm:rounded-lg" v-if="tet!=null">
            <result :rooms="tet.data.rooms" />
        </div>
        <div v-if="tet==null" class="  w-2/3 p-6 py-5 relative overflow-x-auto shadow-md sm:rounded-lg">
            <span  v-for="card in room.cards ">
           <room-cards @card="test($event)" :card="card"/>
        </span>
<!--<notification-box/>-->
            <div v-if="$page.props.flash.message" class="alert">
                {{ $page.props.flash.message }}
            </div>

            </div>
    </div>
</template>

<script>
import axios from 'axios';
import RoomCards from "../../Components/RoomCards";
import Navbar from "@/Components/Navbar";
import LotModel from "@/Components/StoryModel";
import StoryModel from "@/Components/StoryModel";
import VoteForm from "@/Components/VoteForm";
import {Inertia} from "@inertiajs/inertia";
import NotificationBox from "@/Components/NotificationBox";
import Result from "@/Components/Result";
export default {
    name: "RoomSingle",
    props:{
        room : Object,
        story: null,
        choose:null,
    },
    data() {
        return {
            id:0,
            selected: 'your vote',
            email:null,
            tet:null
        }
    },
    components: {Result, VoteForm, StoryModel, LotModel, Navbar, RoomCards},
    methods:{
        nextStory(room, story){
            // alert(room)
            // alert(story)
            console.log()
             Inertia.post('/room/' + room +'/story/' + story + '/choose', { choose: this.selected, story_id: this.story[this.id].id })
            // Inertia.get('room/{room}/story/{story}/choose')
        },
        test(card){
            this.selected=card
        },
        sendInvite(){
            var currentUrl = window.location.pathname;
            Inertia.post('/send-email', { currentUrl: currentUrl, email: this.email })
        },
        startVote(){
            this.tet=null
        },
        finishVote(room, story)
        {
            // alert('/room/' + room +'/story/' + story + '/choose')
            axios.get('/room/' + room +'/story/' + story + '/choose')
                .then(res => {
                    // console.log(res)
                   this.tet=res
                })
            // Inertia.get('/room/' + room +'/story/' + story + '/choose')
            this.id++;


        },
        getName(name) {
            alert(name);
        }

    }
}
</script>

<style scoped>

</style>
