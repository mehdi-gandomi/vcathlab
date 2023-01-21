<template>
    <div>
        <video playsinline autoplay muted id="bgvid" @ended="onVideoEnd">
            <!-- <source src="polina.webm" type="video/webm"> -->
            <source :src="asset(settings.intro_video)"  type="video/mp4">
        </video>
    </div>
</template>
<script>
export default {
    computed:{
        settings(){
            return window.config.settings.all;
        }
    },
    methods: {
        onVideoEnd(e){
            this.$router.push({path:this.$route.query.to,query:{renew:1}})
        }
    },
}
</script>
<style scoped>
video {
  object-fit: cover;
  width: 100vw;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
}
</style>
