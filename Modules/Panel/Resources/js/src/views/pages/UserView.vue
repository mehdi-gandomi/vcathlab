<!-- =========================================================================================
  File Name: UserView.vue
  Description: User View page
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
  <div id="page-user-view">

    <!-- <vs-alert color="danger" title="User Not Found" :active.sync="user_not_found">
      <span>User record with id: {{ $route.params.userId }} not found. </span>
      <span>
        <span>Check </span><router-link :to="{name:'page-user-list'}" class="text-inherit underline">All Users</router-link>
      </span>
    </vs-alert> -->

    <div id="user-data" v-if="user_data.name">

      <vx-card :title="__('User Info')" class="mb-base">

        <!-- Avatar -->
        <div class="vx-row">

          <!-- Avatar Col -->
          <div class="vx-col" id="avatar-col">
            <div class="img-container mb-4">
              <img :src="user_data.avatar" class="rounded w-full" />
            </div>
          </div>

          <!-- Information - Col 1 -->
          <div class="vx-col flex-1" id="account-info-col-1">
            <table>
              <!-- <tr>
                <td class="font-semibold">Username</td>
                <td>{{ user_data.username }}: </td>
              </tr> -->
              <tr>
                <td class="font-semibold">{{__("Name")}}: </td>
                <td>{{ user_data.name }}: </td>
              </tr>
              <tr>
                <td class="font-semibold">{{__("Work Name")}}: </td>
                <td>{{ user_data.profile.work_name }}: </td>
              </tr>
              <tr>
                <td class="font-semibold">{{__("Email")}}: </td>
                <td>{{ user_data.email }}: </td>
              </tr>
            </table>
          </div>
          <!-- /Information - Col 1 -->

          <!-- Information - Col 2 -->
          <div class="vx-col flex-1" id="account-info-col-2">
            <table>
              <tr>
                <td class="font-semibold">{{__("Mobile")}}: </td>
                <td>{{ user_data.mobile }} </td>
              </tr>
              <!-- <tr>
                <td class="font-semibold">نوع کاربر</td>
                <td>{{ user_data.user_type }}: </td>
              </tr> -->
              <tr>
                <td class="font-semibold">{{__("Tel")}}: </td>
                <td>{{ user_data.profile.tel }} </td>
              </tr>

              <tr>
                <td class="font-semibold">{{__("Degree")}}: </td>
                <td>{{ user_data.profile.degree }} </td>
              </tr>
            </table>
          </div>
          <!-- /Information - Col 2 -->
          <!-- <div class="vx-col w-full flex" id="account-manage-buttons">
            <vs-button icon-pack="feather" icon="icon-edit" class="mr-4" :to="{name: 'app-user-edit', params: { userId: $route.params.userId }}">Edit</vs-button>
            <vs-button type="border" color="danger" icon-pack="feather" icon="icon-trash" @click="confirmDeleteRecord">Delete</vs-button>
          </div> -->

        </div>

      </vx-card>

      <div class="vx-row">
        <div class="vx-col lg:w-1/2 w-full">
          <vx-card :title="__('More Information')" class="mb-base">
            <table>
              <tr>
                <td class="font-semibold">{{__("Marriage Status")}}: </td>
                <td>{{ user_data.profile.marriage_status }} </td>
              </tr>
              <tr>
                <td class="font-semibold">{{__("Soldiery Status")}}: </td>
                <td>{{ user_data.profile.soldiery_status }} </td>
              </tr>

              <tr>
                <td class="font-semibold">{{__("Work Method")}}: </td>
                <td>{{ user_data.profile.work_method }}</td>
              </tr>
              <tr>
                <td class="font-semibold">{{__("Specialty")}}: </td>
                <td>{{ user_data.profile.specialty }} </td>
              </tr>
              <tr>
                <td class="font-semibold">{{__("Vehicle")}}: </td>
                <td>{{ user_data.profile.vehicle }} </td>
              </tr>
              <tr>
                <td class="font-semibold">{{__("Added Tags count")}}: </td>
                <td>{{ user_data.tags_count }} </td>
              </tr>
              <!-- <tr>
                <td class="font-semibold">{{__("Vehicle")}}: </td>
                <td>{{ user_data.profile.vehicle }}: </td>
              </tr> -->
              <!-- <tr>
                <td class="font-semibold">Contact</td>
                <td>{{ user_data.contact_options.join(", ") }}: </td>
              </tr> -->
            </table>
          </vx-card>
        </div>

        <div class="vx-col lg:w-1/2 w-full">
          <vx-card :title="__('About')" class="mb-base">
            {{user_data.profile.about}}
          </vx-card>
        </div>
        <div class="vx-col w-full">
          <vx-card :title="__('Work Information')" class="mb-base">
            <table>
                              <tr>
                <td class="font-semibold">{{__("Work Places")}}: </td>
                <td>
                    <div v-if="user_data.profile.work_places">
                        <p>{{user_data.profile.work_places.join("،")}}</p>
                    </div>
                </td>
              </tr>
                   <tr>
                <td class="font-semibold">{{__("Work Method")}}: </td>
                <td>
                    <div >
                        <p>{{user_data.profile.work_method}}</p>
                    </div>
                </td>
              </tr>

              <tr>
                <td class="font-semibold">{{__("Skills")}}: </td>
                <td>
                    <div v-if="user_data.profile.skills">
                        <p>{{user_data.profile.skills.map(item=>item.title).join("،")}}</p>
                    </div>
                </td>
              </tr>
              <tr>
                <td class="font-semibold">{{__("Former Colleages")}}: </td>
                <td>
                    <div v-if="user_data.profile.former_colleages">
                        <p>{{user_data.profile.former_colleages}}</p>
                    </div>
                </td>
              </tr>
            <tr>
                <td class="font-semibold">{{__("Portfolio")}}: </td>
                <td>
                    <div v-if="user_data.profile.portfolio">
                        <p>{{user_data.profile.portfolio.map(item=>item.title).join("،")}}</p>
                    </div>
                </td>
              </tr>
              <!-- <tr>
                <td class="font-semibold">{{__("Work Experience")}}: </td>
                <td>
                    <div v-if="user_data.profile.work_places">
                        <p>{{user_data.profile.work_places.join("،")}}</p>
                    </div>
                </td>
              </tr> -->
            </table>
          </vx-card>
        </div>
        <div class="w-full" v-if="user_data.profile.work_experiences">
            <h3>{{ __("Work Experience") }}</h3>
            <vs-row class="mt-4 vx-row" v-for="(items,key) in Iracode.chunkArray(user_data.profile.work_experiences,2)" :key="key" >

          <vx-card  class="vx-col lg:w-1/2 w-full mb-5"  v-for="(item,key) in items" :key="key">
            <vs-row >
                <vs-col vs-lg="6" class="mt-3">
                    <label style="font-weight:bold" for="">عنوان شغلی:</label>
                    <p>{{item.job_title}}</p>
                </vs-col>
                <vs-col vs-lg="4" class="mt-3">
                    <label style="font-weight:bold" for="">نام محل کار:</label>
                    <p>{{item.place_name}}</p>
                </vs-col>
                <vs-col vs-lg="4" class="mt-3">
                    <label style="font-weight:bold" for="">زمینه فعالیت کار:</label>
                    <p>{{item.work_field}}</p>
                </vs-col>
                <vs-col vs-lg="12" class="mt-3">
                    <label style="font-weight:bold" for="">گروه شغلی:</label>
                    <p>{{item.job_category}}</p>
                </vs-col>
                <vs-col vs-lg="4" class="mt-3">
                    <label style="font-weight:bold" for="">سطح ارشدیت:</label>
                    <p>{{item.seniority_level}}</p>
                </vs-col>

                <vs-col vs-lg="4" class="mt-3">
                    <label style="font-weight:bold" for="">سال فعالیت:</label>
                    <p>{{item.year}}</p>
                </vs-col>
                <vs-col vs-lg="4" class="mt-3">
                    <label style="font-weight:bold" for="">ماه:</label>
                    <p>{{item.month}}</p>
                </vs-col>
                <vs-col vs-lg="12" class="mt-3">
                    <label style="font-weight:bold" for="">دستاوردها/وظایف کلیدی:</label>
                    <p>{{item.reponsibilities}}</p>
                </vs-col>
                <vs-col vs-lg="6" class="mt-3">
                    <p style="color:green" v-if="item.working">مشغول به کار</p>
                </vs-col>
            </vs-row>
          </vx-card>
        </vs-row>
        </div>
        <div class="w-full" v-if="user_data.profile.educations">
            <h3>{{ __("Education") }}</h3>
            <vs-row class="mt-4 vx-row" v-for="(items,key) in Iracode.chunkArray(user_data.profile.educations,2)" :key="key" >

            <vx-card  class="vx-col lg:w-1/2 w-full mb-5"  v-for="(item,key) in items" :key="key">
                <vs-row >
                    <vs-col vs-lg="6" class="my-3">
                        <label style="font-weight:bold" for="">رشته تحصیلی:</label>
                        <p>{{item.field_of_study}}</p>
                    </vs-col>
                    <vs-col vs-lg="6" class="my-3">
                        <label style="font-weight:bold" for="">مقطع تحصیلی:</label>
                        <p>{{item.degree}}</p>

                    </vs-col>
                    <vs-col vs-lg="6" class="my-3">
                        <label style="font-weight:bold" for="">دانشگاه:</label>
                        <p>{{item.university}}</p>
                    </vs-col>
                    <vs-col vs-lg="6" class="my-3">
                        <label style="font-weight:bold" for="">معدل:</label>
                        <p>{{item.mark}}</p>
                    </vs-col>
                    <vs-col vs-lg="3" class="my-3">
                        <label style="font-weight:bold" for="">سال شروع:</label>
                        <p>{{item.start_year}}</p>
                    </vs-col>
                    <vs-col vs-lg="3" class="my-3">
                        <label style="font-weight:bold" for="">ماه شروع:</label>
                        <p>{{item.start_month}}</p>
                    </vs-col>
                    <vs-col vs-lg="3" class="my-3">
                        <label style="font-weight:bold" for="">سال پایان:</label>
                        <p>{{item.end_year}}</p>
                    </vs-col>
                    <vs-col vs-lg="3" class="my-3">
                        <label style="font-weight:bold" for="">ماه پایان:</label>
                        <p>{{item.end_month}}</p>
                    </vs-col>

                </vs-row>
            </vx-card>
            </vs-row>
        </div>
        <div class="w-full lg:w-1/2 " >
            <vx-card :title="__('Skills')" class="vx-col w-full mb-5"  >
                    <table>
                                    <tr>
                                        <td class="font-semibold">{{__("Agency Skills")}}: </td>
                                        <td>
                                            <div v-if="user_data.profile.agency_skills">
                                                <p>{{user_data.profile.agency_skills.map(item=>item.title).join("،")}}</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-semibold">{{__("Language Skills")}}: </td>
                                        <td>
                                            <div v-if="user_data.profile.language_skills">
                                                <p>{{user_data.profile.language_skills.map(item=>item.title).join("،")}}</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-semibold">{{__("Software Skills")}}: </td>
                                        <td>
                                            <div v-if="user_data.profile.software_skills">
                                                <p>{{user_data.profile.software_skills.map(item=>item.title).join("،")}}</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-semibold">{{__("Complementary Skills")}}: </td>
                                        <td>
                                            <div v-if="user_data.profile.complementary_skills">
                                                <p>{{user_data.profile.complementary_skills.map(item=>item.title).join("،")}}</p>
                                            </div>
                                        </td>
                                    </tr>
                            </table>
            </vx-card>
        </div>
        <div class="vx-col lg:w-1/2 w-full">
          <vx-card :title="__('Social Links')" class="mb-base">
            <table>
              <tr>
                <td class="font-semibold">اینستاگرام</td>
                <td >
                    <div v-if="user_data.profile.social_accounts && user_data.profile.social_accounts.instagram_links">
                        <a v-for="(item,key) in user_data.profile.social_accounts.instagram_links" :href="item.link" :key="key">
                            {{item.link}}
                        </a>
                    </div>
                </td>
              </tr>
              <tr>
                <td class="font-semibold">تلگرام</td>
                <td>
                    <div v-if="user_data.profile.social_accounts && user_data.profile.social_accounts.telegram_links">
                        <a v-for="(item,key) in user_data.profile.social_accounts.telegram_links" :href="item.link" :key="key">
                            {{item.link}}
                        </a>
                    </div>
                </td>
              </tr>
              <tr>
                <td class="font-semibold">واتساب</td>
                <td>
                    <div v-if="user_data.profile.social_accounts && user_data.profile.social_accounts.whatsapp_links">
                        <a v-for="(item,key) in user_data.profile.social_accounts.whatsapp_links" :href="item.link" :key="key">
                            {{item.link}}
                        </a>
                    </div>
                </td>
              </tr>
              <tr>
                <td class="font-semibold">آپارات</td>
                <td>
                    <div v-if="user_data.profile.social_accounts && user_data.profile.social_accounts.aparat_links">
                        <a v-for="(item,key) in user_data.profile.social_accounts.aparat_links" :href="item.link" :key="key">
                            {{item.link}}
                        </a>
                    </div>
                </td>
              </tr>
              <tr>
                <td class="font-semibold">وبسایت</td>
                <td>
                    <div v-if="user_data.profile.social_accounts && user_data.profile.social_accounts.websites">
                        <a v-for="(item,key) in user_data.profile.social_accounts.websites" :href="item.link" :key="key">
                            {{item.link}}
                        </a>
                    </div>
                </td>
              </tr>
            </table>
          </vx-card>
        </div>
        <div class="w-full" >
          <vx-card :title="__('More Information')" class="mb-base">
            <vs-row>
                <vs-col vs-lg="12">
                    <label for="" style="font-weight:bold">دوره آموزشی</label>
                    <p>{{user_data.profile.courses}}</p>
                </vs-col>
                <vs-col vs-lg="12">
                    <label for="" style="font-weight:bold">جوایز و افتحارات</label>
                    <p>{{user_data.profile.awards}}</p>
                </vs-col>
                <vs-col vs-lg="12">
                    <label for="" style="font-weight:bold">فعالیت های داوطلبانه</label>
                    <p>{{user_data.profile.activities}}</p>
                </vs-col>
                <vs-col vs-lg="12">
                    <label for="" style="font-weight:bold">پروژه های آکادمیک</label>
                    <p>{{user_data.profile.academic_projects}}</p>
                </vs-col>
                <vs-col vs-lg="12">
                    <label for="" style="font-weight:bold">کتاب ها و مقالات</label>
                    <p>{{user_data.profile.books_and_journals}}</p>
                </vs-col>
            </vs-row>
          </vx-card>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import moduleUserManagement from '@/store/user-management/moduleUserManagement.js'

export default {
  data(){
        const obj={
            isCodeModalActive:false,
            verifyCode:"",
            user_data:{

            },
            avatarPreview:""
        }
        return obj;
    },
  computed: {
    userAddress() {
      let str = ""
      for(var field in this.user_data.location) {
        str += field + " "
      }
      return str
    },
    Iracode(){
        return window.Iracode;
    }
  },
  async created() {
    const {data}=await this.$http.get(`/app/api/users/${this.$route.params.id}`,{params:{cast_enums:1}});
    this.user_data=data.data;

  },
  methods: {
    confirmDeleteRecord() {
      this.$vs.dialog({
        type: 'confirm',
        color: 'danger',
        title: `Confirm Delete`,
        text: `You are about to delete "${this.user_data.username}"`,
        accept: this.deleteRecord,
        acceptText: "Delete"
      })
    },
    deleteRecord() {
      /* Below two lines are just for demo purpose */
      this.$router.push({name:'app-user-list'});
      this.showDeleteSuccess()

      /* UnComment below lines for enabling true flow if deleting user */
      // this.$store.dispatch("userManagement/removeRecord", this.user_data.id)
      //   .then(()   => { this.$router.push({name:'app-user-list'}); this.showDeleteSuccess() })
      //   .catch(err => { console.error(err)       })
    },
    showDeleteSuccess() {
      this.$vs.notify({
        color: 'success',
        title: 'User Deleted',
        text: 'The selected user was successfully deleted'
      })
    }
  },
}

</script>

<style lang="scss">
#avatar-col {
  width: 10rem;
}

#page-user-view {
  table {
    td {
      vertical-align: top;
      min-width: 140px;
      padding-bottom: .8rem;
      word-break: break-all;
    }

    &:not(.permissions-table) {
      td {
        @media screen and (max-width:370px) {
          display: block;
        }
      }
    }
  }
}

// #account-info-col-1 {
//   // flex-grow: 1;
//   width: 30rem !important;
//   @media screen and (min-width:1200px) {
//     & {
//       flex-grow: unset !important;
//     }
//   }
// }


@media screen and (min-width:1201px) and (max-width:1211px),
only screen and (min-width:636px) and (max-width:991px) {
  #account-info-col-1 {
    width: calc(100% - 12rem) !important;
  }

  // #account-manage-buttons {
  //   width: 12rem !important;
  //   flex-direction: column;

  //   > button {
  //     margin-right: 0 !important;
  //     margin-bottom: 1rem;
  //   }
  // }

}

</style>
