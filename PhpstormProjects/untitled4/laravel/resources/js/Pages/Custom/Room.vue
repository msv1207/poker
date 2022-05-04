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
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{room.title}}
                </th>
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
                    <room-model-update room= />
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
export default {
    components: {RoomModelUpdate, RoomModel},
    props:{
        rooms: null
    }
}

</script>
