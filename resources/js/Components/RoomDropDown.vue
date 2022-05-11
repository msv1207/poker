<template>
    <div class="flex flex-wrap">
        <div class="w-full sm:w-6/12 md:w-4/12 px-4">
            <div>
                <p class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900" v-on:click="toggleDropdown()" ref="btnDropdownRef">
                White Dropdown
                </p>
                <div v-bind:class="{'hidden': !dropdownPopoverShow, 'block': dropdownPopoverShow}">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="useAllCards"  v-model="allSelect" class="w-6 h-6 rounded-full"  />
                            <span class="ml-2">use all cards</span>
                        </label>
                    </div>
                    <div>
                         <label class="inline-flex items-center">
                         <input type="checkbox" id="cards" value="0" v-model="cards" class="w-6 h-6 rounded-full"  />
                            <span class="ml-2">0</span>
                         </label>
                    </div>
                    <div>
                            <label class="inline-flex items-center">
                             <input type="checkbox" id="1/2" value="1/2" v-model="cards" class="w-6 h-6 rounded-full"  />
                     <span class="ml-2">½</span>
                </label>
                        </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="1" value="1" v-model="cards" class="w-6 h-6 rounded-full"  />
                            <span class="ml-2">1</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="2" value="2" v-model="cards" class="w-6 h-6 rounded-full"  />
                            <span class="ml-2">2</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="3" value="3" v-model="cards" class="w-6 h-6 rounded-full"  />
                            <span class="ml-2">3</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="4" value="4" v-model="cards" class="w-6 h-6 rounded-full"  />
                            <span class="ml-2">4</span>
                        </label>
                    </div>
                    <span>Checked names: {{ cards }}</span>

                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { createPopper } from "@popperjs/core";

export default {
    name: "RoomDropDown",
    props:{
        cards : []
    },
    data() {
        return {
            dropdownPopoverShow: false,
            cards: this.cards
        }
    },
    methods: {
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
            this.cards=["0", "2", "3", "4"]

        }
    }
}
</script>
