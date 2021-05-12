<template>
    <div class="container">
        <div class="row">
            <div class="col-3">
                    <img :src="imgPath" alt="" class="img-preview">
                <div class="d-flex flex-row-reverse">
                    <outline-button
                        :onClick="selectFile"
                    >{{ hasImg ? 'Cambiar' : 'Seleccionar' }}</outline-button>

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
                    hint="El titulo del Podcast"
                    max=50
                    class="input-field"
                ></text-input>

                <text-input 
                    v-model="hosts"
                    title="Anfitriones del Podcast" 
                    name="hosts"
                    hint="Los anfitriones del Podcast"
                    max=100
                    class="input-field"
                ></text-input>

                <text-input 
                    v-model="longDescription"
                    title="Descripción larga del Podcast" 
                    name="descriptionLong"
                    hint="La descripción larga del podcast"
                    class="input-field"
                    max=150
                    isArea="true"
                    minHeight="150px"
                ></text-input>

                <text-input 
                    v-model="shortDescription"
                    title="Descripción corta del Podcast" 
                    name="descriptionShort"
                    hint="La descripción corta del podcast"
                    class="input-field"
                    isArea="true"
                    max=300
                    minHeight="150px"
                ></text-input>  


                <select-input 
                    v-model="selected"
                    title="Selecciona la categoría del Podcast"
                    :options="options"
                ></select-input>

                <p v-if="errors.length">
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
import OutlineButton from './OutlineButton.vue';
import SelectInput from './SelectInput.vue';
import TextInput from './TextInput.vue';

export default {
    components: {
        TextInput,
        FillButton,
        OutlineButton,
        SelectInput,
    },
    data: () => {
        return {
            imgPath: "",
            hosts: "",
            title: "",
            longDescription: "",
            shortDescription: "",
            selected: 1,
            options: [
                {
                    text: "Tecnologia",
                    value: 1,
                },
                {
                    text: "Filosofia",
                    value: 2,
                }
            ],
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
            console.log(this.selected);
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
