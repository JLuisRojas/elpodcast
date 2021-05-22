<template>
    <div>
        <div class="title-text">{{ title }}</div>

        <select 
            v-bind:selected="value"
            v-on:input="$emit('input', $event.target.value)"
            class="select-input"
        >
            <option 
                v-for="option in options" 
                v-bind:value="option.value"
                :key="option.value">
                {{ option.text }}
            </option>
        </select>
    </div>
</template>

<script>
export default {
    props: [
        'value',
        'title',
        'options',
    ],
    created() {
        console.log("VALUE");
        console.log(this.value);
        console.log(this.options);
    }
}
</script>

<style scoped>

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
