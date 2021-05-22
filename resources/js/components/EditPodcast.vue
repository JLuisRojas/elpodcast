<template>
  <div>
      <div v-if="podcast != null">
        <div class="d-flex context">
            <a href="/creator">{{'Mis Podcasts  >'}}</a>
            <div class="context-title">{{podcast.title}}</div>
        </div>
        <podcast-row 
            :podcast="podcast"
            :secondary="{ onTap: editInfo, title: 'Editar' }"
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
        <div v-else class="d-flex flex-wrap">
            <div class='episode-card' v-for="(episode, index) in episodes" :key="episode.id">
              <creator-episode-card 
                :podcastId="podcastId"
                :episode="episode" 
                :index="episodes.length - index"
              ></creator-episode-card>
            </div>
        </div>
      </div>
  </div>
</template>

<script>
import CreatorEpisodeCard from './CreatorEpisodeCard.vue';
import FillButton from './FillButton.vue';
export default {
  components: { FillButton, CreatorEpisodeCard },
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
    },
    methods: {
        parseUrl() {
            const url = window.location.href; 

            const elements = url.split('/');

            this.podcastId = elements[elements.length - 1];
        },
        async fetchPodcast() {
            const res = await axios.get(`/api/podcasts/${this.podcastId}/episodes`);

            this.podcast = res.data;

            this.episodes = this.podcast.episodes.reverse();
        },
        newEpisode() {
            window.location.href += '/episode';
        },
        editInfo() {
            window.location.href += '/edit';
        }
    },
}
</script>

<style scoped>
  .episode-card {
    width: 25%;
    padding-bottom: 25px;
  }
</style>
