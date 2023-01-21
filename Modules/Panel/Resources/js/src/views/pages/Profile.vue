<!-- =========================================================================================
  File Name: Profile.vue
  Description: Profile Page
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <div id="profile-page">

        <!-- PROFILE HEADER -->
        <div class="profile-header">
            <div class="relative">
                <div class="cover-container rounded-t-lg">
                    <img :src="user_info.cover_img" alt="user-profile-cover" class="responsive block">
                </div>
                <div class="profile-img-container pointer-events-none">
                    <div>
                        <vs-avatar class="user-profile-img" :src="user_info.profile_img" size="85px" />
                    </div>
                    <div class="profile-actions pointer-events-auto flex">
                        <vs-button icon-pack="feather" radius icon="icon-edit-2"></vs-button>
                        <vs-button icon-pack="feather" radius icon="icon-settings" class="ml-2 lg:ml-4"></vs-button>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end flex-wrap profile-header-nav p-6">

                <div class="block sm:hidden">
                    <feather-icon @click="isNavOpen = !isNavOpen" icon="AlignJustifyIcon" v-show="!isNavOpen" class="vx-navbar-toggler cursor-pointer" />
                    <feather-icon icon="XIcon" v-show="isNavOpen" @click="isNavOpen = !isNavOpen" class="vx-navbar-toggler cursor-pointer" />
                </div>
                <div :class="isNavOpen ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
                    <div class="text-sm sm:flex-grow">
                        <ul class="sm:flex justify-around mt-8 w-full md:mt-0 md:ml-auto md:w-3/4">
                            <li class="p-2 sm:p-0"><router-link to="/pages/profile">Timeline</router-link></li>
                            <li class="p-2 sm:p-0"><router-link to="/pages/profile">About</router-link></li>
                            <li class="p-2 sm:p-0"><router-link to="/pages/profile">Photos</router-link></li>
                            <li class="p-2 sm:p-0"><router-link to="/pages/profile">Friends</router-link></li>
                            <li class="p-2 sm:p-0"><router-link to="/pages/profile">Videos</router-link></li>
                            <li class="p-2 sm:p-0"><router-link to="/pages/profile">Events</router-link></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <vx-navbar> -->
            <!-- </vx-navbar> -->
        </div>

        <!-- COL AREA -->
        <div class="vx-row">
            <!-- COL 1 -->
            <div class="vx-col w-full lg:w-1/4">
                <!-- ABOUT CARD -->
                <vx-card title="About" class="mt-base">
                    <!-- ACTION SLOT -->
                    <template slot="actions">
                        <feather-icon icon="MoreHorizontalIcon"></feather-icon>
                    </template>

                    <!-- USER BIO -->
                    <div class="user-bio">
                        <p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes. Topping cake wafer.</p>
                    </div>

                    <!-- OTEHR DATA -->
                    <div class="mt-5">
                        <h6>Joined:</h6>
                        <p>November 15, 2015</p>
                    </div>

                    <div class="mt-5">
                        <h6>Lives:</h6>
                        <p>New York, USA</p>
                    </div>

                    <div class="mt-5">
                        <h6>Email:</h6>
                        <p>bucketful@fiendhead.org</p>
                    </div>

                    <div class="mt-5">
                        <h6>Website:</h6>
                        <p>www.pixinvent.com</p>
                    </div>

                    <div class="social-links flex mt-4">
                        <feather-icon svgClasses="h-7 w-7 cursor-pointer bg-primary p-1 text-white rounded" class="mr-2" icon="FacebookIcon"></feather-icon>
                        <feather-icon svgClasses="h-7 w-7 cursor-pointer bg-primary p-1 text-white rounded" class="mr-2" icon="TwitterIcon"></feather-icon>
                        <feather-icon svgClasses="h-7 w-7 cursor-pointer bg-primary p-1 text-white rounded" class="mr-2" icon="InstagramIcon"></feather-icon>
                    </div>
                </vx-card>

                <!-- PAGES SUGGESTION -->
                <vx-card title="Suggested Pages" class="mt-base">
                    <ul class="page-suggestions-list">
                        <li class="page-suggestion flex items-center mb-4" v-for="page in suggestedPages" :key="page.index">
                            <div class="mr-3"><vs-avatar class="m-0" :src="page.img" size="35px" /></div>
                            <div class="leading-tight">
                                <p class="font-medium">{{ page.title | capitalize }}</p>
                                <span class="text-xs">{{ page.type | capitalize }}</span>
                            </div>
                            <div class="ml-auto">
                                <div class="flex">
                                    <feather-icon icon="StarIcon" svgClasses="h-4 w-4" class="mr-2 cursor-pointer"></feather-icon>
                                </div>
                                <!-- <span class="flex bg-primary rounded p-2 text-white"><feather-icon icon="UserPlusIcon" svgClasses="w-4 h-4"></feather-icon></span> -->
                            </div>
                        </li>
                    </ul>
                </vx-card>

                <!-- TWITER FEEDS -->
                <vx-card title="Twitter Feeds" class="mt-base">
                    <ul class="twitter-feeds-list">
                        <li class="twitter-feed" :class="{'mt-8': index}" v-for="(feed, index) in twitterFeeds" :key="feed.id">
                            <!-- FEED HEADER -->
                            <div class="twitter-feed-header flex items-center">
                                <vs-avatar class="m-0" :src="feed.authorAvatar" size="35px" />
                                <div class="leading-tight ml-3">
                                    <p class="feed-author font-semibold">{{ feed.authorDisplayName }}</p>
                                    <span class="flex items-center"><small>@{{ feed.authorUsername }}</small><feather-icon class="ml-1" icon="CheckIcon" svgClasses="h-3 w-3 bg-primary rounded-full text-white"></feather-icon></span>
                                </div>
                            </div>

                            <!-- FEED CONTENT -->
                            <p class="mt-4">{{ feed.content }}</p>
                            <div class="tags-container" v-if="feed.tags.length">
                                <span v-for="tag in feed.tags" :key="tag" id="tag" class="mr-2 text-primary">#{{tag}}</span>
                            </div>
                            <small class="mt-3 inline-block">{{ feed.time | date(true) }}</small>
                        </li>
                    </ul>
                </vx-card>
            </div>

            <!-- COL 2 -->
            <div class="vx-col w-full lg:w-1/2">
                <vx-card class="mt-base" v-for="(post, index) in userPosts" :key="index">
                    <div>
                        <!-- POST HEADER -->
                        <div class="post-header flex justify-between mb-4">
                            <div class="flex items-center">
                                <div>
                                    <vs-avatar class="m-0" :src="userLatestPhotos[0]" size="45px"></vs-avatar>
                                </div>
                                <div class="ml-4">
                                    <h6>{{ post.author }}</h6>
                                    <small>{{ post.time | date(true) }} at {{ post.time | time }}</small>
                                </div>
                            </div>
                            <div class="flex">
                                <feather-icon class="ml-4" icon="HeartIcon" :svgClasses="{'text-danger fill-current stroke-current': post.isLiked}"></feather-icon>
                            </div>
                        </div>

                        <!-- POST CONTENT -->
                        <div class="post-content">
                            <p>{{ post.text }}</p>
                        </div>
                        <div class="post-media-container mb-6 mt-4">
                            <ul class="flex post-media-list">
                                <li class="post-media m-1 w-full" v-for="(media, mediaIdex) in post.media.slice(0, 2)" :key="mediaIdex">
                                    <img class="responsive rounded" :src="media.img" alt="user-upload" v-if="mediaType(media) == 'image'">
                                    <video-player ref="player" class="media-video-player" :options="playerOptions(media)" v-else-if="mediaType(media) == 'video'" v-once />
                                    <span class="text-lg text-primary" v-else>Unknown Media Type</span>
                                </li>
                            </ul>
                            <span class="flex justify-end" v-if="post.media.length > 2">
                                <a class="inline-flex items-center text-sm" href=""><span>View All</span> <feather-icon :icon="$vs.rtl ? 'ChevronsLeftIcon' : 'ChevronsRightIcon'" svgClasses="h-4 w-4"></feather-icon></a>
                            </span>
                        </div>

                        <!-- POST ACTION DATA -->
                        <div>
                            <div class="flex justify-between">
                                <div class="flex items-center">
                                    <div class="flex items-center"><feather-icon class="mr-2" icon="HeartIcon" svgClasses="h-5 w-5"></feather-icon> <span>{{ post.likes }}</span></div>
                                    <ul class="users-liked user-list ml-3 sm:ml-6">
                                        <li v-for="(user, userIndex) in post.usersLiked" :key="userIndex">
                                            <vx-tooltip :text="user.name" position="bottom">
                                                <vs-avatar :src="user.img" size="30px" class="border-2 border-white border-solid -m-1"></vs-avatar>
                                            </vx-tooltip>
                                        </li>
                                    </ul>
                                    <small class="ml-2">+{{ post.likes - 5 }} more</small>
                                </div>
                                <div class="flex items-center"><feather-icon class="mr-2" icon="MessageSquareIcon" svgClasses="h-5 w-5"></feather-icon> <span>{{ post.comments }}</span></div>
                            </div>
                            <div class="comments-container mt-4">
                                <ul class="user-comments-list">
                                    <li v-for="(commentedUser, commentIndex) in post.usersCommented.slice(0, 2)" :key="commentIndex" class="commented-user flex items-center mb-4">
                                        <div class="mr-3"><vs-avatar class="m-0" :src="commentedUser.img" size="30px" /></div>
                                        <div class="leading-tight">
                                            <p class="font-medium">{{ commentedUser.author }}</p>
                                            <span class="text-xs">{{ commentedUser.comment }}</span>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="flex">
                                                <feather-icon icon="HeartIcon" svgClasses="h-4 w-4" class="mr-2 cursor-pointer"></feather-icon>
                                                <feather-icon icon="MessageSquareIcon" svgClasses="h-4 w-4" class="cursor-pointer"></feather-icon>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <span class="flex justify-end" v-if="post.usersCommented.length > 2">
                                    <a class="inline-flex items-center text-sm" href=""><span>View All</span> <feather-icon :icon="$vs.rtl ? 'ChevronsLeftIcon' : 'ChevronsRightIcon'" svgClasses="h-4 w-4"></feather-icon></a>
                                </span>
                            </div>
                            <div class="post-comment">
                                <vs-textarea label="Add Comment" class="mb-2" v-model="post.commentbox" />
                                <vs-button size="small">Post Comment</vs-button>
                            </div>
                        </div>
                    </div>
                </vx-card>
            </div>

            <!-- COL 3 -->
            <div class="vx-col w-full lg:w-1/4">

                <!-- LATEST PHOTOS -->
                <vx-card title="Latest Photos" class="mt-base">
                    <div class="vx-row pt-2">
                        <div class="vx-col w-1/2 sm:w-1/2 md:w-1/3 xl:1/4" v-for="(img, index) in userLatestPhotos" :key="index">
                            <img :src="img" alt="latest-upload" class="rounded mb-4 user-latest-image responsive">
                        </div>
                    </div>
                </vx-card>

                <vx-card title="Suggestions" class="mt-base">
                    <!-- ACTION SLOT -->
                    <template slot="actions">
                        <feather-icon icon="MoreHorizontalIcon"></feather-icon>
                    </template>

                    <!-- FRIENDS LIST -->
                    <ul class="friend-suggesions-list">
                        <li class="friend-suggestion flex items-center mb-4" v-for="(friend, index) in suggestedFriends" :key="index">
                            <div class="mr-3"><vs-avatar class="m-0" :src="friend.avatar" size="35px" /></div>
                            <div class="leading-tight">
                                <p class="font-medium">{{ friend.name }}</p>
                                <span class="text-xs">{{ friend.mutualFriends }} Mutual Friends</span>
                            </div>
                            <div class="ml-auto cursor-pointer">
                                <vs-button radius type="border" icon-pack="feather" icon="icon-user-plus" />
                            </div>
                        </li>
                    </ul>
                    <template slot="footer">
                    <vs-button icon-pack="feather" icon="icon-plus" class="w-full">Load More</vs-button>
                    </template>
                </vx-card>

                <vx-card title="Polls" class="mt-base">
                    <ul class="polls-list">
                        <li class="poll" v-for="poll in polls" :key="poll.id">
                            <h6 class="poll-title">{{ poll.title }}</h6>
                            <ul class="poll-options-result">
                                <li class="poll-option mt-6" v-for="option in poll.options" :key="option.value">
                                    <div class="flex">
                                        <vs-radio v-model="userPoll" :vs-value="option.value">{{ option.text | capitalize }}</vs-radio>
                                        <span class="block ml-auto">{{ option.voted }}%</span>
                                    </div>
                                    <vs-progress :percent="option.voted"></vs-progress>
                                    <ul class="users-voted user-list mt-2">
                                        <li v-for="(user, userIndex) in option.usersVoted" :key="userIndex">
                                            <vx-tooltip :text="user.name" position="bottom">
                                                <vs-avatar :src="user.avatar" size="30px" class="border-2 border-white border-solid -m-1"></vs-avatar>
                                            </vx-tooltip>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <vs-button class="mt-5 w-full">Vote Now</vs-button>
                        </li>
                    </ul>
                </vx-card>
            </div>
        </div>

        <div class="vx-row">
            <div class="vx-col w-full">
                <div class="flex justify-center mt-base">
                    <vs-button id="button-load-more-posts" class="vs-con-loading__container" @click="loadContent">Load More</vs-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { videoPlayer } from 'vue-video-player'
import 'video.js/dist/video-js.css'

export default {
  data() {
    return {
      isNavOpen: false,
      userPoll: '',
      user_info: {
        profile_img: require("@assets/images/profile/user-uploads/user-13.jpg"),
        cover_img: require("@assets/images/profile/user-uploads/cover.jpg"),
      },
      mediaExtensions: { img: ['jpg', 'jpeg', 'png', 'bmp', 'gif', 'exif', 'tiff'], video: ['avi', 'flv', 'wmv', 'mov', 'mp4', '3gp'] },
      wasSidebarOpen: null,
    }
  },
  computed: {
    mediaType() {
      return (media) => {
        if (media.img) {
          const ext = media.img.split('.').pop();
          if (this.mediaExtensions.img.includes(ext)) return 'image'
        } else if (media.sources && media.poster) {
          // other validations
          return 'video'
        }
      }
    },
    playerOptions() {
      return (media) => {
        return {
          height: '360',
          fluid: true,
          autoplay: false,
          muted: true,
          language: 'en',
          playbackRates: [0.7, 1.0, 1.5, 2.0],
          sources: media.sources,
          poster: media.poster,
        }
      }
    }
  },
  methods: {
    loadContent() {
      this.$vs.loading({
        background: this.backgroundLoading,
        color: this.colorLoading,
        container: "#button-load-more-posts",
        scale: 0.45
      })
      setTimeout(() => {
        this.$vs.loading.close("#button-load-more-posts > .con-vs-loading")
      }, 3000);
    },
  },
  components: {
    videoPlayer,
  },
  mounted() {
    this.wasSidebarOpen = this.$store.state.reduceButton;
    this.$store.commit('TOGGLE_REDUCE_BUTTON', true)
  },
  beforeDestroy() {
    if (!this.wasSidebarOpen) this.$store.commit('TOGGLE_REDUCE_BUTTON', false)
  }
}

</script>


<style lang="scss">
@import "@sass/vuexy/pages/profile.scss";
</style>
