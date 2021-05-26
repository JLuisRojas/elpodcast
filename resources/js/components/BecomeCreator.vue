<template>
<div class="container">
    <div class="first-feature row">
        <div class="col-8">
            <div class="row feature-title " style="">
                Conviertete en un creador y comparte tus ideas.
            </div>
            <div class="row feature-des">
                Construye una audiencia a la cual le importe tu trabajo
            </div>

            <div class="row py-5">
                <fill-button :onClick="becomeCreator">Ser creador</fill-button>
            </div>
        </div>
        <div class="col">
            <img src="https://simplecast.com/assets/images/features/build.png"
             class="feature-image">
        </div>
    </div>
</div>
</template>

<script>
import FillButton from "./FillButton"

export default {
    components: {
        FillButton,
    },
    methods: {
        becomeCreator() {
            axios.post(
                `api/creator/${this.$user.id}`, 
                {}
            ).then((d) => {
                console.log(d);

                window.location.reload();
            }).catch(e => {
                console.log(e);
                console.log(e.request);
            });
        },
    },

}
</script>

<style scoped>
.first-feature {
    padding-top: 2em;
}

.feature-left {
    padding-left: 10em;
    text-align: right;
}

.feature-sep {
    padding-top: 10em;
}

.feature-image {
    width: 100%;
}

.feature-title {
    max-width: 80%;
    font-size: 46px;
}

.feature-des {
    max-width: 80%;
    color: grey;
    font-size: 32px;
}
</style>
