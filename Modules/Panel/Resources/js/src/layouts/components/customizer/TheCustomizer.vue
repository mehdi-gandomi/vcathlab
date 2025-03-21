<!-- =========================================================================================
  File Name: TheCustomizer.vue
  Description: Template Customizer
  Component Name: TheCustomizer
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
  <div id="theme-customizer">

    <!-- Open Customizer Button -->
    <vs-button
      @click.stop="active=!active"
      color="primary"
      type="filled"
      class="customizer-btn"
      icon-pack="feather"
      icon="icon-settings" />

    <!-- Customizer Content -->
    <vs-sidebar
      click-not-close
      hidden-background
      position-right
      v-model="active"
      class="items-no-padding">
      <div class="h-full">

        <div class="customizer-header mt-6 flex items-center justify-between px-6">
          <div>
            <h4>{{__("THEME CUSTOMIZER")}}</h4>
            <small>{{__("Customize & Preview in Real Time")}}</small>
          </div>
          <feather-icon icon="XIcon" @click.stop="active = false" class="cursor-pointer"></feather-icon>
        </div>

        <vs-divider class="mb-0" />

        <VuePerfectScrollbar class="scroll-area--customizer pt-4 pb-6" style="direction:ltr" :settings="settings" :key="$vs.rtl">

          <div class="px-6" :style="{'direction':$vs.rtl ? 'rtl':'ltr'}">

            <!-- Layout Type -->
            <div class="mt-4">
              <h5 class="mb-2">{{__("Layout Type")}}</h5>
              <div>
                <vs-radio v-model="layoutType" vs-value="vertical" class="mr-4" vs-name="layout-type-vertical">{{__("Vertical")}}</vs-radio>
                <vs-radio v-model="layoutType" vs-value="horizontal" class="mr-4" vs-name="layout-type-horizontal">{{__("Horizontal")}}</vs-radio>
              </div>
            </div>

            <vs-divider />

            <!-- THEME COLORS -->
            <div>
              <h5 class="mb-4">{{__("Theme Color")}}</h5>
              <ul class="clearfix">

                <!-- Color Square -->
                <li
                  v-for="color in themeColors"
                  :key="color"
                  :style="{backgroundColor: color}"
                  :class="{'shadow-outline': color == primaryColor}"
                  class="w-10 cursor-pointer h-10 rounded-lg m-2 float-left"
                  @click="updatePrimaryColor(color)" />

                <!-- Custom Color Square -->
                <li
                  :style="{backgroundColor: customPrimaryColor}"
                  :class="{'shadow-outline': customPrimaryColor == primaryColor}"
                  class="w-10 cursor-pointer h-10 rounded-lg m-2 float-left"
                  @click="updatePrimaryColor(customPrimaryColor)" />
                <li class="float-left"><input class="w-10 cursor-pointer h-10 rounded-lg m-2" v-model="customPrimaryColor" type="color" /></li>
              </ul>
            </div>
            <!-- /THEME COLORS -->



            <vs-divider />

            <!-- THEME -->
            <div class="mt-4">
              <h5 class="mb-2">{{__("Theme Mode")}}</h5>
              <div>
                <vs-radio v-model="themeMode" vs-value="light" class="mr-4" vs-name="theme-mode-light">{{__("Light")}}</vs-radio>
                <vs-radio v-model="themeMode" vs-value="dark" class="mr-4" vs-name="theme-mode-dark">{{__("Dark")}}</vs-radio>
                <vs-radio
                  v-if="layoutType === 'vertical'"
                  v-model="themeMode"
                  vs-value="semi-dark"
                  vs-name="theme-mode-semi-dark">{{__("Semi Dark")}}</vs-radio>
              </div>
            </div>

            <vs-divider />

            <template v-if="layoutType === 'vertical'">

              <!-- COLLAPSE SIDEBAR -->
              <div class="mt-4 flex justify-between">
                <h5>{{__("Collapse Sidebar")}}</h5>
                <vs-switch v-model="reduced_sidebar" />
              </div>

              <vs-divider />

            </template>

            <!-- NAVBAR COLOR -->

            <template v-if="layoutType === 'vertical'">

              <div class="mt-4">
                <h5>{{__("Navbar Color")}}</h5>
                <ul class="clearfix">

                  <!-- WHITE COLOR -->
                  <li
                    :style="{background: navbarColorInitial}"
                    class="w-10 m-2 h-10 rounded-lg float-left cursor-pointer border border-solid d-theme-border-grey-light"
                    :class="navbarColorOptionClasses(navbarColorInitial)"
                    @click="navbarColorLocal = navbarColorInitial " />

                  <!-- THEME COLORS -->
                  <li
                    v-for="color in themeColors"
                    :key="color"
                    :style="{backgroundColor: color}"
                    :class="navbarColorOptionClasses(color)"
                    class="w-10 cursor-pointer h-10 rounded-lg m-2 float-left"
                    @click="navbarColorLocal = color" />

                  <!-- CUSTOM COLOR -->
                  <li
                    :style="{backgroundColor: customNavbarColor}"
                    :class="navbarColorOptionClasses(navbarColorOptionClasses)"
                    class="w-10 cursor-pointer h-10 rounded-lg m-2 float-left"
                    @click="navbarColorLocal = customNavbarColor" />

                  <li class="float-left">
                    <input class="w-10 cursor-pointer h-10 rounded-lg m-2" v-model="customNavbarColor" type="color" />
                  </li>
                </ul>
              </div>
              <!-- /NAVBAR COLOR -->

              <vs-divider />

            </template>

            <!-- NAVBAR TYPE -->
            <div class="mt-4">
              <h5 class="mb-2">{{ (layoutType === 'vertical' || windowWidth &lt; 1200) ? __("Navbar Type") : __("Nav Menu Type") }}</h5>
              <div>
                <vs-radio
                  v-if="layoutType === 'vertical' || windowWidth < 1200"
                  v-model="navbarTypeLocal"
                  vs-value="hidden"
                  class="mr-4"
                  vs-name="navbar-type-hidden">{{__("Hidden")}}</vs-radio>

                <vs-radio v-model="navbarTypeLocal" vs-value="static" class="mr-4" vs-name="navbar-type-static">{{__("Static")}}</vs-radio>
                <vs-radio v-model="navbarTypeLocal" vs-value="sticky" vs-name="navbar-type-sticky" class="mr-4">{{__("Sticky")}}</vs-radio>
                <vs-radio v-model="navbarTypeLocal" vs-value="floating" vs-name="navbar-type-floating">{{__("Floating")}}</vs-radio>
              </div>
            </div>

            <vs-divider />

            <!-- FOOTER TYPE -->
            <div class="mt-4">
              <h5 class="mb-2">{{__("Footer Type")}}</h5>
              <div>
                <vs-radio v-model="footerTypeLocal" vs-value="hidden" class="mr-4" vs-name="footer-type-hidden">{{__("Hidden")}}</vs-radio>
                <vs-radio v-model="footerTypeLocal" vs-value="static" class="mr-4" vs-name="footer-type-static">{{__("Static")}}</vs-radio>
                <vs-radio v-model="footerTypeLocal" vs-value="sticky" vs-name="footer-type-sticky">{{__("Sticky")}}</vs-radio>
              </div>
            </div>

            <vs-divider />

            <!-- RTL -->
            <div class="mt-4 flex justify-between">
              <h5 class="mb-2">{{__("RTL")}}</h5>
              <vs-switch v-model="rtl" />
            </div>

            <vs-divider />

            <!-- SHOW SCROLL TO TOP -->
            <div class="mt-4 flex justify-between">
              <h5 class="mb-2">{{__("Hide Scroll To Top")}}</h5>
              <vs-switch v-model="hideScrollToTopLocal" />
            </div>

            <vs-divider />

            <!-- ROUTER ANIMATION -->
            <div class="mt-4">
              <h5 class="mb-2">{{__("Router Animation")}} {{ routerTransitionLocal }}</h5>
              <vs-select v-model="routerTransitionLocal">
                <vs-select-item
                  v-for="(item,index) in routerTransitionsList"
                  :key="index"
                  :value="item.value"
                  :text="item.text" />
              </vs-select>
            </div>

          </div>
        </VuePerfectScrollbar>
      </div>
    </vs-sidebar>
  </div>
</template>


<script>
import VuePerfectScrollbar from 'vue-perfect-scrollbar'

export default {
  props: {
    footerType       : { type: String,  required: true, },
    hideScrollToTop  : { type: Boolean, required: true, },
    navbarType       : { type: String,  required: true, },
    navbarColor      : { type: String,  required: true, default: "#fff", },
    routerTransition : { type: String,  required: true, }
  },
  data() {
    return {
      active             : false,
      customPrimaryColor : '#3DC9B3',
      customNavbarColor  : '#3DC9B3',
      routerTransitionsList: [
        { text: 'Zoom Fade',   value: 'zoom-fade'   },
        { text: 'Slide Fade',  value: 'slide-fade'  },
        { text: 'Fade Bottom', value: 'fade-bottom' },
        { text: 'Fade',        value: 'fade'        },
        { text: 'Zoom Out',    value: 'zoom-out'    },
        { text: 'None',        value: 'none'        },
      ],
      settings: {
        maxScrollbarLength : 60,
        wheelSpeed         : .60,
      },
      themeColors: ['#7367F0', '#28C76F', '#EA5455', '#FF9F43', '#1E1E1E'],
    }
  },
  watch: {
    layoutType(val) {

      // Reset unsupported options
      if(val === "horizontal") {
        this.themeMode === "semi-dark" ? this.themeMode = "light" : null
        this.navbarType === "hidden" ? this.navbarTypeLocal = "floating" : null
        this.$emit('updateNavbarColor', "#fff")
      }
    }
  },
  computed: {
    footerTypeLocal: {
      get()    { return this.footerType; },
      set(val) { this.$emit('updateFooter', val) }
    },
    hideScrollToTopLocal: {
      get()    { return this.hideScrollToTop },
      set(val) { this.$emit('toggleHideScrollToTop', val) }
    },
    navbarColorInitial() {
      return this.$store.state.theme === 'dark' ? '#10163a' : '#fff'
    },
    navbarColorOptionClasses() {
      return (color) => {
        let classes = {}
        if (color == this.navbarColorLocal)   classes['shadow-outline'] = true
        if (this.navbarTypeLocal == 'static') classes['cursor-not-allowed'] = true
        return classes
      }
    },
    navbarColorLocal: {
      get() { return this.navbarColor },
      set(val) {
        if (this.navbarType == 'static') return
        this.$emit('updateNavbarColor', val)
      }
    },
    navbarTypeLocal: {
      get()    { return this.navbarType },
      set(val) { this.$emit('updateNavbar', val) }
    },
    layoutType: {
      get()    { return this.$store.state.mainLayoutType },
      set(val) { this.$store.commit("UPDATE_MAIN_LAYOUT_TYPE", val) }
    },
    primaryColor: {
      get()    { return this.$store.state.themePrimaryColor },
      set(val) { this.$store.commit('UPDATE_PRIMARY_COLOR', val) }
    },
    reduced_sidebar: {
      get()    { return this.$store.state.reduceButton },
      set(val) { this.$store.commit('TOGGLE_REDUCE_BUTTON', val) }
    },
    routerTransitionLocal: {
      get()    { return this.routerTransition },
      set(val) { this.$emit('updateRouterTransition', val) }
    },
    rtl: {
      get()    { return this.$vs.rtl },
      set(val) { this.$vs.rtl = val  }
    },
    themeMode: {
      get()    { return this.$store.state.theme },
      set(val) { this.$store.dispatch('updateTheme', val) }
    },
    windowWidth() {
      return this.$store.state.windowWidth
    }
  },
  methods: {
    updatePrimaryColor(color) {
      this.primaryColor = color;
      localStorage.setItem("theme_color",color)
      this.$vs.theme({ primary: color });
    }
  },
  components: {
    VuePerfectScrollbar,
  }
}

</script>


<style lang="scss">
#theme-customizer {
  .vs-sidebar {
    position: fixed;
    z-index: 52000;
    width: 400px;
    max-width: 90vw;
    // @apply shadow-lg;
    box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11), 0 5px 15px 0 rgba(0,0,0,0.08);
  }
}

.customizer-btn {
  position: fixed;
  top: 50%;
  right: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  z-index: 50000;

  .vs-icon {
    animation: spin 1.5s linear infinite;
  }
}

.scroll-area--customizer {
  height: calc(100% - 5rem);
}
</style>

