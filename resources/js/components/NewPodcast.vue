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

                <div v-if="errorsForm.length" 
                    class="d-flex align-items-end flex-column">
                    <b>Favor de corregir los siguientes errores:</b>
                    <ul>
                      <li v-for="e in errorsForm" :key="e.message"
                        >{{ e.message }}</li>
                    </ul>
                </div>

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
            options: [],
            hasImg: false,
            errorsForm: [],
            file: null,
        }
    },
    created() {
        this.loadImg();
        this.loadCategories();
    },
    methods: {
        loadImg() {
            this.imgPath = this.$asset + "/no-image.png";
        },
        loadCategories() {
            axios.get('/api/podcasts/categories').then((r) => {
                const data = r.data;

                let categoriesData = [];

                for(var category of data) {
                    categoriesData.push({
                        text: category.name,
                        value: category.id,
                    });
                }

                this.options = categoriesData;

                this.selected = this.options[0].value;
            });
        },
        selectFile() {
            $('#file-input').trigger('click');
        },
        onFileChange(e) {
            if(e.target.files && e.target.files[0]) {
                this.file = e.target.files[0];
                this.imgPath = URL.createObjectURL(this.file);

                this.hasImg = true;
            }
        },
        submit() {
            let newErrors = [];

            if(this.title == "")
                newErrors.push({
                    message: "Falta el titulo del podcast",
                });

            if(this.hosts == "")
                newErrors.push({
                    message: "Falta los anfitriones del podcast",
                });

            if(this.longDescription == "")
                newErrors.push({
                    message: "Falta la descripción larga del podcast",
                });

            if(this.shortDescription == "")
                newErrors.push({
                    message: "Falta la descripción corta del podcast",
                });

            if(this.file == null)
                newErrors.push({
                    message: "Falta seleccionar la imagen del podcast"
                });

            this.errorsForm = newErrors;

            console.log(this.title);
            console.log(this.hosts);
            console.log(this.longDescription);
            console.log(this.shortDescription);
            console.log(this.selected);

            if(this.errorsForm.length == 0) {
                let formData = new FormData();

                formData.append('file', this.file);
                formData.append('title', this.title);
                formData.append('hosts', this.hosts);
                formData.append('shortDescription', this.shortDescription);
                formData.append('longDescription', this.longDescription);
                formData.append('category', this.selected);
                formData.append('user', this.$user.id);

                axios.post(
                    `/api/creator/${this.$user.id}/podcast`,
                    formData, {
                        headers: {
                          'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function () {
                    console.log('SUCCESS!!');
                    window.location.href = "/creator";
                })
                .catch(function (e) {
                    console.log('FAILURE!!');
                    console.log(e.response);
                    console.log(e.request);
                    console.log(e.message);
                });
            }
        },
    }
}
</script>

<style scoped>
    ul {
        list-style-type: none;
        text-align: right;
        color: red;
    }

    .img-preview {
        width: 100%;
        padding-bottom: 20px;
    }

    .input-field {
        padding-bottom: 10px;
    }

</style>
