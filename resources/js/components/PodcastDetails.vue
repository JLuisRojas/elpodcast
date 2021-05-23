<template>
    <div v-if="podcast != null" class="container">
        <div class="d-flex context">
            <!--<a href="/creator">{{'Mis Podcasts  >'}}</a>
            <a :href="'/creator/podcast/' + podcast.id" class="context-item"> {{podcast.title + ' >'}}</a>
            <div class="context-title">Nuevo</div>-->
        </div>
        <div class="row">
            <div class="col-3">
                <img :src="imgPath" alt="" class="img-preview">
                <div>
                    {{ podcast.long_description }}
                </div>

                <div class="pt-3 pod-hosts-label">
                    Anfitriones
                </div>

                <div class="pod-hosts">
                    {{ podcast.hosts }}
                </div>
            </div>
            <div class="col pod">
                <div class="pod-title">
                    {{ podcast.title }}
                </div>

                <div class="d-flex flex-row pt-4">
                    <fill-button>Reproducir Ultimo</fill-button>
                    <div style="width: 20px;"></div>
                    <outline-button>Subscribir</outline-button>
                </div>

                <div class="pod-bar-episodes pt-4 pod-bar-title">
                    {{episodes.length + ' Episodios'}} 
                </div>

                <div v-for="(episode, index) in episodes" :key="episode.id" class="pt-4">
                    <episode-row 
                        :episode="episode"
                        :episodeNum="episodes.length - index"
                        playing="true"
                        :onClick="() => clickEpisode(episode.id)"></episode-row>
                </div>
            </div>
        </div>
    </div> 
</template>

<script>
import {Howl, Howler} from 'howler';
import EpisodeRow from './EpisodeRow.vue';
import FillButton from './FillButton.vue';
import OutlineButton from './OutlineButton.vue';

export default {
    components: {
        FillButton,
        OutlineButton,
        EpisodeRow,
    },
    data: () => {
        return {
            podcastId: null,
            podcast: null,
            episodes: [],
            imgPath: "",
        }
    },
    async created() {
        this.parseUrl();
        await this.loadPodcast();
    },
    methods: {
        parseUrl() {
            const url = window.location.href; 

            const elements = url.split('/');

            this.podcastId = elements[elements.length - 1];
        },
        async loadPodcast() {
            const res = await axios.get(`/api/podcasts/${this.podcastId}/episodes`);

            this.podcast = res.data;
            this.episodes = this.podcast.episodes.reverse();

            this.imgPath = this.$asset + "storage/podcasts/" + this.podcast.image;
        },
        clickEpisode(id) {
            console.log(id);

            for(var episode of this.episodes) {
                if(episode.id == id) {
                    var sound = new Howl({
                      src: [this.$asset + "storage/podcasts/" + episode.audio]
                    });

                    sound.play();
                }
            }
        }
    }
}
</script>

<style scoped>
    ul {
        list-style-type: none;
        text-align: right;
        color: red;
    }

    .img-preview {
        width: 100%;
        padding-bottom: 20px;
    }

    .input-field {
        padding-bottom: 10px;
    }

    .pod {
        padding-left: 10%;
    }

    .pod-title {
        padding-right: 20%;
        font-size: 50px;
    }

    .pod-hosts-label {
        color: gray;
    }

    .pod-hosts{
        font-size: 20px;
    }

    .pod-bar-episodes {
        width: 100%;
        border-bottom: 1px solid lightgray;
    }

    .pod-bar-title {
        font-size: 24px;
    }

    .pod-bar-label {
        color: gray;
        font-size: 18px;
    }
</style>
