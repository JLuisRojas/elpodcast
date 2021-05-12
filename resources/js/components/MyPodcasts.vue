<template>
    <div class="container">
        <div class="row">
            <div class="section-title" style="max-width: 60%">
                Mis Podcasts
            </div>
        </div>
        <div class="row justify-content-center py-3">
            <div class="text-center">
                No tienes Podcasts, crea uno para empezar a compartir tus ideas.
            </div>
        </div>
        <div class="row justify-content-center py-2">
            <fill-button :onClick="newPodcast">Crear Podcast</fill-button>
        </div>
    </div>
</template>

<script>
import FillButton from "./FillButton"

export default {
    components: {
        FillButton,
    },
    methods: {
        newPodcast() {
            window.location.href = "/creator/newPodcast";
        },
    }
}
</script>

<style>

</style>
