<!--<template>-->
<!--&lt;!&ndash;        <div&ndash;&gt;-->
<!--&lt;!&ndash;            class="fixed inset-0 z-50 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">&ndash;&gt;-->
<!--&lt;!&ndash;            <transition&ndash;&gt;-->
<!--&lt;!&ndash;                appear&ndash;&gt;-->
<!--&lt;!&ndash;                enter-active-class="transform ease-out duration-300 transition"&ndash;&gt;-->
<!--&lt;!&ndash;                enter-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"&ndash;&gt;-->
<!--&lt;!&ndash;                enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"&ndash;&gt;-->
<!--&lt;!&ndash;                leave-active-class="transition ease-in duration-100"&ndash;&gt;-->
<!--&lt;!&ndash;                leave-class="opacity-100"&ndash;&gt;-->
<!--&lt;!&ndash;                leave-to-class="opacity-0">&ndash;&gt;-->
<!--&lt;!&ndash;                <div&ndash;&gt;-->
<!--&lt;!&ndash;                    v-show="notification && show"&ndash;&gt;-->
<!--&lt;!&ndash;                    class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden"&ndash;&gt;-->
<!--&lt;!&ndash;                    @mouseleave="show = false">&ndash;&gt;-->
<!--&lt;!&ndash;                    <div class="p-4">&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="flex items-start">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="flex-shrink-0">&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="ml-3 w-0 flex-1 pt-0.5">&ndash;&gt;-->
<!--&lt;!&ndash;                                <template v-if="notification">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <p class="text-sm font-medium text-gray-900">&ndash;&gt;-->
<!--&lt;!&ndash;                                        {{ notification }}&ndash;&gt;-->
<!--&lt;!&ndash;                                    </p>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <p class="mt-1 text-sm text-gray-500">&ndash;&gt;-->
<!--&lt;!&ndash;                                        {{ notification }}&ndash;&gt;-->
<!--&lt;!&ndash;                                    </p>&ndash;&gt;-->
<!--&lt;!&ndash;                                </template>&ndash;&gt;-->
<!--&lt;!&ndash;                                <template v-else>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <p class="text-sm font-medium text-gray-900">&ndash;&gt;-->
<!--&lt;!&ndash;                                        {{notification }}&ndash;&gt;-->
<!--&lt;!&ndash;                                    </p>&ndash;&gt;-->
<!--&lt;!&ndash;                                </template>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="ml-4 flex-shrink-0 flex">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button&ndash;&gt;-->
<!--&lt;!&ndash;                                    class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"&ndash;&gt;-->
<!--&lt;!&ndash;                                    @click="show = false">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <span class="sr-only">Close</span>&ndash;&gt;-->
<!--&lt;!&ndash;                                </button>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->
<!--&lt;!&ndash;            </transition>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--    </template>-->

<!--<script>-->
<!--import Notifications from 'notiwind'-->


<!--    export default {-->
<!--    // components:{Notifications},-->
<!--        data() {-->
<!--            return {-->
<!--                show: true,-->
<!--            }-->
<!--        },-->
<!--        name: "NotificationBox",-->

<!--        computed: {-->
<!--            notification() {-->
<!--                return     $page.props.flash.notification;-->
<!--            },-->


<!--            icon() {-->
<!--                return {-->
<!--                    red: 'exclamation-circle',-->
<!--                    green: 'check-circle',-->
<!--                };-->
<!--            }-->
<!--        },-->
<!--    }-->
<!--    </script>-->
<!--<style scoped>-->

<!--</style>-->
