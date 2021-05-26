<template>
   <button @click="onClick" class="btn-fill">
       <slot></slot>
   </button>   
</template>

<script>
export default {
    props: ['onClick']
}
</script>
