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

                <button @click="flash.message = ''" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex justify-center mt-6 gap-5">

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

            <form @submit.prevent="searchProduct" class="max-w-lg w-full flex flex-col justify-center shadow-md sm:rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-gray-400 p-3">

                <h1 class="text-center">Pesquisar Produto</h1>

                <div class="mb-5">
                    <label for="product-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Produto</label>
                    <input v-model="form_ProductSearch.name" type="text" id="product-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Pesquisar</button>

                <button @click="undoSearch" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Desfazer pesquisa</button>
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

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ item.id }}
                        </td>

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ item.name }}
                        </td>
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

                            <form @submit.prevent="deleteProduct(item.id)">
                                <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Remover do estoque</button>
                            </form>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>



<script setup>

    import { reactive } from 'vue'
    import { router } from '@inertiajs/vue3'

    import { onMounted } from 'vue'
    import { initFlowbite } from 'flowbite'

    const props = defineProps({ stock: Object, branch_id: Number, flash: Object, errors: Object });

    onMounted(() => {
        initFlowbite();
    });

    const form_AddProduct = reactive({
        name: null,
        amount: null,
        branch_id: props.branch_id
    })

    const form_ProductSearch = reactive({

        name: null
    });

    function createProduct() {
        
        router.post('/branches/stock/store', form_AddProduct)
    }

    function changeAmount(productId, qnt){

        router.post(`/branches/stock/update/${productId}`, {

            qnt
        })
    }

    function deleteProduct(productId){

        router.post(`/branches/stock/destroy/${productId}`);
    }

    function searchProduct(){

        router.get(`/branches/stock/search/${props.branch_id}/${form_ProductSearch.name}`);
    }

    function undoSearch(){

        router.get(`/branches/stock/show/${props.branch_id}`);
    }

</script>

<script>

    export default {

        

    }
</script>

<style>

</style>