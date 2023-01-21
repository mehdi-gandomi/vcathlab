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

    <div class="vx-navbar-wrapper" :class="classObj">
      <vs-navbar class="vx-navbar navbar-custom navbar-skelton" :color="navbarColorLocal" :class="textColor">
        <search-bar v-if="shouldShowSearch"/>
        <!-- SM - OPEN SIDEBAR BUTTON -->
        <feather-icon class="sm:inline-flex xl:hidden cursor-pointer pt-2 pr-3" icon="MenuIcon" @click.stop="showSidebar" />

        <!-- <bookmarks :navbarColor="navbarColor" v-if="windowWidth >= 992" /> -->

        <vs-spacer />

        <vx-tooltip text="Toggle full screen" position="bottom">
            <feather-icon class="inline-flex cursor-pointer p-2" icon="MaximizeIcon" @click.stop="toggleFullScreen" />
        </vx-tooltip>
        <i18n v-if="shouldShowLangSwitcher"/>



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


export default {
  name: "the-navbar-vertical",
  props: {
    navbarColor: {
      type: String,
      default: "#fff",
    },
  },
  data() {
      return {
          isFullScreen:false
      }
  },
  components: {
    // Bookmarks,
    I18n,
    SearchBar,
    // CartDropDown,
    NotificationDropDown,
    ProfileDropDown,
  },
  computed:{
    navbarColorLocal() {
      return this.$store.state.theme === "dark" && this.navbarColor === "#fff" ? "#10163a" : this.navbarColor
    },
    shouldShowLangSwitcher(){
        return window.vuexy.show_language_switcher;
    },
    shouldShowSearch(){
        return window.vuexy.show_global_search;
    },
    verticalNavMenuWidth() {
      return this.$store.state.verticalNavMenuWidth
    },
    textColor() {
      return {'text-white': (this.navbarColor != '#10163a' && this.$store.state.theme === 'dark') || (this.navbarColor != '#fff' && this.$store.state.theme !== 'dark')}
    },
    windowWidth() {
      return this.$store.state.windowWidth
    },

    // NAVBAR STYLE
    classObj() {
      if (this.verticalNavMenuWidth == "default")      return "navbar-default"
      else if (this.verticalNavMenuWidth == "reduced") return "navbar-reduced"
      else if (this.verticalNavMenuWidth)              return "navbar-full"
    },
  },
  methods: {
    showSidebar() {
      this.$store.commit('TOGGLE_IS_VERTICAL_NAV_MENU_ACTIVE', true);
    },
    toggleFullScreen(){
        if (this.isFullScreen){
            this.isFullScreen=false;
            return this.closeFullscreen();
        }
        this.isFullScreen=true;
        var el = document.body;

        // use necessary prefixed versions
        if(el.webkitRequestFullscreen){
            return el.webkitRequestFullscreen();
        }
        if(el.mozRequestFullScreen){
            return el.mozRequestFullScreen();
        }
        if(el.msRequestFullscreen){
            return el.msRequestFullscreen();
        }

        // finally the standard version
        if(el.requestFullscreen){
            return el.requestFullscreen();
        }
    },
    /* Close fullscreen */
    closeFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) { /* Safari */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) { /* IE11 */
            document.msExitFullscreen();
        }
    }
  }
}
</script>

