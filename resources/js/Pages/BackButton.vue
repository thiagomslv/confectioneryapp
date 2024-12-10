<template>
  <div class="back">

        <ion-icon name="chevron-back-outline"></ion-icon><Link :href="linkToBack"> <span class="back-title">voltar</span></Link>
    </div>
</template>


<script setup>

    const props = defineProps({ linkToBack: String });

</script>

<script>
    import { Link } from '@inertiajs/vue3';

    export default {

        components: {

            Link
        },

    }
</script>

<style scoped>

    .back{

        display: flex;
        align-items: center;
        width: 100px;
        height: 35px;

        font-size: 20px;

        background-color: white;
        border-radius: 0 0 5px 0;

        position: absolute;
        left: 0;
        top: 0;
    }

    a{

        color: black;
        text-decoration: none;
    }

</style>