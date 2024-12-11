<template>

    <Head title="Listagem de filiais" />
    <BackButton linkToBack="/"/>

    <div class="px-3 mt-10 ">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Endereço
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Telefone
                        </th>

                        <th scope="col" class="px-6 py-3 ">
                            Latitude e Longitude
                        </th>

                        <th scope="col" class="px-6 py-3 ">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="branch in branches" :key="branch.id" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ branch.id }}
                        </td>

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ branch.name }}
                        </td>

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ branch.address }}
                        </td>

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ branch.phone }}
                        </td>

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ branch.location.lat }} {{ branch.location.long }}
                        </td>

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            -
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script setup>

    const props = defineProps({ branches: Object });

</script>

<script>
export default {

}
</script>

<style>

</style>