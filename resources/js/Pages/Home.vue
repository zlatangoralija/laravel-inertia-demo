<template>
    <h1 class="text-3xl">Home</h1>

    <div>
        <p>The time is {{time}}</p>
        <Link href="/" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>
</template>

<script>
import Layout from "../Shared/Layout.vue";

export default {
    props: {
        time: String,
    },

    layout: Layout
}
</script>

<style scoped>

</style>
