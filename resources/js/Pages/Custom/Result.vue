<template>
    <navbar/>
    {{room.choose}}
    <div v-for="vote in room.choose">
    {{vote.title}}
    </div>
</template>

<script>
import Navbar from "@/Components/Navbar";

export default {
    components: {Navbar},
    props:{
        room: null
    },
}
</script>

<style scoped>

</style>
