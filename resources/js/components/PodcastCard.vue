<template>
<div>
  <div v-on:click="viewPod" class="pod-card d-flex flex-column">
    <div>
      <img :src="imageUrl" alt="" class="pod-image">
    </div>
    <div class="pod-title-ed pt-2">{{ podcast.title }}</div>
    <div class="pod-des">{{ podcast.short_description }}</div>
    <!--<outline-button :onClick="viewPod" class="btn-eps">Ver</outline-button>-->
  </div>
</div>
</template>

<script>
import FillButton from './FillButton.vue';
import OutlineButton from './OutlineButton.vue';
export default {
  components: { FillButton, OutlineButton },
    props: ['podcast',],
    data: () => {
        return {
            imageUrl: "",
        }
    },
    created() {
        console.log(this.podcast);
        this.loadImage();
    },
    methods: {
        loadImage() {
            this.imageUrl = this.$asset + "storage/podcasts/" + this.podcast.image;
        },
        viewPod() {
          window.location.href = '/podcast/' + this.podcast.id;
        },
    }
}
</script>

<style scoped>
    .pod-card {
        padding-right: 3em;
    }

    .pod-image {
        width: 100%;
    }

    .pod-num {
        color: grey;
        font-size: 14px;
    }

    .pod-des {
        font-size: 16px;
    }

    .pod-title-ed {
        font-size: 22px;
        font-weight: bold;
    }
    
    .btn-eps {
        width: 40%;
    }

    .btn-eps-del {
        background-color: #FC7272;
    }

</style>
