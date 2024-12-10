<template>

    <Head title="Controle de estoque" />

    <BackButton linkToBack="/"/>

    <div class="cnt-search-branch">

        <form class="max-w-lg h-full mx-auto flex flex-col justify-center" @submit.prevent="submit">

            <div v-if="flash.message" class="mb-5">

                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">{{ flash.message }}</span>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                
                <label for="branch" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Escolha uma filial</label>
                <select v-model="id" id="branch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled value="0">Escolha uma filial</option>

                    <option v-for="branch in branches" :key="branch.id" :value="branch.id">{{ branch.name }}</option>
                </select>
                
            </div>

            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Buscar estoque</button>
        </form>

    </div>

</template>

<script setup>

    import { ref  } from 'vue'
    import { router } from '@inertiajs/vue3'

    defineProps({ branches: Object, flash: Object })

    const id = ref(0);

    function submit() {
        router.get(`/branches/stock/show/${id.value}`)
    }

</script>


<script>

    export default {
        
    }
</script>

<style scoped>

    .cnt-search-branch{
        width: 100vw;
        height: 100vh;
    }

</style>