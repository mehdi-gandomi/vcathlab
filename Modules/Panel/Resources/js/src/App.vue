<!-- =========================================================================================
	File Name: App.vue
	Description: Main vue file - APP
	----------------------------------------------------------------------------------------
	Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: Pixinvent
	Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
	<div id="app" :class="vueAppClasses">
		<router-view @setAppClasses="setAppClasses" />
        <vue-progress-bar ></vue-progress-bar>
	</div>
</template>

<script>

export default {
  data() {
    return {
      vueAppClasses: [],
    }
  },
  watch: {
    '$store.state.theme'(val) {
      this.toggleClassInBody(val)
    },
    '$vs.rtl'(val) {
      document.documentElement.setAttribute("dir", val ? "rtl" : "ltr")
    }
  },
  computed:{
      isIdle(){
          return this.$store.state.idleVue.isIdle;
      },
      logoUrl(){
            const logo=Iracode.setting ? Iracode.setting("logo","vendor/panel/assets/images/logo.png"):"vendor/panel/assets/images/logo.png";
            return this.serverUrl(logo);
        },
  },
  methods: {
    toggleClassInBody(className) {
      if (className == 'dark') {
        if (document.body.className.match('theme-semi-dark')) document.body.classList.remove('theme-semi-dark')
        document.body.classList.add('theme-dark')
      }
      else if (className == 'semi-dark') {
        if (document.body.className.match('theme-dark')) document.body.classList.remove('theme-dark')
        document.body.classList.add('theme-semi-dark')
      }
      else {
        if (document.body.className.match('theme-dark'))      document.body.classList.remove('theme-dark')
        if (document.body.className.match('theme-semi-dark')) document.body.classList.remove('theme-semi-dark')
      }
    },
    setAppClasses(classesStr) {
      this.vueAppClasses.push(classesStr)
    },
    handleWindowResize() {
      this.$store.commit('UPDATE_WINDOW_WIDTH', window.innerWidth)

      // Set --vh property
      document.documentElement.style.setProperty('--vh', `${window.innerHeight * 0.01}px`);
    },
    handleScroll() {
      this.$store.commit('UPDATE_WINDOW_SCROLL_Y', window.scrollY)
    },
    fullScreenHandler()
    {
        if (document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement !== null)
        {
            document.body.classList.add("is-fullscreen")
            Iracode.$emit("toggleMinMenu")
        }else{
            document.body.classList.remove("is-fullscreen")
            Iracode.$emit("toggleMinMenu")
        }
    },
    FireEvent( ElementId, EventName )
    {
        if( document.getElementById(ElementId) != null )
        {
            if( document.getElementById( ElementId ).fireEvent )
            {
                document.getElementById( ElementId ).fireEvent( 'on' + EventName );
            }
            else
            {
                var evObj = document.createEvent( 'Events' );
                evObj.initEvent( EventName, true, false );
                document.getElementById( ElementId ).dispatchEvent( evObj );
            }
        }
    }
  },
  mounted() {
    this.toggleClassInBody(this.$store.state.theme)
    // this.toggleClassInBody(vuexy.themeConfig.theme)
    this.$store.commit('UPDATE_WINDOW_WIDTH', window.innerWidth)

    let vh = window.innerHeight * 0.01;
    // Then we set the value in the --vh custom property to the root of the document
    document.documentElement.style.setProperty('--vh', `${vh}px`);
    if (document.addEventListener)
    {
        document.addEventListener('fullscreenchange', this.fullScreenHandler, false);
        document.addEventListener('mozfullscreenchange', this.fullScreenHandler, false);
        document.addEventListener('MSFullscreenChange', this.fullScreenHandler, false);
        document.addEventListener('webkitfullscreenchange', this.fullScreenHandler, false);
    }

  },
  async created() {

    let dir = this.$vs.rtl ? "rtl" : "ltr"
    document.documentElement.setAttribute("dir", dir)

    window.addEventListener('resize', this.handleWindowResize)
    window.addEventListener('scroll', this.handleScroll)

    // Auth0
    // try       { await this.$auth.renewTokens() }
    // catch (e) { console.error(e) }

  },
  destroyed() {
    window.removeEventListener('resize', this.handleWindowResize)
    window.removeEventListener('scroll', this.handleScroll)
  },
}

</script>

<style lang="scss">
// @import "../../assets/css/loader.css";
</style>
