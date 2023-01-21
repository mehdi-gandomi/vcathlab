<template>
    <div>
        <translatable :locales="['fa','en']" v-model="name" component="vs-input"/>
    </div>
</template>
<script>
export default {
    data() {
        return {
            name:{}
        }
    },
}
</script>
