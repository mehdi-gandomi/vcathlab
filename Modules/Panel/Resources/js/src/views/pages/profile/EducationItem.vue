<template>
        <div>
        <vs-row>
            <vs-col vs-lg="3">
                <label style="font-weight:bold" for="">مقطع تحصیلی</label>
                <v-select
                    :reduce="op=>op.label"
                    class="my-4"
                    v-model="feature.degree"
                    name="gender"
                    :options="resume_fields.Degree.options"
                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                />
            </vs-col>
            <vs-col vs-lg="3">
                <label style="font-weight:bold" for="">رشته تحصیلی</label>
                <vs-input class="inputx my-4" name="field_of_study" v-model="feature.field_of_study"/>
            </vs-col>
            <vs-col vs-lg="3">
                <label style="font-weight:bold" for="">دانشگاه</label>
                <vs-input class="inputx my-4" name="university" v-model="feature.university"/>
            </vs-col>
            <vs-col vs-lg="3">
                <label style="font-weight:bold" for="">سال شروع</label>
                <vs-input class="inputx my-4" name="start_year" v-model="feature.start_year"/>
            </vs-col>
            <vs-col vs-lg="3">
                <label style="font-weight:bold" for="">ماه شروع</label>
                <v-select
                    :reduce="op=>op.value"
                    class="my-4"
                    v-model="feature.start_month"
                    name="month"
                    :options="months"
                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                />
            </vs-col>
            <vs-col vs-lg="3">
                <label style="font-weight:bold" for="">سال پایان</label>
                <vs-input class="inputx my-4" name="end_year"  v-model="feature.end_year"/>
            </vs-col>
            <vs-col vs-lg="3">
                <label style="font-weight:bold" for="">ماه پایان</label>
                <v-select
                    :reduce="op=>op.value"
                    class="my-4"
                    v-model="feature.end_month"
                    name="month"
                    :options="months"
                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                />
            </vs-col>
            <vs-col vs-lg="3">
                <label style="font-weight:bold" for="">معدل</label>
                <vs-input class="inputx my-4" name="mark"  v-model="feature.mark"/>
            </vs-col>
        </vs-row>
    </div>
</template>
<script>

export default {
     name: 'feature',
     data() {
         return {
             fields:window.config.profile_fields,
             resume_fields:window.config.resume_fields,
            months:[
                 {label:"فروردین",value:1},
                 {label:"اردیبهشت",value:2},
                 {label:"خرداد",value:3},
                 {label:"تیر",value:4},
                 {label:"مرداد",value:5},
                 {label:"شهریور",value:6},
                 {label:"مهر",value:7},
                 {label:"آبان",value:8},
                 {label:"آذر",value:9},
                 {label:"دی",value:10},
                 {label:"بهمن",value:11},
                 {label:"اسفند",value:12},
             ]
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
