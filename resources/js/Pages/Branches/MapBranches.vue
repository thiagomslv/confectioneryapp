<template>

    <Head title="Mapa de filiais" />

    <BackButton linkToBack="/"/>

    <div class="mt-10 ">

        <div id="map"></div>
    </div>

</template>

<script setup>

    import { onMounted } from 'vue'
    const props = defineProps({ branches: Array });

    var map, markers = [];

    function initMap() {

        map = L.map('map', {
            center: {
                lat: -7.1193416,
                lng: -34.824759,
            },
            zoom: 12
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);
    }

    function generateMarker(data, index) {

    return L.marker(data.position, {
            draggable: data.draggable
        })
    }

    onMounted(() => {

        initMap();

        //Gera os marcadores e os insere no mapa.
        props.branches.forEach(branch => {

            const data = {
                position: { lat: branch.location.lat, lng: branch.location.long },
                draggable: false
            }

            const marker = generateMarker(data, markers.length - 1);
            marker.addTo(map).bindPopup(`<b>Nome da filial: </b> ${branch.name}<br> 
                                         <b>Endereço: </b> ${branch.address}<br>
                                         <b>Telefone: </b> ${branch.phone}<br>
                                         <b>Latitude e Longitude: </b> ${branch.location.lat} ${branch.location.long}<br>`);
            markers.push(marker);
        })
    });
    
</script>

<script>
export default {

}
</script>

<style>

#map {
    width: '100%';
    height: 88vh;
    margin-top: 15px;
}

</style>