<template>
  <div id="loading-bg">
    <div class="loading-logo">
      <img src="@assets/images/logo/logo.png" alt="Logo">
    </div>
    <div class="loading">
      <div class="effect-1 effects"></div>
      <div class="effect-2 effects"></div>
      <div class="effect-3 effects"></div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    handleLoginEvent(data) {
      this.$store.dispatch('updateUserInfo', {
        displayName: data.profile.name,
        email: data.profile.email,
        photoURL: data.profile.avatar_url,
        // providerId: data.profile.sub.substr(0, data.profile.sub.indexOf('|')),
        // uid: data.profile.sub
      })
      this.$router.push(data.state.target || "/");
    },
    async delay(timeout){
        return new Promise(async(resolve)=>{
            setTimeout(()=>resolve(),timeout);
        })
    }
  },
  async created() {
    await this.$auth.handleSessionAuthentication()
    console.log(this.$router.currentRoute.query.to,this.$store.state.auth)
    this.$router.push(this.$router.currentRoute.query.to || '/').catch((e) => console.log(e))
    // const isAuthenticated=await this.$auth.isAuthenticated();
    // if (isAuthenticated) this.$router.push(this.$router.currentRoute.query.to || '/').catch((e) => console.log(e))
  }
}

</script>

<style lang="scss">
@import "../../../assets/css/loader.css";
</style>
