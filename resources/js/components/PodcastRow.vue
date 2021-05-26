<template>
    <div class="row justify-content-between border-bottom">
        <div class="col">
            <div class="row">
                <div class="col-2 ">
                    <img :src="imgPath" alt="" class="img-preview">
                </div>
                <div class="col-10 pb-4" style="">
                    <div class="pod-hosts">
                        {{ podcast.hosts }}
                    </div>
                    <div class="pod-title">
                        {{ podcast.title }}
                    </div>
                    <div class="pod-des">
                        {{ podcast.short_description }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div 
                class="pod-ops d-flex flex-row align-items-end" 
                style="height: 100%;"
            >
                <div v-if="primary" class="pod-op">
                    <fill-button :onClick="primary.onTap">
                        {{ primary.title }}
                    </fill-button>
                </div>
                <div v-if="secondary" class="pod-op">
                    <outline-button :onClick="secondary.onTap">
                        {{ secondary.title }}
                    </outline-button>
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
    props: ['podcast', 'primary', 'secondary'],
    data: () => {
        return {
            imgPath: "",
        }
    },
    created() {
        this.imgPath = this.$asset + "storage/podcasts/" + this.podcast.image;
    },
}
</script>

<style>
    .img-preview {
        max-width: 100%;
        padding-bottom: 20px;
    }

    .pod-op {
        padding-left: 10px;
    }

    .pod-ops {
        padding-bottom: 20px;
    }

    .pod-hosts {
        font-weight: 200;
        font-size: 22px;
    }

    .pod-title {
        font-size: 30px;
        font-weight: 500;
    }

    .pod-des {
        color: grey;
        font-size: 20px;
    }
</style>
