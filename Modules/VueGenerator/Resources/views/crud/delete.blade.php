<template>
    {{dd($columns)}}
    <div class="vx-row mb-6">
      <div class="vx-col sm:w-1/3 w-full">
        <span>First Name</span>
      </div>
      <div class="vx-col sm:w-2/3 w-full">
        <vs-input class="w-full" v-model="input1" />
      </div>
    </div>
    <div class="vx-row mb-6">
      <div class="vx-col sm:w-1/3 w-full">
        <span>Email</span>
      </div>
      <div class="vx-col sm:w-2/3 w-full">
        <vs-input class="w-full" type="email" v-model="input2" />
      </div>
    </div>
    <div class="vx-row mb-6">
      <div class="vx-col sm:w-1/3 w-full">
        <span>Mobile</span>
      </div>
      <div class="vx-col sm:w-2/3 w-full">
        <vs-input class="w-full" v-model="input3" />
      </div>
    </div>
    <div class="vx-row mb-6">
      <div class="vx-col sm:w-1/3 w-full">
        <span>Password</span>
      </div>
      <div class="vx-col sm:w-2/3 w-full">
        <vs-input class="w-full" type="password" v-model="input4" />
      </div>
    </div>
    <div class="vx-row mb-6">
      <div class="vx-col sm:w-2/3 w-full ml-auto">
        <vs-checkbox class="inline-flex" v-model="check1">Remember Me</vs-checkbox>
      </div>
    </div>
    <div class="vx-row">
      <div class="vx-col sm:w-2/3 w-full ml-auto">
        <vs-button class="mr-3 mb-2">Submit</vs-button>
        <vs-button color="warning" type="border" class="mb-2" @click="input1 = input2 = input3 = input4 = input4 = ''; check1 = false;">Reset</vs-button>
      </div>
    </div>

</template>

<script>
    export default {
        components: {},
        mixins: [],
        data () {
            return {
                //
            }
        },
        props: {
            //
        },
        computed: {
            //
        },
        created () {
            //
        },
        mounted () {
            //
        },
        methods: {
            //
        }
    };
</script>
