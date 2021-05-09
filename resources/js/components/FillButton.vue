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
    color: white;
    background-color: black;
    border-radius: 2px;
}

.btn:hover {
    color: grey;
}
</style>
