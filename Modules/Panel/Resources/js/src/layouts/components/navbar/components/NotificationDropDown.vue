<template>
  <!-- NOTIFICATIONS -->
  <vs-dropdown vs-custom-content vs-trigger-click class="cursor-pointer">
    <feather-icon icon="BellIcon" class="cursor-pointer mt-1 sm:mr-6 mr-2" :badge="notifications && unreadNotificationsCount" />

    <vs-dropdown-menu class="notification-dropdown dropdown-custom vx-navbar-dropdown">

      <div class="notification-top text-center p-5 bg-primary text-white">
        <h3 class="text-white">{{ unreadNotificationsCount }} {{__("New")}}</h3>
        <p class="opacity-75">{{__("Notifications")}}</p>
        <vx-tooltip  :text="__('Mark all as read')">
            <span style="cursor: pointer;" @click="markAllAsRead" >
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" viewBox="0 0 1024 1024" style="width:24px">
                    <path d="M769.22302895 133.87054901a29.71569494 29.71569494 0 0 1 41.70139242 0v0.11046684a28.83195638 28.83195638 0 0 1 0 41.14905695l-514.55652473 535.26913709-0.05523277 0.16570089a29.49475998 29.49475998 0 0 1-20.87831325 8.45074584 29.38429315 29.38429315 0 0 1-20.87831323-8.45074584l-0.11046814-0.22093496-175.6429527-173.43360693a28.88719045 28.88719045 0 0 1 0-41.14905698 29.77092771 29.77092771 0 0 1 41.64615966 0l154.98557441 152.99716364 493.78867833-514.88792654z m163.76772075 221.15546581h-233.52779913l64.01577969-60.64652896h169.56725351c16.90149168 0 30.65466627 13.5874737 30.65466627 30.37849853a30.54419945 30.54419945 0 0 1-30.70990034 30.26803043z m-317.04105211 121.34829194h316.98581933c16.01775312 0.66280359 28.83195638 13.31130596 29.49476 29.10812412a30.54419945 30.54419945 0 0 1-29.49476 31.59363889h-380.94636625l63.96054692-60.70176301zM468.36542957 658.36912767h464.51485329a30.54419945 30.54419945 0 0 1 28.99765729 28.61102143 30.48896537 30.48896537 0 0 1-28.94242323 32.03550752h-528.53063429l63.96054694-60.64652895z m-368.02169617 179.67500704a30.26803041 30.26803041 0 0 0 0 60.59129617h841.59486483a30.26803041 30.26803041 0 1 0 0-60.59129617H100.39896747z"></path>
                </svg>
            </span>
        </vx-tooltip>
      </div>

      <VuePerfectScrollbar ref="mainSidebarPs" class="scroll-area--nofications-dropdown p-0 mb-10" :settings="settings" :key="$vs.rtl">
        <ul class="bordered-items">
          <li v-for="ntf in notifications" :key="ntf.id" class="flex justify-between px-4 py-4 notification cursor-pointer text-left" :style="{'direction':$vs.rtl ? 'rtl':'ltr'}">
              <a class="w-full flex justify-between" v-if="ntf.data.link" :href="ntf.data.link">
                    <div class="flex items-start">
                        <feather-icon :icon="ntf.data.icon" :svgClasses="[`text-${ntf.data.type}`, 'stroke-current mr-1 h-6 w-6']"></feather-icon>
                        <div class="mx-2">
                            <span class="font-medium block notification-title" :class="[`text-${ntf.data.type}`]">{{ ntf.data.title }}</span>
                            <small>{{ ntf.data.message }}</small>
                        </div>
                    </div>
                    <small class="mt-1 whitespace-no-wrap">{{ elapsedTime(ntf.created_at) }}</small>
              </a>
              <div class="w-full flex justify-between" v-else>
                    <div class="flex items-start">
                        <feather-icon :icon="ntf.data.icon" :svgClasses="[`text-${ntf.data.type}`, 'stroke-current mr-1 h-6 w-6']"></feather-icon>
                        <div class="mx-2">
                            <span class="font-medium block notification-title" :class="[`text-${ntf.data.type}`]">{{ ntf.data.title }}</span>
                            <small>{{ ntf.data.message }}</small>
                        </div>
                    </div>
                    <small class="mt-1 whitespace-no-wrap">{{ elapsedTime(ntf.created_at) }}</small>
              </div>
          </li>
        </ul>
      </VuePerfectScrollbar>

      <div @click="$router.push('/notifications')" class="
        checkout-footer
        fixed
        bottom-0
        rounded-b-lg
        text-primary
        w-full
        p-2
        font-semibold
        text-center
        border
        border-b-0
        border-l-0
        border-r-0
        border-solid
        d-theme-border-grey-light
        cursor-pointer">
        <span>{{__("View All Notifications")}}</span>
      </div>
    </vs-dropdown-menu>
  </vs-dropdown>
</template>

<script>
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import {mapState,mapGetters} from 'vuex'
export default {
  components: {
    VuePerfectScrollbar
  },
  data() {
    const obj= {
    //   notifications:this.$store.state.notifications,
      settings: {
        maxScrollbarLength: 60,
        wheelSpeed: .60
      },
    }
    return obj;
  },
  computed: {
      ...mapState(['notifications']),
      ...mapGetters(['unreadNotificationsCount'])
  },
  methods: {
    elapsedTime(startTime) {
      let x        = new Date(startTime)
      let now      = new Date()
      var timeDiff = now - x
      timeDiff    /= 1000

      var seconds = Math.round(timeDiff)
      timeDiff    = Math.floor(timeDiff / 60)

      var minutes = Math.round(timeDiff % 60)
      timeDiff    = Math.floor(timeDiff / 60)

      var hours   = Math.round(timeDiff % 24)
      timeDiff    = Math.floor(timeDiff / 24)

      var days    = Math.round(timeDiff % 365)
      timeDiff    = Math.floor(timeDiff / 365)

      var years   = timeDiff

      if (years > 0) {
        return years + (years > 1 ? this.__(' Years ') : this.__(' Year ')) + __('ago')
      } else if (days > 0) {
        return days + (days > 1 ? this.__(' Days ') : this.__(' Day ')) + this.__('ago')
      } else if (hours > 0) {
        return hours + (hours > 1 ? this.__(' Hrs ') : this.__(' Hour ')) + this.__('ago')
      } else if (minutes > 0) {
        return minutes + (minutes > 1 ? this.__(' Mins ') : this.__(' Min ')) + this.__('ago')
      } else if (seconds > 0) {
        return seconds + (seconds > 1 ? this.__(' sec ago') : this.__('just now'))
      }

      return this.__('Just Now')
    },
    // Method for creating dummy notification time
    randomDate({ hr, min, sec }) {
      let date = new Date()

      if (hr) date.setHours(date.getHours() - hr)
      if (min) date.setMinutes(date.getMinutes() - min)
      if (sec) date.setSeconds(date.getSeconds() - sec)

      return date
    },
    async markAllAsRead(){
        if(this.unreadNotificationsCount > 0){
            const {data}=await this.$http.post(`${window.config.panel_url}/api/notifications/mark_as_read`);
            this.$store.dispatch("SET_NOTIFICATIONS",data.data);
            // const {data}=await app.$http.get(`${window.config.panel_url}/api/notifications`);
            // app.$store.dispatch("SET_NOTIFICATIONS",data.data);
        }
    }
  }
}

</script>

<style scoped>
    a:active, a:visited, a:hover, a{
        color:#000;
    }
</style>
