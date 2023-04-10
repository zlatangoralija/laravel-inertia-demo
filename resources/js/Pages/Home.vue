<template>
    <h1 class="text-4xl font-bold">Home</h1>
    <Nav/>

    <div style="margin-top: 1000px;">
        <p>The time is {{time}}</p>
        <Link href="/" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>

</template>

<script>
import Nav from '../Shared/Nav.vue';
import { Link } from "@inertiajs/vue3"

export default {
    components: {
        Nav, Link
    },

    props: {
        time: String,
    }
}
</script>

<style scoped>

</style>
