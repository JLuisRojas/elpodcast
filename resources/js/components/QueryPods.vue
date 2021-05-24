<template>
    <div class="container">
        <search-bar></search-bar>
        <div class="row justify-content-between">
            <div class="col section-title" style="max-width: 60%">
                {{ 'Resultados de "' + query + '"'}}
            </div>
        </div>
        <div v-if="pods != null && pods.length === 0">
            <div class="row justify-content-center py-3">
                <div class="text-center">
                    No se encontro ningun podcast
                </div>
            </div>
            <div class="row justify-content-center py-2">
                <fill-button :onClick="bescubrir">Descubrir</fill-button>
            </div>
        </div>
        <div v-else>
            <div v-for="pod in pods" v-bind:key="pod.id" class="pods">
                <podcast-row 
                    :podcast="pod"
                    :primary="{ onTap: () => goto(pod.id), title: 'Ir a Podcast' }"
                ></podcast-row>
            </div>
        </div>
    </div>
</template>

<script>
import FillButton from "./FillButton"
import OutlineButton from './OutlineButton.vue';
import PodcastRow from './PodcastRow.vue';
import SearchBar from './SearchBar.vue';

export default {
    components: {
        FillButton,
        OutlineButton,
        PodcastRow,
        SearchBar,
    },
    data: () => {
        return {
            pods: null, 
            query: "",
        }
    },
    async created() {
        this.parseUrl();
        await this.loadPods();
    },
    methods: {
        parseUrl() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);

            this.query = urlParams.get('q')

            console.log(urlParams);
            console.log(this.query);

        },
        async loadPods() {
            let formData = new FormData();

            formData.append('search', this.query);

            const res = await axios.post(`/api/podcasts/search`, formData, {
                headers: {
                  'Content-Type': 'multipart/form-data'
                }
            });

            console.log(res);

            this.pods = res.data;
        },
        bescubrir() {
            window.location.href = "/discover";
        },
        goto(id) {
            console.log(id);
            window.location.href = "/podcast/" + id;
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
