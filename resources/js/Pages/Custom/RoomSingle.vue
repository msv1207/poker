<template  >
    <navbar/>
<my-toast-component/>
<!--    {{$page.props}}-->
    {{ choose }}
    {{$page.props.flash.toast}}
    <div class="px-20 py-10">

        <StoryModel :id="room.id"/>
        <span class="font-sans text-2xl">{{ room.title }}              </span>
        <div v-if="story[id]!=undefined">

        <span class="flex items-center justify-center font-sans text-2xl">{{ story[id].title }}</span>
</div>
        <div v-else>
            <span class="flex items-center justify-center font-sans text-2xl">create story</span>

        </div>
        <br>
        <!--        <div class="flex space-x-4 float-right">-->
        <div
            class="space-x-4 space-x-reverse px-5 py-5 float-right  w-1/4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <br>

            <div class=" mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Send
                    invite</label>
                <input v-model="email" type="email" id="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="email@email.com" required>
                <br>
                <button
                    class="  text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-800"
                    @click="sendInvite"> sendInvite
                </button>
            </div>
            <vote-form @name="getName($event)" :selected="selected" :cards="room.cards"/>
<br>
            <button type="button" @click="finishVote(room.id, story[id].id)"
                    class=" text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-800">
                finish vote
            </button>
            <button
                class="  text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-800"
                @click="nextStory(room.id, story[id].id)"> vote
            </button>
            <div>

                <button :disabled="counting"
                        class="  text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-800"
                        @click="startVote">

                    <vue-countdown v-if="counting" :time="60000" @end="onCountdownEnd" v-slot="{ totalSeconds }">
                        {{ totalSeconds }}s for voting
                    </vue-countdown>
                    <span v-else>Start vote</span>
                </button>
            </div>
        </div>
        <!--            </div>-->
        <div class=" w-2/3 p-6 py-5 relative overflow-x-auto shadow-md sm:rounded-lg" v-if="tet!=null">
            <result :rooms="tet.data.rooms"/>
        </div>
        <div v-if="tet==null" class="  w-2/3 p-6 py-5 relative overflow-x-auto shadow-md sm:rounded-lg">
            <span v-for="card in room.cards ">
           <room-cards @card="test($event)" :card="card"/>
        </span>
            <!--<notification-box/>-->
            <div v-if="$page.props.flash.message" class="alert">
                {{ $page.props.flash.message }}
            </div>

        </div>
    </div>
    <h1 class="flex items-center justify-center font-sans text-2xl">Stories </h1>
    <div class="px-20 py-5">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>

                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody v-if="story[id]!=undefined" v-for="room in story">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-purple-100 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{ room.title }}
                </th>
                <td class="px-6 py-4 text-right">
                    <story-delete :room_id="room.id" :story_id="id+1"/>
                </td>
            </tr>

            </tbody>
        </table>
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
import VueCountdown from "@chenfengyuan/vue-countdown";
import StoryDelete from "@/Components/StoryDelete";
import MyToastComponent from "@/Components/MyToastComponent";

export default {
    name: "RoomSingle",
    props: {
        room: Object,
        story: null,
        choose: null,
    },
    data() {
        return {
            id: 0,
            selected: 'your vote',
            email: null,
            tet: null,
            counting: false,
        }
    },
    components: {MyToastComponent, StoryDelete, Result, VoteForm, StoryModel, LotModel, Navbar, RoomCards, VueCountdown},
    methods: {
        nextStory(room, story) {
            // alert(room)
            // alert(story)
            console.log()
            Inertia.post('/room/' + room + '/story/' + story + '/choose', {
                choose: this.selected,
                story_id: this.story[this.id].id
            })
            // Inertia.get('room/{room}/story/{story}/choose')
        },
        test(card) {
            this.selected = card
        },
        sendInvite() {
            var currentUrl = window.location.pathname;
            Inertia.post('/send-email', {currentUrl: currentUrl, email: this.email})
        },
        startVote() {
            this.tet = null
            this.counting = true;

        },
        finishVote(room, story) {
            // alert('/room/' + room +'/story/' + story + '/choose')
            axios.get('/room/' + room + '/story/' + story + '/choose')
                .then(res => {
                    // console.log(res)
                    this.tet = res
                })
            // Inertia.get('/room/' + room +'/story/' + story + '/choose')
            this.counting=false
            this.id++;


        },
        onCountdown()  {
            // alert("cefce")
            this.counting = true;
            // Inertia.reload({ only: ['story'] })
            // Inertia.reload()

        },
        onCountdownEnd: function () {
            this.counting = false;
        },

        getName(name) {
            alert(name);
        },
        updateStory(){

            Inertia.get('/room/1', {}, {preserveState: true,})


        }

    }
}
</script>

<style scoped>

</style>
