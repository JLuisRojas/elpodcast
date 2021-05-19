<template>
  <div>
      <div v-if="podcast != null">
        <div class="d-flex context">
            <a href="/creator">{{'Mis Podcasts  >'}}</a>
            <div class="context-title">{{podcast.title}}</div>
        </div>
        <podcast-row 
            :podcast="podcast"
            :secondary="{ onTap: () => hola(podcast.id), title: 'Editar' }"
        ></podcast-row>

        <div class="row justify-content-between py-3">
            <div class="col section-title" style="max-width: 60%">
                Episodios
            </div>
            <div class="col-auto">
                <div v-if="episodes != null && episodes.length !== 0">
                    <fill-button :onClick="newEpisode">Nuevo</fill-button>
                </div>
            </div>
        </div>

        <div v-if="episodes != null && episodes.length === 0">
            <div class="row justify-content-center py-3">
                <div class="text-center">
                    No tienes episodios, crea uno para empezar a compartir tus ideas.
                </div>
            </div>
            <div class="row justify-content-center py-2">
                <fill-button :onClick="newEpisode">Nuevo Episodio</fill-button>
            </div>
        </div>
        <div v-else>
            pods
        </div>
      </div>
  </div>
</template>

<script>
import FillButton from './FillButton.vue';
export default {
  components: { FillButton },
    data: () => {
        return {
            podcastId: null,
            podcast: null,
            episodes: null,
        };
    },
    async created() {
        this.parseUrl();

        await this.fetchPodcast();
        this.fetchEpisodes();
    },
    methods: {
        parseUrl() {
            const url = window.location.href; 

            const elements = url.split('/');

            this.podcastId = elements[elements.length - 1];
        },
        async fetchPodcast() {
            const res = await axios.get(`/api/podcasts/${this.podcastId}`);

            this.podcast = res.data;

            console.log(this.podcast);
        },
        fetchEpisodes() {
            this.episodes = [];
        },
        newEpisode() {
            window.location.href += '/episode';
        },
    },
}
</script>

<style scoped>
</style>
