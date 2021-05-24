<template>
    <div  class="input-group">
      <input 
        v-on:keyup.enter="search"
        v-model="query"
        id="searchInput"
        type="search" 
        class="form-control rounded" 
        placeholder="Search"
        aria-label="Search"
        aria-describedby="search-addon" />
      <outline-button :onClick="search">Buscar</outline-button>
    </div>
</template>

<script>
import OutlineButton from './OutlineButton.vue';

export default {
    components: {
        OutlineButton,
    },
    data: () => {
        return {
            query: "",
        }
    },
    created() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        this.query = urlParams.get('q') ?? "";
    },
    methods: {
        search() {
            if(this.query == "")
                return;

            const param = this.query.replaceAll(' ', '+')

            window.location.href = "/search?q=" + param;
        },
    },
}
</script>

<style>

</style>
