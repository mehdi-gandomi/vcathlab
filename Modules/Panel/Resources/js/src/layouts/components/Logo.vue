<template>
    <img style="width:auto !important" :src="logoUrl" height="40px" alt="">
</template>
<script>
export default {
    computed: {
        logoUrl(){
            const logo=Iracode.setting ? Iracode.setting("logo","vendor/panel/assets/images/logo.png"):"vendor/panel/assets/images/logo.png";
            return this.serverUrl(logo);
        },
    },
}
</script>
