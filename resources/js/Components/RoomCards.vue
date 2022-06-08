<template>
    <button @click="choose(card)">
        <div  class="  w-40  h-44   ">

           <div  class="  rounded-md w-36 relative h-44  shadow-sm shadow-indigo-500/40 hover:shadow-lg  ">
        <div class="absolute left-1 top-0">
            {{ card }}
        </div>
        <div class="place-self-center ">
        <div class="text-2xl text-white rounded-md absolute bg-purple-800  inset-6 ">
<!--            <div class=" absolute ">-->
                <div class=" center ">
                    {{ card }}
                    </div>
<!--            </div>-->
        </div>
        </div>
        <div class="absolute bottom-0 right-1 ">
        <p> {{ card }}
        </p>
        </div>
    </div>
        </div>
    </button>
</template>

<script>
export default {
    name: "RoomCards",
    props:{
        card:null,
    },
    data() {
        return {
            choosed: ''
        }
    },
    methods:{
        choose(card){
            if (this.choosed ==='') {
                this.choosed = card
                this.$emit('card', card)
            }
            else
            {
                this.choosed =''
            }
        }
    }
}
</script>

<style scoped>
.center {
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    left: 50%;

}
</style>
