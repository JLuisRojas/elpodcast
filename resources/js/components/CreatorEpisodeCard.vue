<template>
<div>
  <div :id="episode.id + '-modal'" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">¿Seguro que deseas borrar el episodio?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Una vez borrado el episodio los usuarios ya no podran ver ni escuchar el episodio.</p>
        </div>
        <div class="modal-footer">
          <fill-button :onClick="deleteEpisode" class="btn-eps btn-eps-del">Borrar</fill-button>
        </div>
      </div>
    </div>
  </div>

  <div class="creator-episode-card d-flex flex-column">
    <div>
      <img :src="imageUrl" alt="" class="episode-image">
    </div>
    <div class="episode-num pt-3">{{ "Episodio " + index }}</div>
    <div class="episode-title-ed">{{ episode.title }}</div>
    <div class="episode-des">{{ episode.description }}</div>
    <div class="episode-num">{{ date_str }}</div>
    <div class="flex flex-row pt-2">
      <fill-button :onClick="editEpisode" class="btn-eps">Editar</fill-button>
      <fill-button :onClick="deleteEpisodeModal" class="btn-eps btn-eps-del">Borrar</fill-button>
    </div>
  </div>
</div>
</template>

<script>
import FillButton from './FillButton.vue';
export default {
  components: { FillButton },
    props: ['podcastId', 'episode', 'index'],
    data: () => {
        return {
            imageUrl: "",
            date_str: undefined,
        }
    },
    created() {
        const date = new Date(this.episode.publish_date);

        var options = { year: 'numeric', month: 'long', day: 'numeric' };

        this.date_str = date.toLocaleString("en-US", options);

        this.loadImage();
    },
    methods: {
        loadImage() {
            this.imageUrl = this.$asset + "storage/podcasts/" + this.episode.image;
        },
        editEpisode() {
          window.location.href += '/episode/' + this.episode.id;
        },
        deleteEpisodeModal() {
            $('#' + this.episode.id + "-modal").modal('show')
        },
        async deleteEpisode() {
            $('#' + this.episode.id + "-modal").modal('hide')
            const res = await axios.delete(`/api/podcasts/${this.podcastId}/episodes/${this.episode.id}`);

            console.log(res);

            console.log("Delting episode")
            window.location.reload(); 
        }
    }
}
</script>

<style scoped>
    .creator-episode-card {
        padding-right: 3em;
    }

    .episode-image {
        width: 100%;
    }

    .episode-num {
        color: grey;
        font-size: 14px;
    }

    .episode-des {
        font-size: 16px;
    }

    .episode-title-ed {
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
