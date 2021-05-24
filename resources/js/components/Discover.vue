<template>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col search-title" style="max-width: 60%">
                Buscar
            </div>
        </div>

        <div class="input-group">
          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
            aria-describedby="search-addon" />
          <outline-button :onClick="search">Buscar</outline-button>
        </div>

        <div class="row justify-content-between pt-4">
            <div class="col section-title" style="max-width: 60%">
                Categorías
            </div>
        </div>

        <div class="d-flex flex-wrap py-4">
            <div class='category-card' v-for="category in categories" :key="category.id">
                <category-card :category="category"></category-card>
            </div>
        </div>
    </div>
</template>

<script>
import CategoryCard from './CategoryCard.vue';
import FillButton from "./FillButton"
import OutlineButton from './OutlineButton.vue';
import PodcastRow from './PodcastRow.vue';

export default {
    components: {
        FillButton,
        OutlineButton,
        PodcastRow,
        CategoryCard,
    },
    data: () => {
        return {
            categories: []
        }
    },
    created() {
        this.loadCategories();
    },
    methods: {
        search() {

        },
        loadCategories() {
            axios.get('/api/podcasts/categories').then((r) => {
                const data = r.data;

                this.categories = data;
            });
        },
    }
}
</script>

<style>
    .search-title {
        font-size: 20px; 
    }

    .category-card {
        width: 25%;
        padding-bottom: 25px;
    }
</style>
