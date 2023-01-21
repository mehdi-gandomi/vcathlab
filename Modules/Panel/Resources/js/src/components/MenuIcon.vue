<template>
    <div v-frag>
        <i style="font-size: 20px;margin-left: 14px;" v-if="isFontAwesome($attrs.icon)" :class="$attrs.icon" v-bind="$attrs"></i>
        <feather-icon v-else v-bind="$attrs" />
    </div>
</template>
<script>
// import frag from '../plugins/frag'
export default {
    // directives:{frag},
    methods:{
        isFontAwesome(icon){
            console.log("f awesome",icon,icon.match(/.*[\ \"\']+(fa-[a-zA-z0-9]*).*/))
            return icon.match(/.*[\ \"\']+(fa-[a-zA-z0-9]*).*/);
        }
    }
}
</script>
