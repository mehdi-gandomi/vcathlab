<template>
  <vs-tabs v-model="activeTab" :position="isSmallerScreen ? 'top' : 'left'" class="tabs-shadow-none" id="profile-tabs" :key="isSmallerScreen">

    <!-- GENERAL -->
    <vs-tab icon-pack="feather" icon="icon-user" :label="!isSmallerScreen ? __('General') : ''">
      <div class="tab-general md:ml-4 md:mt-0 mt-4 ml-0">
        <profile-general @advancedResume="activeTab=1"/>
      </div>
    </vs-tab>

    <vs-tab icon-pack="feather" icon="icon-lock" :label="!isSmallerScreen ? __('Change Password') : ''">
      <div class="tab-change-pwd md:ml-4 md:mt-0 mt-4 ml-0">
        <profile-change-password />
      </div>
    </vs-tab>
    <vs-tab icon-pack="feather" icon="icon-info" :label="!isSmallerScreen ? __('Login history') : ''">
      <div class="tab-info md:ml-4 md:mt-0 mt-4 ml-0">
        <login-history />
      </div>
    </vs-tab>
    <!-- <vs-tab icon-pack="feather" icon="icon-github" :label="!isSmallerScreen ? 'Social Links' : ''">
      <div class="tab-social-links md:ml-4 md:mt-0 mt-4 ml-0">
        <profile-social-links />
      </div>
    </vs-tab>
    <vs-tab icon-pack="feather" icon="icon-link-2" :label="!isSmallerScreen ? 'Connections' : ''">
      <div class="tab-text md:ml-4 md:mt-0 mt-4 ml-0">
        <profile-connections />
      </div>
    </vs-tab>
    <vs-tab icon-pack="feather" icon="icon-bell" :label="!isSmallerScreen ? 'Notifications' : ''">
      <div class="tab-text md:ml-4 md:mt-0 mt-4 ml-0">
        <profile-notifications />
      </div>
    </vs-tab> -->
  </vs-tabs>
</template>

<script>
import ProfileGeneral from "./ProfileGeneral.vue"

import ProfileChangePassword from "./ProfileChangePassword.vue"

// import ProfileSocialLinks from "./ProfileSocialLinks.vue"
// import ProfileConnections from "./ProfileConnections.vue"
// import ProfileNotifications from "./ProfileNotifications.vue"

export default {
  components: {
    ProfileGeneral,
    ProfileChangePassword
    // ProfileSocialLinks,
    // ProfileConnections,
    // ProfileNotifications,
  },
  created() {
      if(this.$route.query.tab){
          console.log(this.$route.query.tab)
          this.activeTab=this.$route.query.tab
      }
  },
  data() {
    return {
        activeTab:0
    }
  },
  computed: {
    isSmallerScreen() {
      return this.$store.state.windowWidth < 768
    }
  }
}
</script>

<style lang="scss">
#profile-tabs {
  .vs-tabs--content {
    padding: 0;
  }
}
.vue-form-wizard .wizard-progress-bar {
    float: right;
  }

  .vue-form-wizard .wizard-card-footer .wizard-footer-left {
    float: right;
  }

  .vue-form-wizard .wizard-card-footer .wizard-footer-right {
    float: left;
  }
</style>
