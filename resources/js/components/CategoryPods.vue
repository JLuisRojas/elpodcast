<template>
    <div v-if="category != null && pods != null" class="container">
        <div class="row justify-content-between">
            <div class="col section-title" style="max-width: 60%">
                {{ category.name }}
            </div>
        </div>
        <div v-if="pods != null && pods.length === 0">
            <div class="row justify-content-center py-3">
                <div class="text-center">
                    No hay ningun podcast de esta categoria.
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

export default {
    components: {
        FillButton,
        OutlineButton,
        PodcastRow,
    },
    data: () => {
        return {
            category_id: "",
            category: null,
            pods: null, 
        }
    },
    async created() {
        this.parseUrl();
        await this.loadCat();
        await this.loadPods();
    },
    methods: {
        parseUrl() {
            const url = window.location.href; 

            const elements = url.split('/');

            this.category_id = elements[elements.length - 1];
            console.log(this.category_id)
        },
        async loadCat() {
            const res = await axios.get(`/api/podcasts/categories/${this.category_id}`);

            console.log(res);

            this.category = res.data;
        },
        async loadPods() {
            const res = await axios.get(`/api/podcasts/categories/${this.category_id}/pods`);

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
