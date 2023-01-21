<template>
    <div>
        <vs-row>
            <vs-col vs-lg="4" class="mt-3">
                <label for="">عنوان شغلی</label>
                <vs-input class="inputx w-100" name="job_title" placeholder="عنوان شغلی" v-model="feature.job_title"/>
            </vs-col>
            <vs-col vs-lg="4" class="mt-3">
                <label for="">نام محل کار</label>
                <vs-input class="inputx w-100" name="place_name" placeholder="نام محل کار" v-model="feature.place_name"/>
            </vs-col>
            <vs-col vs-lg="4" class="mt-3">
                <label for="">زمینه فعالیت کار</label>
                <vs-input class="inputx w-100" name="work_field" placeholder="زمینه فعالیت کار" v-model="feature.work_field"/>
            </vs-col>
            <vs-col vs-lg="6" class="mt-3">
                <label for="">گروه شغلی</label>
                <vs-input class="inputx w-100" name="job_category" placeholder="گروه شغلی" v-model="feature.job_category"/>
            </vs-col>
            <vs-col vs-lg="6" class="mt-3">
                <label for="">سطح ارشدیت</label>
                <v-select
                    :reduce="op=>op.value"
                    class="my-4"
                    v-model="resume_fields.seniority_level"
                    name="seniority_level"
                    :options="resume_fields.SeniorityLevel.options"
                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                />
            </vs-col>

            <vs-col vs-lg="6" class="mt-3">
                <vs-checkbox class="mt-8" v-model="feature.working">هنوز در اینجا مشغول به کار هستم</vs-checkbox>
            </vs-col>

            <vs-col vs-lg="3" class="mt-3">
                <label for="">سال فعالیت</label>
                <vs-input  class="inputx w-100 my-4" name="year" placeholder="سال فعالیت (برای مثال 1400)" v-model="feature.year"/>
            </vs-col>
            <vs-col vs-lg="3" class="mt-3">
                <label for="">ماه</label>
                <v-select
                    :reduce="op=>op.value"
                    class="my-4"
                    v-model="feature.month"
                    name="month"
                    :options="months"
                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                />
            </vs-col>
            <vs-col vs-lg="12" class="mt-3">
                <label for="">دستاوردها/وظایف کلیدی ( حداکثر 1500 کاراکتر )</label>
                <vs-textarea v-model="feature.reponsibilities"/>
            </vs-col>
        </vs-row>
        <!-- <location :value="feature.location"/> -->
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
