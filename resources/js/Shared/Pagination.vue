<template>
    <div class="flex items-center justify-center mt-6">
        <div class="items-center hidden md:flex gap-x-3">
            <template v-for="link in links">
                <a v-if="link.url" :href="link.url" v-text="link.label" class="px-2 py-1 text-sm rounded-md" :class="link.active ? 'text-blue-500 dark:bg-gray-800 bg-blue-100/60' : 'text-gray-500 dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100'"></a>
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            links: Array,
        }
    }
</script>