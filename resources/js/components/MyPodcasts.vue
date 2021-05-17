<template>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col section-title" style="max-width: 60%">
                Mis Podcasts
            </div>
            <div class="col-auto">
                <div v-if="podcasts != null && podcasts.length !== 0">
                    <outline-button :onClick="newPodcast">Nuevo</outline-button>
                </div>
            </div>
        </div>
        <div v-if="podcasts != null && podcasts.length === 0">
            <div class="row justify-content-center py-3">
                <div class="text-center">
                    No tienes Podcasts, crea uno para empezar a compartir tus ideas.
                </div>
            </div>
            <div class="row justify-content-center py-2">
                <fill-button :onClick="newPodcast">Crear Podcast</fill-button>
            </div>
        </div>
        <div v-else>
            <div v-for="podcast in podcasts" v-bind:key="podcast.id" class="pods">
                <podcast-row 
                    :podcast="podcast"
                    :primary="{ onTap: () => goEdit(podcast.id), title: 'Editar' }"
                    :secondary="{ onTap: () => hola(podcast.id), title: 'Ir a Podcast' }"
                ></podcast-row>
            </div>
        </div>
    </div>
</template>

<script>
import FillButton from "./FillButton"
import OutlineButton from './OutlineButton.vue';
import PodcastRow from './PodcastRow.vue';

export default {
    components: {
        FillButton,
        OutlineButton,
        PodcastRow,
    },
    data: () => {
        return {
            podcasts: null, 
        }
    },
    async created() {
        await this.loadPodcasts();
    },
    methods: {
        async loadPodcasts() {
            const res = await axios.get(`/api/creator/${this.$user.id}/podcast`);

            this.podcasts = res.data;
        },
        newPodcast() {
            window.location.href = "/creator/newPodcast";
        },
        hola(id) {
            console.log(id);
        },
        goEdit(id) {
            window.location.href = `/creator/podcast/${id}`;
        },
    }
}
</script>

<style>
    .pods {
        padding-top: 30px;
    }
</style>
