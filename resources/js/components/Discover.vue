<template>
    <div class="container">

        <search-bar></search-bar>


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
import SearchBar from './SearchBar.vue';

export default {
    components: {
        FillButton,
        OutlineButton,
        PodcastRow,
        CategoryCard,
        SearchBar,
    },
    data: () => {
        return {
            categories: [],
        }
    },
    created() {
        this.loadCategories();
    },
    methods: {
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
