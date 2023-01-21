<!-- =========================================================================================
  File Name: TheNavbar.vue
  Description: Navbar component
  Component Name: TheNavbar
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
<div class="relative">
  <div class="vx-navbar-wrapper navbar-full p-0">
    <vs-navbar class="navbar-custom navbar-skelton" :class="navbarClasses"  :style="navbarStyle" :color="navbarColor">
      <i18n class="mx-3" v-if="shouldShowLangSwitcher" />
      <feather-icon class="mx-3" style="cursor:pointer" :icon="themeIcon" @click="toggleTheme"></feather-icon>
      <search-bar v-if="vuexy.show_search_bar"/>
      <feather-icon class="inline-flex cursor-pointer p-2" icon="MaximizeIcon" @click.stop="toggleFullScreen" />
      <vx-tooltip :text="this.__('KYC Verification')" position="bottom" >
        <router-link :to="{path:'/profile',query:{activeTab:2}}" tag="span" style="cursor:pointer" class="mx-3">
          <feather-icon icon="UserCheckIcon"></feather-icon>
        </router-link>
      </vx-tooltip>
      <router-link tag="div" to="/" class="vx-logo cursor-pointer mx-auto flex items-center">
        <logo class="mr-4 fill-current text-primary" />
        <span class="vx-logo-text text-primary">Vuexy</span>
      </router-link>




      <!-- <cart-drop-down /> -->

      <notification-drop-down />

      <profile-drop-down />

    </vs-navbar>
  </div>
</div>
</template>

<script>
// import Bookmarks            from "./components/Bookmarks.vue"
import I18n                 from "./components/I18n.vue"
import SearchBar            from "./components/SearchBar.vue"
// import CartDropDown         from "./components/CartDropDown.vue"
import NotificationDropDown from "./components/NotificationDropDown.vue"
import ProfileDropDown      from "./components/ProfileDropDown.vue"
import Logo                 from "../Logo.vue"

export default {
  name: "the-navbar-horizontal",
  props: {
    logo: { type: String                                                                                                          },
    navbarType: {
      type: String,
      required: true
    }
  },
  components: {
    Logo,
    // Bookmarks,
    I18n,
    SearchBar,
    // CartDropDown,
    NotificationDropDown,
    ProfileDropDown,
  },
  computed: {
    themeIcon(){
      return this.$store.state.theme == "dark" ? "SunIcon":"MoonIcon";
    },
    shouldShowLangSwitcher(){
        return window.vuexy.show_language_switcher;
    },
    navbarColor() {
      let color = "#fff"
      if (this.navbarType === "sticky") color = "#f7f7f7"
      else if (this.navbarType === 'static') {
        if (this.scrollY < 50) {
          color = "#f7f7f7"
        }
      }

      this.isThemedark === "dark" ? color === "#fff" ? color = "#10163a" : color = "#262c49" : null

      return color
    },
    vuexy(){
        return window.vuexy;
    },
    isThemedark()          { return this.$store.state.theme                                                                       },
    navbarStyle()          { return this.navbarType === "static" ? {transition: "all .25s ease-in-out"} : {}                      },
    navbarClasses()        { return this.scrollY > 5 && this.navbarType === "static" ? null : "d-theme-dark-light-bg shadow-none" },
    scrollY()              { return this.$store.state.scrollY                                                                     },
    verticalNavMenuWidth() { return this.$store.state.verticalNavMenuWidth                                                        },
    windowWidth()          { return this.$store.state.windowWidth                                                                 },
  },
  methods:{
    toggleTheme(){
      const theme=this.$store.state.theme == "dark" ? "light":"dark";
      this.$store.dispatch('updateTheme', theme)
    }
  }
}

</script>

