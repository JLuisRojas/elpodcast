<template>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col section-title" style="max-width: 60%">
                Subscripciones
            </div>
        </div>
        <div v-if="subs != null && subs.length === 0">
            <div class="row justify-content-center py-3">
                <div class="text-center">
                    No estas subscrito a ningun podcast.
                </div>
            </div>
            <div class="row justify-content-center py-2">
                <fill-button :onClick="bescubrir">Descubrir</fill-button>
            </div>
        </div>
        <div v-else>
            <div v-for="sub in subs" v-bind:key="sub.podcast_id" class="pods">
                <podcast-row 
                    :podcast="sub.podcast"
                    :primary="{ onTap: () => hola(podcast.id), title: 'Ir a Podcast' }"
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
            subs: null, 
        }
    },
    async created() {
        await this.loadSubs();
    },
    methods: {
        async loadSubs() {
            const res = await axios.get(`/api/subscriptions/${this.$user.id}`);

            console.log(res);

            this.subs = res.data;
        },
        bescubrir() {
            window.location.href = "/";
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
