<template>
    <div v-if="podcast != null" class="container">
        <div class="d-flex context">
            <a href="/creator">{{'Mis Podcasts  >'}}</a>
            <a :href="'/creator/podcast/' + podcast.id" class="context-item"> {{podcast.title + ' >'}}</a>
            <div class="context-title">Nuevo</div>
        </div>
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
                    title="Titulo de Episodio" 
                    name="title"
                    hint="El titulo del Episodio"
                    max=50
                    class="input-field"
                ></text-input>

                <text-input 
                    v-model="description"
                    title="Descripción del Episodio" 
                    name="descriptionLong"
                    hint="La descripción del episodio"
                    class="input-field"
                    max=150
                    isArea="true"
                    minHeight="150px"
                ></text-input>

                <drop-file 
                    title="Selecciona el audio del episodio"
                    description="Arrastra o selecciona el audio correspondiente al episodio"
                    :onSelected="onSelectedAudio"
                ></drop-file>

                <div v-if="errorsForm.length" 
                    class="d-flex align-items-end flex-column">
                    <b>Favor de corregir los siguientes errores:</b>
                    <ul>
                      <li v-for="e in errorsForm" :key="e.message"
                        >{{ e.message }}</li>
                    </ul>
                </div>

                <div class="d-flex flex-row-reverse py-3">
                    <fill-button :onClick="submit">Publicar Episodio</fill-button>
                </div>
            </div>
        </div>
    </div> 
</template>

<script>
import DropFile from './DropFile.vue';
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
        DropFile,
    },
    data: () => {
        return {
            podcast: null,
            imgPath: "",
            title: "",
            description: "",
            audio: null,
            file: null,
            hasImg: false,
            errorsForm: [],
            podcastId: null,
        }
    },
    async created() {
        this.parseUrl();
        await this.loadPodcast();
    },
    methods: {
        parseUrl() {
            const url = window.location.href; 

            const elements = url.split('/');

            this.podcastId = elements[elements.length - 2];
        },
        async loadPodcast() {
            const res = await axios.get(`/api/podcasts/${this.podcastId}`);

            this.podcast = res.data;

            this.imgPath = this.$asset + "storage/podcasts/" + this.podcast.image;
        },
        selectFile() {
            $('#file-input').trigger('click');
        },
        onSelectedAudio(files) {
            if(files.length > 0) {
                this.audio = files[0];
            }
        },
        onFileChange(e) {
            if(e.target.files && e.target.files[0]) {
                this.image = e.target.files[0];
                this.imgPath = URL.createObjectURL(this.image);

                this.hasImg = true;
            }
        },
        backPodcast() {
            window.location.href -= '/episode';
        },
        submit() {
            let newErrors = [];

            if(this.title == "")
                newErrors.push({
                    message: "Falta el titulo del episodio",
                });

            if(this.description == "")
                newErrors.push({
                    message: "Falta la descripción del episodio",
                });

            if(this.audio == null)
                newErrors.push({
                    message: "Falta seleccionar el audio del episodio",
                });

            this.errorsForm = newErrors;

            console.log(this.title);
            console.log(this.description);

            if(this.errorsForm.length == 0) {
                let formData = new FormData();

                const podcastId = this.podcast.id;

                formData.append('podcastId', podcastId);

                if(this.image != null)
                    formData.append('image', this.image);

                formData.append('audio', this.audio);

                formData.append('title', this.title);
                formData.append('description', this.description);

                axios.post(
                    `/api/podcasts/${this.podcast.id}/episodes`,
                    formData, {
                        headers: {
                          'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function () {
                    console.log('SUCCESS!!');
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
        width: 100%;
        padding-bottom: 20px;
    }

    .input-field {
        padding-bottom: 10px;
    }
</style>
