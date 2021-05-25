<template>
    <div class="container">
        <div class="row justify-content-between pt-2">
            <div class="col section-title" style="max-width: 60%">
                {{ 'Hola, ' +this.$user.name }}
            </div>
        </div>

        <div class="row justify-content-between pt-4">
            <div class="col section-subtitle" style="max-width: 60%">
                Popular
            </div>
        </div>

        <div class="d-flex flex-wrap py-4">
            <div class='category-card' v-for="(p, index) in popular" :key="index">
                <popular-card :data="p"></popular-card>
            </div>
        </div>

        <div class="row justify-content-between pt-2">
            <div class="col section-subtitle" style="max-width: 60%">
                Recomendado
            </div>
        </div>

        <div class="d-flex flex-wrap py-4">
            <div class='category-card' v-for="pod in podsRecommended" :key="pod.id">
                <podcast-card :podcast="pod"></podcast-card>
            </div>
        </div>

        <div class="row justify-content-between pt-2">
            <div class="col section-subtitle" style="max-width: 60%">
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
import PodcastCard from './PodcastCard.vue';
import PopularCard from './PopularCard.vue';

export default {
    components: {
        CategoryCard,
        PodcastCard,
        PopularCard,  
    },
    data: () => {
        return {
            podsRecommended: [],
            categories: [],
            popular: [
                {
                    id: 5,
                    title: "Plague",
                    description: "John Green reviews historical outbreaks of bubonic and pneumonic plague.",
                    image: "p_01.jpeg",
                },
                {
                    id: 5,
                    title: "Monopoly and Academic Decathlon",
                    description: "John Green reviews the board game Monopoly and Academic Decathlon.",
                    image: "p_02.jpeg",
                },
                {
                    id: 5,
                    title: "Seventeen Listener Suggestions, Reviewed",
                    description: "John Green reviews seventeen topics suggested by listeners.",
                    image: "p_03.jpeg",
                },
                {
                    id: 5,
                    title: "The Anthropocene Reviewed, Reviewed",
                    description: "John Green reviews the podcast The Anthropocene Reviewed.",
                    image: "p_04.jpeg",
                },
            ]
        }
    },
    created() {
        this.loadCategories();
        this.loadRecommended();
    },
    methods: {
        loadCategories() {
            axios.get('/api/podcasts/categories').then((r) => {
                const data = r.data;

                this.categories = data;
            });
        },
        loadRecommended() {
            axios.get('/api/podcasts/recommended').then((r) => {
                const data = r.data;

                this.podsRecommended = data;
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
