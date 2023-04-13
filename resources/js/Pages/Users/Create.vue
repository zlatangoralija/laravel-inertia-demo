<template>
    <Head>
        <title>Create a user</title>
        <meta type="description" content="Create a user description" head-key="description">
    </Head>


    <section class="container px-4 mx-auto">
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl">Create new user</h1>
        </div>

        <form @submit.prevent="submit" action="" method="POST" class="mx-w-md mx-auto mt-7">
            <div class="mb-6">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
                <input v-model="form.name" type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" required>
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                <input v-model="form.email" type="email" class="border border-gray-400 p-2 w-full" name="email" id="email" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                <input v-model="form.password" type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" required>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
            </div>
        </form>
    </section>


</template>

<script setup>
import { reactive } from "vue"
import { router } from "@inertiajs/vue3"

    let form = reactive({
        name: '',
        email: '',
        password: '',
    })

    let submit = () => {
        router.post('/users', form)
    }

</script>

<style scoped>

</style>
