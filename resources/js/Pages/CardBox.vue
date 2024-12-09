<template>

    <div class="card-cnt">

        <div class="inside-card">
            <ion-icon :name="iconType"></ion-icon>
            <span class="card-title">{{ title }}</span>
        </div>
        

    </div>
</template>

<script>
export default {

    props: {

        title: String,
        iconType: String
    }
}
</script>

<style scoped>

    .card-cnt{

        width: 230px;
        height: 230px;
        background: #fff;

        display: flex;
        justify-content: center;
        align-items: center;

        box-shadow: 0px 0px 20px gray;
        transition: transform .5s;
    }

    .card-cnt:hover{
        cursor: pointer;        
        transform: scale(1.05);
    }

    .inside-card{

        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        
    }

    .card-title{

        font-size: 20px;
    }

    ion-icon{
        font-size:34px;
    }
</style>