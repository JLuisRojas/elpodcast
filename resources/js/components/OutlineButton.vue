<template>
   <button @click="onClick" class="btn-outline">
       <slot></slot>
   </button>   
</template>

<script>
export default {
    props: ['onClick']
}
</script>
