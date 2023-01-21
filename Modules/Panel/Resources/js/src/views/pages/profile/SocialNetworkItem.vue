<template>
    <div>
        <vs-input class="inputx" name="link" placeholder="لینک" v-model="feature.link"/>
    </div>
</template>
<script>

export default {
     name: 'feature',
     data() {
         return {
             fields:window.config.profile_fields,
             resume_fields:window.config.resume_fields
         }
     },

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
