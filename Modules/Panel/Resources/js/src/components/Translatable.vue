<template>
    <div style="width:100%">
        <vs-tabs>
            <vs-tab v-for="(locale,key) in locales" :key="key" :label="locale">
                <div class="con-tab-ejemplo">
                    <component style="width:100%"  :is="component" @input="e=>onInput(locale,e)" v-bind="{...$attrs,value:localeValues[locale]}"></component>
                </div>
            </vs-tab>
        </vs-tabs>
    </div>
</template>
<script>
export default {
    props:["component","value","locales"],
    data() {
        const obj={
            localeValues:{}
        }
        return obj;
    },
    methods: {
        onInput(locale,value){
            console.log(locale,value)
            this.localeValues={...this.localeValues,[locale]:value};
            console.log(this.localeValues)
            this.$emit("input",this.localeValues)
        }
    },
    watch:{
        value(){
            this.localeValues=this.value
        }
    }
}
</script>
