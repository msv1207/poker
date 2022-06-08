<template>
    <Listbox as="div" >
        <ListboxLabel class="block text-sm font-medium text-gray-700"> Your vote</ListboxLabel>
        <div class="mt-1 relative">
            <ListboxButton class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
        <span class="flex items-center">
          <span class="ml-3 block truncate">{{ selected }}</span>
        </span>
                <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
          <SelectorIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
        </span>
            </ListboxButton>

            <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                <ListboxOptions class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                    <ListboxOption as="template" v-for="card in cards"  v-slot="{ active, selected }">
                        <li :class="[active ? 'text-white bg-purple-600' : 'text-gray-900', 'cursor-default select-none relative py-2 pl-3 pr-9']">
                            <div  @click="changed(card)" class="flex items-center">
                                <span :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">
                  {{ card }}
                </span>
                            </div>

                            <span v-if="selected===card" :class="[active ? 'text-white' : 'text-purple-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                <CheckIcon class="h-5 w-5" aria-hidden="true" />
              </span>
                        </li>
                    </ListboxOption>
                </ListboxOptions>
            </transition>
        </div>
    </Listbox>

</template>

<script >
import { ref } from 'vue'
import VueCountdown from '@chenfengyuan/vue-countdown';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CheckIcon, SelectorIcon } from '@heroicons/vue/solid'
export default {
   components:{
       Listbox,
       ListboxButton,
       ListboxLabel,
       ListboxOption,
       ListboxOptions,
       CheckIcon,
       SelectorIcon,
       VueCountdown
   },
   props:{
       cards:null,
       selected:null
   },
    data() {
        return {
            counting: false,
            // selected: this.selected
        }
    },
    watch(){
    },

    methods :{
        changed(card){
            console.log(card)
            this.selected = card;
            // this.$emit.selected=card;
            // this.$set(this.selected, null, card)
            // console.log(this.selected)
            this.$emit('name', card);

            // return(this.$emit.selected)


        },
        startCountdown: function () {
            this.counting = true;
        },
        onCountdownEnd: function () {
            this.counting = false;
        },

    }
}

</script>
