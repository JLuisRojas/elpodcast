<template>
<div class="container">
    <div class="first-feature row">
        <div class="col-8">
            <div class="row feature-title " style="">
                Los mejores Podcasts de los mejores creadores
            </div>
            <div class="row feature-des">
                Descubre la gran variedad de contenidos a tu disponibilidad y escucha las mejores ideas de las mejores pesonas.
            </div>
        </div>
        <div class="col">
            <img src="https://simplecast.com/assets/images/hero/lady-2x.png"
             class="feature-image">
        </div>
    </div>
    <div class="feature-sep">
        <div class="row">
            <div class="col-4">
                <img src="https://simplecast.com/assets/images/hero/mic.png"
                 class="feature-image">
            </div>
            <div class="feature-left col">
                <div class="row feature-title" style="max-width: 100%;">
                    Las mejores herramientas para creadores de contenido
                </div>
                <div class="row feature-des" style="max-width: 100%;">
                    Convertirse en creador es totalmente gratis y podras compartir tus ideas con miles de personas.
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center feature-sep">
        <div class="feature-title text-center" style="max-width: 60%">
            Inicia sesion y encuentra las grandes sorpresas que los podcasts tienen para ti.
        </div>
    </div>
    <div class="row justify-content-center py-5">
        <fill-button :onClick="createAccount">Inicar Sesion</fill-button>
    </div>
</div>
</template>

<script>
import FillButton from './FillButton.vue'
export default {
  components: { FillButton },
  methods: {
    createAccount() {
        window.location.href = "/login";
    }
  }

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
