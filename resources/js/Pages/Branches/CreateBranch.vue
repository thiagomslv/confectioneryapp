<template>

    <Head title="Cadastro de filiais" />
    <BackButton />

    <div class="cnt-add-branch">

        <form class="max-w-lg mx-auto flex flex-col justify-center">
        
            <div class="mb-5">
                <label for="branch-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome da filial</label>
                <input type="text" id="branch-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="mb-5">
                <label for="branch-address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço</label>
                <input type="text" id="branch-address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="mb-5">
                <label for="branch-phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                <input type="text" id="branch-phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">

                <div class="mb-5">
                    <label for="branch-lat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latitude</label>
                    <input type="text" id="branch-lat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label for="branch-long" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Longitude</label>
                    <input type="text" id="branch-long" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>

            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Cadastrar</button>
        </form>
    </div>

</template>

<script>

    import { Head } from '@inertiajs/vue3';
    import BackButton from '../BackButton.vue';

    export default {

        components: {

            BackButton,
            Head
        },

    }
</script>

<style scoped>

.cnt-add-branch{

    display: flex;
    width: 100vw;
    height: 100vh;
}
</style>