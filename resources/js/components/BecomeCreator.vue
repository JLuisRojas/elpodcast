<template>
<div>
    <div class="row justify-content-center">
        <div class="section-title text-center" style="max-width: 60%">
            Conviertete en un creador y comparte tus ideas.
        </div>
    </div>
    <div class="row justify-content-center py-5">
        <fill-button :onClick="becomeCreator">Ser creador</fill-button>
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
