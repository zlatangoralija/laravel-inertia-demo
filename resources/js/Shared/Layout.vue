<template>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">My app</h1>
                <p class="text-sm ml-4">Welcome, {{username}}</p>
            </div>
            <Nav />
        </header>
    </section>

    <section class="p-6">
        <div class="p-6 mx-auto">
            <slot />
        </div>
    </section>
</template>

<script>
import Nav from "./Nav.vue";

export default {
    components: {
        Nav,
    },

    computed: {
        username(){
            return this.$page.props.auth.user.username;
        }
    }
}
</script>

<style scoped>

</style>
