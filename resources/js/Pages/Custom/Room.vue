<template>
    <navbar/>
    <div class="px-20 py-10">
        <room-model />
        <div  >
           <h1 class="font-sans text-2xl"> Latest rooms</h1>
<br>
        </div>
        <p>{{$page.props.flash.notification }}</p>

        <div class="py-5 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Records
                </th>
                <th scope="col" class="px-6 py-3">
                    Last Used
                </th>
                <th scope="col" class="px-6 py-3">
                    Last Story
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody v-for="room in rooms">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-purple-100 dark:hover:bg-gray-600">
                <a v-bind:href="'/room/'+ room.id">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{room.title}}
                </th>
                </a>
                <td class="px-6 py-4">

                    test
                </td>
                    <td class="px-6 py-4">
                    test
                </td>
                        <td class="px-6 py-4">
                    test
                </td>
                <td class="px-6 py-4 text-right">
                    <room-model-update :room="room" :id="room.id" />
                    <room-model-delete :id="room.id"/>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    </div>
    <div
                class="fixed inset-0 z-50 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
                <transition
                    appear
                    enter-active-class="transform ease-out duration-300 transition"
        enter-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                    enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
                    leave-active-class="transition ease-in duration-100"
                    leave-class="opacity-100"
                    leave-to-class="opacity-0">
                    <div
                        v-show="$page.props.flash.notification && show"
                        class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden"
                        @mouseleave="show = false">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
<!--                                    <Icon :class="'text-' + $page.props.flash.notification.color + '-400'" :icon="icon"/>-->
                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <template v-if="$page.props.flash.notification">
                                        <p class="text-sm font-medium text-gray-900">
                                            {{ $page.props.flash.notification }}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $page.props.flash.notification }}
                                        </p>
                                    </template>
                                    <template v-else>
                                        <p class="text-sm font-medium text-gray-900">
                                            {{ $page.props.flash.notification || $page.props.flash.notification }}
                                        </p>
                                    </template>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button
                                        class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        @click="show = false">
                                        <span class="sr-only">Close</span>
                                        <icon icon="x" class="h-5 w-5"/>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
</template>
<script>

import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import RoomModel from "../../Components/RoomModel";
import RoomModelUpdate from "../../Components/RoomModelUpdate";
import RoomModelDelete from "../../Components/RoomModelDelete";
import Navbar from "@/Components/Navbar";
export default {
    components: {Navbar, RoomModelDelete, RoomModelUpdate, RoomModel},
    props:{
        error: null,
        rooms: null
    },
    computed: {
        notification() {
            return this.$page.props.flash.notification;
        },
        icon() {
            return {
                red: 'exclamation-circle',
                green: 'check-circle',
            }["red"];
                    }
    },
    methods:{
        // redirectUrl(){
        //     this.router.push('/home')
        // }
    },
}

</script>
