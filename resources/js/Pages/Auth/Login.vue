<template>
    <Head>
        <title>Login</title>
        <meta type="description" content="Login description" head-key="description">
    </Head>

    <section class="container px-4 mx-auto">
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl">Log in</h1>
        </div>

        <form @submit.prevent="submit" action="" method="POST" class="mx-w-md mx-auto mt-7">
            <div class="mb-6">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                <input v-model="form.email" type="email" class="border border-gray-400 p-2 w-full" name="email" id="email" required>
                <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-sm"></div>
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                <input v-model="form.password" type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" required>
                <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-sm"></div>
            </div>

            <div class="mb-6">
                <button :disabled="form.processing" type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Log in</button>
            </div>
        </form>
    </section>
</template>

<script>
export default {
    layout: null,
}
</script>

<script setup>
    import { useForm } from "@inertiajs/vue3"

    let form = useForm({
        'email': '',
        'password': ''
    })

    let submit = () => {
        form.post('/login')
    }


</script>

<style scoped>

</style>
