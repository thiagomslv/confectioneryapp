<template>

    <Link :href="linkRedirect">

        <div class="card-cnt">
            
            <div class="inside-card">
                <ion-icon :name="iconType"></ion-icon>
                <span class="card-title">{{ title }}</span>
            </div>
        </div>

    </Link>
</template>

<script>

import { Link } from '@inertiajs/vue3';

export default {

    components: {

        Link
    },

    props: {

        title: String,
        iconType: String,
        linkRedirect: String
    }
}
</script>

<style scoped>

    a{

        text-decoration: none;
        color: black;
    }

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