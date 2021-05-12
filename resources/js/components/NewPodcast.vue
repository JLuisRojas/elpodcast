<template>
    <div class="container">
        <div class="row">
            <div class="col-3">
                    <img :src="imgPath" alt="" class="img-preview">
                <div class="d-flex flex-row-reverse">
                    <fill-button
                        :onClick="selectFile"
                    >{{ hasImg ? 'Cambiar' : 'Seleccionar' }}</fill-button>

                    <input 
                        id="file-input" 
                        type="file" 
                        name="name" 
                        style="display: none;" 
                        @change="onFileChange"
                    />
                </div>
            </div>
            <div class="col-9">
                <text-input 
                    v-model="title"
                    title="Titulo de Podcast" 
                    name="title"
                    hint="El titulo de tu Podcast"
                    max=30
                    class="input-field"
                ></text-input>

                <text-input 
                    v-model="longDescription"
                    title="Descripción larga de tu Podcast" 
                    name="descriptionLong"
                    hint="La descripción larga de tu podcast"
                    class="input-field"
                    max=150
                    isArea="true"
                    minHeight="150px"
                ></text-input>

                <text-input 
                    v-model="shortDescription"
                    title="Descripción corta de tu Podcast" 
                    name="descriptionShort"
                    hint="La descripción corta de tu podcast"
                    class="input-field"
                    isArea="true"
                    max=300
                    minHeight="150px"
                ></text-input>  <p v-if="errors.length">

                <b>Please correct the following error(s):</b>
                <ul>
                  <li :v-for="error in errors">{{ error }}</li>
                </ul>
  </p>

                <div class="d-flex flex-row-reverse">
                    <fill-button :onClick="submit">Crear Podcast</fill-button>
                </div>
            </div>
        </div>
    </div> 
</template>

<script>
import FillButton from './FillButton.vue';
import TextInput from './TextInput.vue';

export default {
    components: {
        TextInput,
        FillButton,
    },
    data: () => {
        return {
            imgPath: "",
            title: "",
            longDescription: "",
            shortDescription: "",
            hasImg: false,
            errors: [],
        }
    },
    created() {
        this.loadImg();
    },
    methods: {
        loadImg() {
            this.imgPath = this.$asset + "/no-image.png";
        },
        selectFile() {
            $('#file-input').trigger('click');
        },
        onFileChange(e) {
            if(e.target.files && e.target.files[0]) {
                const file = e.target.files[0];
                this.imgPath = URL.createObjectURL(file);

                this.hasImg = true;
            }
        },
        submit() {
            console.log("Hola");
            console.log(this.title);
            console.log(this.longDescription);
            console.log(this.shortDescription);
        },
    }
}
</script>

<style scoped>
    .img-preview {
        max-width: 100%;
        padding-bottom: 20px;
    }

    .input-field {
        padding-bottom: 10px;
    }

</style>
