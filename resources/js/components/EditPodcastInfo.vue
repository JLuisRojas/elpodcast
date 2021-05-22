<template>
    <div v-if="podcast != null" class="container">
        <div class="row">
            <div class="col-3">
                    <img :src="imgPath" alt="" class="img-preview">
                <div class="d-flex flex-row-reverse">
                    <outline-button
                        :onClick="selectFile"
                    >Cambiar</outline-button>

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


                <div class="title-text">Selecciona la categoría del Podcast</div>
                <select 
                    v-model="selected"
                    class="select-input"
                >
                    <option 
                        v-for="option in options" 
                        v-bind:value="option.value"
                        :key="option.value"
                    >
                        {{ option.text }}
                    </option>
                </select>

                <div v-if="errorsForm.length" 
                    class="d-flex align-items-end flex-column">
                    <b>Favor de corregir los siguientes errores:</b>
                    <ul>
                      <li v-for="e in errorsForm" :key="e.message"
                        >{{ e.message }}</li>
                    </ul>
                </div>

                <div class="d-flex flex-row-reverse">
                    <fill-button :onClick="submit">Actualizar Podcast</fill-button>
                </div>
            </div>
        </div>
    </div> 
</template>

<script>
import FillButton from './FillButton.vue';
import OutlineButton from './OutlineButton.vue';
import TextInput from './TextInput.vue';

export default {
    components: {
        TextInput,
        FillButton,
        OutlineButton,
    },
    data: () => {
        return {
            podcastId: null,
            podcast: null,
            imgPath: "",
            hosts: "",
            title: "",
            longDescription: "",
            shortDescription: "",
            selected: null,
            options: [],
            hasImg: false,
            errorsForm: [],
            file: null,
        }
    },
    async created() {
        this.parseUrl();
        await this.loadPodcast();
        this.loadCategories();
    },
    methods: {
        parseUrl() {
            const url = window.location.href; 

            const elements = url.split('/');

            this.podcastId = elements[elements.length - 2];
        },
        async loadPodcast() {
            console.log(this.podcastId);
            const res = await axios.get(`/api/podcasts/${this.podcastId}`);

            this.podcast = res.data;

            this.imgPath = this.$asset + "storage/podcasts/" + this.podcast.image;

            console.log(this.podcast);
            this.title = this.podcast.title;
            this.hosts = this.podcast.hosts;
            this.longDescription = this.podcast.long_description;
            this.shortDescription = this.podcast.short_description;

            console.log(this.longDescription);
            console.log(this.shortDescription);
        },
        loadCategories() {
            axios.get('/api/podcasts/categories').then((r) => {
                const data = r.data;

                let categoriesData = [];

                for(var category of data) {
                    const value = {
                        text: category.name,
                        value: category.id,
                    };

                    categoriesData.push(value);

                    if(category.id == this.podcast.category_id)
                        this.selected = value.value;
                }

                this.options = categoriesData;
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

                const podcastId = this.podcastId;

                axios.post(
                    `/api/creator/${this.$user.id}/podcast/${this.podcastId}`,
                    formData, {
                        headers: {
                          'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function (res) {
                    console.log('SUCCESS!!');
                    console.log(res);

                    window.location.href = "/creator/podcast/" + podcastId;
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
        max-width: 100%;
        padding-bottom: 20px;
    }

    .input-field {
        padding-bottom: 10px;
    }

    .title-text {
        padding-bottom: 5px;
        font-size: 14px;
        color: gray;
    }

    .select-input {
        width: 50%;
        border: 1px solid lightgray;
        border-radius: 1px;
        padding: 0.5em 1em;
        font-size: 16px;
    }
</style>
