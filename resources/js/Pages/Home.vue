<template>

    <Head title="Sistema de cadastro de confeitarias" />

    <div class="cards-box">

        <CardBox title="Cadastro de Filiais" iconType="add-outline" linkRedirect="/branches/create"/>
        <CardBox title="Controle de Estoque" iconType="cube-outline" linkRedirect="/branches/stock"/>
        <CardBox title="Listar Filiais" iconType="business-outline" linkRedirect="/branches"/>
        <CardBox title="Mapa de Filiais" iconType="earth-outline" linkRedirect="/"/>
    </div>

</template>

<script>

    import CardBox from './CardBox.vue'

    export default {

        name: 'Home',

        components: {
            CardBox
        }
    }

</script>

<style>

    body{

        font-family: 'Montserrat', sans-serif;

        margin: 0;
        padding: 0;
        background: sandybrown;
    }

    .cards-box{

        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

</style>