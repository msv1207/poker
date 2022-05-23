<template>
<!--        <div-->
<!--            class="fixed inset-0 z-50 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">-->
<!--            <transition-->
<!--                appear-->
<!--                enter-active-class="transform ease-out duration-300 transition"-->
<!--                enter-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"-->
<!--                enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"-->
<!--                leave-active-class="transition ease-in duration-100"-->
<!--                leave-class="opacity-100"-->
<!--                leave-to-class="opacity-0">-->
<!--                <div-->
<!--                    v-show="notification && show"-->
<!--                    class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden"-->
<!--                    @mouseleave="show = false">-->
<!--                    <div class="p-4">-->
<!--                        <div class="flex items-start">-->
<!--                            <div class="flex-shrink-0">-->
<!--                            </div>-->
<!--                            <div class="ml-3 w-0 flex-1 pt-0.5">-->
<!--                                <template v-if="notification">-->
<!--                                    <p class="text-sm font-medium text-gray-900">-->
<!--                                        {{ notification }}-->
<!--                                    </p>-->
<!--                                    <p class="mt-1 text-sm text-gray-500">-->
<!--                                        {{ notification }}-->
<!--                                    </p>-->
<!--                                </template>-->
<!--                                <template v-else>-->
<!--                                    <p class="text-sm font-medium text-gray-900">-->
<!--                                        {{notification }}-->
<!--                                    </p>-->
<!--                                </template>-->
<!--                            </div>-->
<!--                            <div class="ml-4 flex-shrink-0 flex">-->
<!--                                <button-->
<!--                                    class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"-->
<!--                                    @click="show = false">-->
<!--                                    <span class="sr-only">Close</span>-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </transition>-->
<!--        </div>-->
    </template>

<script>
import Notifications from 'notiwind'


    export default {
    components:{notifications},
        data() {
            return {
                show: true,
            }
        },
        name: "NotificationBox",

        computed: {
            notification() {
                return     $page.props.flash.notification;
            },


            icon() {
                return {
                    red: 'exclamation-circle',
                    green: 'check-circle',
                };
            }
        },
    }
    </script>
<style scoped>

</style>
