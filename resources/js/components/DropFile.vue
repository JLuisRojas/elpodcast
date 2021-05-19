<template>
    <div class="w-full">
        <div class="title-text">{{ title }}</div>

        <div class="d-flex align-items-center flex-column file-box" 
            @dragover="dragover" 
            @dragleave="dragleave" 
            @drop="drop">

            <input type="file" 
                id="file-input-select" 
                class="w-px h-px opacity-0 overflow-hidden absolute" 
                @change="onChange" 
                ref="file" accept=".pdf,.jpg,.jpeg,.png" 
            />
      
            <div class="text-center">
                {{ description }} 
            </div>

            <ul class="files-list mt-4" v-if="files.length" v-cloak>
                <li class="text-sm p-1" v-for="file in files" :key="file.name">
                    {{ file.name }}
                    <button class="remove-btn" type="button" @click="remove(files.indexOf(file))" title="Remove file">
                        x
                    </button>
                </li>
            </ul>

            <div class="py-3">
                <outline-button :onClick="selectFile">
                    {{ files.length == 0 ? "Seleccionar" : "Editar" }}
                </outline-button>
            </div>
        </div>
    </div>
</template>

<script>
import OutlineButton from './OutlineButton.vue';
export default {
  components: { OutlineButton },
    props: ['title', 'description', 'onSelected'],
    data: () => {
        return {
            files: [] // Store our uploaded fileso
        }
    },
    methods: {
        selectFile() {
            $('#file-input-select').trigger('click');
        },
        onChange() {
            this.files = [...this.$refs.file.files];

            this.onSelected(this.files);
        },
        remove(i) {
            this.files.splice(i, 1);
        },
        dragover(event) {
            event.preventDefault();
            // Add some visual fluff to show the user can drop its files
            if (!event.currentTarget.classList.contains('bg-drop')) {
                event.currentTarget.classList.remove('bg-normal');
                event.currentTarget.classList.add('bg-drop');
            }
        },
        dragleave(event) {
            // Clean up
            event.currentTarget.classList.add('bg-normal');
            event.currentTarget.classList.remove('bg-drop');
        },
        drop(event) {
            event.preventDefault();
            this.$refs.file.files = event.dataTransfer.files;
            this.onChange(); // Trigger the onChange event manually
            // Clean up
            event.currentTarget.classList.add('bg-normal');
            event.currentTarget.classList.remove('bg-drop');
        }
    }
}
</script>

<style scoped>
    #file-input-select {
        display: none;
    }

    .bg-normal {
        background-color: white;
    }

    .bg-drop {
        background-color: lightgrey;
    }

    .file-box {
        padding: 1em;
        border: 1px solid lightgray;
        border-radius: 1px;
    }

    .files-list {
      list-style-type: none; /* Remove bullets */
      padding: 0; /* Remove padding */
      margin: 0; /* Remove margins */
    }

    .remove-btn {
        border: 0px solid white;
        background-color: white;
    }
</style>
