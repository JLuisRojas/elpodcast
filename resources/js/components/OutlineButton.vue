<template>
   <button @click="onClick" class="btn">
       <slot></slot>
   </button>   
</template>

<script>
export default {
    props: ['onClick']
}
</script>

<style scoped>
.btn {
    color: black;
    background-color: white;
    border: 2px solid black;
    border-radius: 2px;
}

.btn:hover {
    color: grey;
}
</style>
