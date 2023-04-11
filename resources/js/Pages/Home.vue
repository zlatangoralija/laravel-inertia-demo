<template>
    <Layout>
        <h1 class="text-3xl">Home</h1>

        <div>
            <p>The time is {{time}}</p>
            <Link href="/" class="text-blue-500" preserve-scroll>Refresh</Link>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../Shared/Layout.vue";

defineProps({
    time: String,
})
</script>

<style scoped>

</style>
