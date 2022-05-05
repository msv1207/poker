<template>
    <div>

        <button class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900" type="button" v-on:click="toggleModal()">
            Create Room
        </button>

        <div v-if="showModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Room Create
                        </h3>
                    <button  type="button" v-on:click="toggleModal()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>

                    </div>
                    <div class="p-6 space-y-6">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your title</label>
                                <input v-model="form.title" type="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                            </div>
                            <div class="flex flex-wrap">
                                <div class="w-full sm:w-6/12 md:w-4/12 px-4">
                                    <div>
                                        <p class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900" v-on:click="toggleDropdown()" ref="btnDropdownRef">
                                            White Dropdown
                                        </p>
                                        <div v-bind:class="{'hidden': !dropdownPopoverShow, 'block': dropdownPopoverShow}">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" id="useAllCards"  @click="allSelect" class="w-6 h-6 rounded-full"  />
                                                    <span class="ml-2">use all cards</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" id="cards" value="0" v-model="form.cards" class="w-6 h-6 rounded-full"  />
                                                    <span class="ml-2">0</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" id="1/2" value="1/2" v-model="form.cards" class="w-6 h-6 rounded-full"  />
                                                    <span class="ml-2">½</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" id="1" value="1" v-model="form.cards" class="w-6 h-6 rounded-full"  />
                                                    <span class="ml-2">1</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" id="2" value="2" v-model="form.cards" class="w-6 h-6 rounded-full"  />
                                                    <span class="ml-2">2</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" id="3" value="3" v-model="form.cards" class="w-6 h-6 rounded-full"  />
                                                    <span class="ml-2">3</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" id="4" value="4" v-model="form.cards" class="w-6 h-6 rounded-full"  />
                                                    <span class="ml-2">4</span>
                                                </label>
                                            </div>
                                </div>
                            </div>
                            <button type="submit" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
</template>

<script>

import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import RoomDropDown from "./RoomDropDown";
import {createPopper} from "@popperjs/core";
export default {
    name: "roomModel",
    components: {RoomDropDown},
    setup () {
        const form = reactive({
            title: null,
            cards: [],
        })

        function submit() {
            Inertia.post('/room', form)
        }

        return { form, submit }
    },
    data() {
        return {
            showModal: false,
            dropdownPopoverShow: false,
        }
    },
    methods: {
        toggleModal: function(){
            this.showModal = !this.showModal;
        },
        toggleDropdown: function(){
            if(this.dropdownPopoverShow){
                this.dropdownPopoverShow = false;
            } else {
                this.dropdownPopoverShow = true;
                createPopper(this.$refs.btnDropdownRef, this.$refs.popoverDropdownRef, {
                    placement: "bottom-start"
                });
            }
        },
        allSelect:function() {
            // if(this.form.cards===["0", "1", '1/2', "2", "3", "4"]) {
            //     this.form.cards = []
            // }
            // else {
                this.form.cards = ["0", "1", '1/2', "2", "3", "4"]
            // }
            // return this.form.cards

        }
    }
}
</script>
