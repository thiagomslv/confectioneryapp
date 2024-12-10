<template>

    <Head title="Controle de estoque" />

    <BackButton linkToBack="/branches/stock"/>
    
    <div class="px-3 mt-10 ">

        <div v-if="flash.message" class="mb-2">

            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ flash.message }}
                </div>
            </div>
        </div>

        <div class="flex justify-between mt-6 ">

            <form @submit.prevent="createProduct" class="max-w-lg w-full flex flex-col justify-center shadow-md sm:rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-gray-400 p-3">

                <h1 class="text-center">Cadastrar Produto</h1>

                <div class="mb-5">
                    <label for="product-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Produto</label>
                    <input v-model="form_AddProduct.name" type="text" id="product-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <span v-if="errors.name" class="text-sm text-red-700">{{ errors.name }}</span>
                </div>

                <div class="mb-5">
                    <label for="product-amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantidade (apenas números)</label>
                    <input v-model="form_AddProduct.amount" type="text" id="product-amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <span v-if="errors.amount" class="text-sm text-red-700">{{ errors.amount }}</span>
                </div>

                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Cadastrar</button>
            </form>
            
        </div>

        <hr class="my-5">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Nome do produto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantidade
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in stock" :key="item.id" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ item.id }}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ item.name }}
                        </th>
                        <td class="px-6 py-4">
                            <b>{{ item.amount }}</b>
                        </td>

                        <td class="px-6 py-4 flex justify-center">

                            <form @submit.prevent="changeAmount(item.id, 1)">
                                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Adicionar +1</button>
                            </form>
                            
                            <form @submit.prevent="changeAmount(item.id, -1)">
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Retirar -1</button>
                            </form>
                            
                            <!-- <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Remover do estoque</button> -->
                        </td>
                    </tr>
                    <!-- <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Microsoft Surface Pro
                        </th>
                        <td class="px-6 py-4">
                            1
                        </td>

                        <td class="px-6 py-4">
                            <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Adicionar</button>
                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Retirar</button>
                            <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Remover do estoque</button>
                        </td>
                    </tr> -->
                    
                </tbody>
            </table>
        </div>

    </div>

  
</template>

<script setup>

    import { reactive } from 'vue'
    import { router } from '@inertiajs/vue3'

    const props = defineProps({ stock: Object, branch_id: Number, flash: Object, errors: Object });

    const form_AddProduct = reactive({
        name: null,
        amount: null,
        branch_id: props.branch_id
    })

    function createProduct() {
        
        router.post('/branches/stock/store', form_AddProduct)
    }

    function changeAmount(productId, qnt){

        router.post(`/branches/stock/update/${productId}`, {

            qnt
        })
    }

</script>

<script>

    export default {

        

    }
</script>

<style>

</style>