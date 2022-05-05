<template>
    <room-model/>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
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

</template>
<script>

import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import RoomModel from "../../Components/RoomModel";
import RoomModelUpdate from "../../Components/RoomModelUpdate";
import RoomModelDelete from "../../Components/RoomModelDelete";
export default {
    components: {RoomModelDelete, RoomModelUpdate, RoomModel},
    props:{
        rooms: null
    },
    methods:{
        // redirectUrl(){
        //     this.router.push('/home')
        // }
    }
}

</script>
