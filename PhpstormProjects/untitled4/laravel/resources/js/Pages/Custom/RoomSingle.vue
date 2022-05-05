<template>
    <div v-for="card in room.cards ">
<room-cards :card="card"/>
    </div>
</template>

<script>
import RoomCards from "../../Components/RoomCards";
export default {
    name: "RoomSingle",
    props:{
        room : Object
    },
    components: {RoomCards}
}
</script>

<style scoped>

</style>
