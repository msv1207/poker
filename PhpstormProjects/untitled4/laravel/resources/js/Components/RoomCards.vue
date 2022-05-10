<template>
    <button @click="choose(card)">
        {{
            choosed
        }}    <div  class=" rounded-md w-32 relative h-40  shadow-sm shadow-indigo-500/40 hover:shadow-lg  ">
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
            if (this.choosed ==='')
            this.choosed=card
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
