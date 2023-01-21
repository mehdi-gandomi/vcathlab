<template>
    <div>
        <vs-input class="inputx" placeholder="Name" v-model="feature.name"/>
    </div>
</template>
<script>
export default {
     name: 'feature',

  props: {
    value: {
      type: Object,
      required: true
    }
  },
  computed: {
    feature: {
      get () { return this.value },
      set (feature) { this.$emit('input', feature) }
    }
  }
}
</script>
