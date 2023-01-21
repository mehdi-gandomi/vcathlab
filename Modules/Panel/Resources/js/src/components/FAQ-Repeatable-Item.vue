<template>
    <div>
        <vs-input style="width:100%;margin-bottom:1rem" class="inputx" name="question" placeholder="سوال" v-model="feature.question"/>
        <quill-editor class="inputx" name="answer" placeholder="پاسخ" v-model="feature.answer"></quill-editor>
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
