<template>
<div>
  <div v-on:click="goTo()" class="category-card d-flex flex-column">
    <div>
      <img :src="imageUrl" alt="" class="category-image">
    </div>
    <div class="category-title-ed">{{ category.name }}</div>
  </div>
</div>
</template>

<script>
import FillButton from './FillButton.vue';
export default {
  components: { FillButton },
    props: ['category'],
    data: () => {
        return {
            imageUrl: "",
        }
    },
    created() {
        this.loadImage();
    },
    methods: {
        loadImage() {
            this.imageUrl = this.$asset + "storage/" + this.category.image;
        },
        goTo() {
            window.location.href = "/category/" + this.category.id;
        }
    }
}
</script>

<style scoped>
    .category-card {
        width: 100%;
        padding-right: 3em;
    }

    .category-image {
        width: 100%;
    }

    .category-title-ed {
        font-size: 22px;
        font-weight: bold;
    }
</style>
