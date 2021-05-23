<template>
    <div class="row justify-content-between border-bottom">
        <div class="col">
            <div class="row">
                <div class="col-3">
                    <img :src="imgPath" alt="" class="img-preview">
                </div>
                <div class="col-9">
                    <div class="ep-hosts">
                        {{ 'Episodio ' + episodeNum }}
                    </div>
                    <div class="ep-title">
                        {{ episode.title }}
                    </div>
                    <div class="ep-des">
                        {{ episode.description }}
                    </div>

                    <div class="d-flex flex-row align-items-center pt-2 pb-4">
                        <fill-button v-if="playing" :onClick="onClick">
                           Reproducir 
                        </fill-button>
                        <outline-button v-else :onClick="onClick">
                            Detener
                        </outline-button>
                        <div class="pl-3 ep-date">
                            {{ date_str }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FillButton from './FillButton.vue';
import OutlineButton from './OutlineButton.vue';

export default {
  components: { FillButton, OutlineButton },
    props: ['episode', 'episodeNum', 'playing', 'onClick'],
    data: () => {
        return {
            imgPath: "",
            date_str: "",
        }
    },
    created() {
        const date = new Date(this.episode.publish_date);

        var options = { year: 'numeric', month: 'long', day: 'numeric' };

        this.date_str = date.toLocaleString("en-US", options);

        this.imgPath = this.$asset + "storage/podcasts/" + this.episode.image;
    },
    methods: {
        play() {

        },
    },
}
</script>

<style>
    .img-preview {
        max-width: 100%;
        padding-bottom: 20px;
    }

    .ep-op {
        padding-left: 10px;
    }

    .ep-ops {
        padding-bottom: 20px;
    }

    .ep-hosts {
        font-weight: 200;
        font-size: 14px;
    }

    .ep-title {
        font-size: 24px;
        font-weight: 500;
    }

    .ep-des {
        color: grey;
        font-size: 16px;
    }

    .ep-date {
        color: grey;
    }
</style>
