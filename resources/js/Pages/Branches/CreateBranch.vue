<template>

    <Head title="Cadastro de filiais" />
    <BackButton linkToBack="/"/>

    <div class="cnt-add-branch">

        <form class="max-w-lg mx-auto flex flex-col justify-center" @submit.prevent="submit">

            <div v-if="flash.message" class="mb-5">

                <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ flash.message }}
                    </div>

                    <button @click="flash.message = ''" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            </div>
        
            <div class="mb-5">
                <label for="branch-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome da filial</label>
                <input v-model="form.name" type="text" id="branch-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <span v-if="errors.name" class="text-sm text-red-700">{{ errors.name }}</span>
            </div>

            <div class="mb-5">
                <label for="branch-address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço</label>
                <input v-model="form.address" type="text" id="branch-address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <span v-if="errors.address" class="text-sm text-red-700">{{ errors.address }}</span>
            </div>

            <div class="mb-5">
                <label for="branch-phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                <input v-model="form.phone" type="text" id="branch-phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <span v-if="errors.phone" class="text-sm text-red-700">{{ errors.phone }}</span>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">

                <div class="mb-5">
                    <label for="branch-lat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latitude</label>
                    <input v-model="form.lat" type="text" id="branch-lat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <span v-if="errors.lat" class="text-sm text-red-700">{{ errors.lat }}</span>
                </div>
                <div class="mb-5">
                    <label for="branch-long" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Longitude</label>
                    <input v-model="form.long" type="text" id="branch-long" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <span v-if="errors.long" class="text-sm text-red-700">{{ errors.long }}</span>
                </div>
            </div>

            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Cadastrar</button>
        </form>
    </div>

</template>

<script setup>
    import { reactive } from 'vue'
    import { router } from '@inertiajs/vue3'

    const form = reactive({
        name: null,
        address: null,
        phone: null,
        lat: null,
        long: null,
    })

    function submit() {
        router.post('/branches/store', form)
    }
</script>

<script>

    export default {

        props: {

            errors: Object,
            flash: Object
        }
    }
</script>

<style scoped>

.cnt-add-branch{

    display: flex;
    width: 100vw;
    height: 100vh;
}
</style>