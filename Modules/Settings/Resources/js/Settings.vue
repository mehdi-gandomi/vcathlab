<template>
  <loading-view :loading="loading">
    <div class="settings-page">
      <vs-tabs
        :position="isSmallerScreen ? 'top' : 'left'"
        class="tabs-shadow-none"
        id="profile-tabs"
        :key="isSmallerScreen"
      >
        <!-- GENERAL -->

        <vs-tab
          v-for="(group, key) in template"
          :key="key"
          icon-pack="feather"
          :icon="group.icon"
          :label="!isSmallerScreen ? __(group.title) : ''"
        >
          <div class="tab-info md:ml-4 md:mt-0 mt-4 ml-0">
            <div class="settings-wrap" no-shadow :class="group.class">
              <div
                :class="child.wrapper_class"
                v-for="(child, key) in group.children"
                :key="key"
              >
                <template v-if="child.children && child.children.length">
                  <div :class="child.class">
                    <h4 :class="child.title_class">{{ child.title }}</h4>
                    <div
                      :class="innerChild.wrapper_class"
                      v-for="(innerChild, innerKey) in child.children"
                      :key="innerKey"
                    >
                      <label
                        :class="innerChild.label_class"
                        class="my-3 block"
                        for=""
                        >{{ innerChild.label }}</label
                      >
                      <component
                        v-if="innerChild.component == 'filepond'"
                        :style="innerChild.style"
                        :class="innerChild.input_class"
                        :is="innerChild.component"
                        :server="uploadServer"
                        :name="innerChild.name"
                        :files="files[innerChild.name]"
                      />
                      <component
                        v-else
                        :style="innerChild.style"
                        :class="innerChild.input_class"
                        :placeholder="innerChild.placeholder"
                        :is="innerChild.component"
                        v-model="settings[innerChild.name]"
                        :server="uploadServer"
                        :name="innerChild.name"
                      />
                    </div>
                  </div>
                </template>

                <template v-else>
                  <label :class="child.label_class" class="my-3 block" for="">{{
                    child.label
                  }}</label>
                  <component
                    v-if="child.component == 'filepond'"
                    :style="child.style"
                    :class="child.input_class"
                    :is="child.component"
                    :server="uploadServer"
                    :name="child.name"
                    :files="files[child.name]"
                    />
                  <component
                    v-else
                    :style="child.style"
                    :class="child.input_class"
                    :placeholder="child.placeholder"
                    :is="child.component"
                    v-model="settings[child.name]"
                    :server="uploadServer"
                    :name="child.name"
                  />
                </template>
              </div>
            </div>
          </div>
        </vs-tab>
      </vs-tabs>
      <div class="settings-actions">
        <vs-button @click="onSave" color="primary" type="filled">{{
          __("Save")
        }}</vs-button>
      </div>
    </div>
  </loading-view>
</template>

<script>
// import ProfileSocialLinks from "./ProfileSocialLinks.vue"
// import ProfileConnections from "./ProfileConnections.vue"
// import ProfileNotifications from "./ProfileNotifications.vue"

export default {
  data() {
    const files={};
    for(const group of Object.values(window.config.settings.template)){
        for(const child of group.children){
            if(child.children){
                for(const innerChild of child.children){
                    if(innerChild.component == "filepond" && window.config.settings.all[innerChild.name]){
                        files[innerChild.name]=[
                             {
                                source:this.url(window.config.settings.all[innerChild.name]),
                                // type:"local",
                                // load: false,
                                options: {
                                    type: 'local',
                                    load: false,  // ← File data will NOT be load
                                }
                            }
                        ];
                    }
                }
            }else{
                if(child.component == "filepond" && window.config.settings.all[child.name]){
                    files[child.name]=[
                         {
                                source:this.url(window.config.settings.all[child.name]),
                                // type:"local",
                                // load: false,
                                options: {
                                    type: 'local',
                                    load: false,  // ← File data will NOT be load
                                }
                            }
                    ];
                }
            }
        }
    }
    const data = {
      settings: { ...window.config.settings.all },
      template: { ...window.config.settings.template },
      loading: false,
      uploadServer: {
        url: window.config.uploadBasePath,
        // timeout: 7000,
        load: (source, load, error, progress, abort, headers) => {
            var myRequest = new Request(source);
            fetch(myRequest).then(function(response) {
                response.blob().then(function(myBlob) {
                    load(myBlob)
                });
            });
        },
        process: {
          url: "/process",
          method: "POST",
          headers: {
            Authorization: `Bearer ${this.$store.state.auth.accessToken}`,
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
              .content,
          },
          withCredentials: false,
          onload: (response) => {
            if (typeof response != "object") response = JSON.parse(response);
            console.log(response);
            this.settings[response.field_name] = "storage/"+response.key;
            return response.key;
          },
          onerror: (response) => response.data,
          ondata: (formData) => {
            formData.append("uploadPath",window.config.settingsUploadPath);
            return formData;
          },
        },
        revert: "revert",
        restore: "restore",
        fetch: "fetch",
      },
      files
    };
    return data;
  },
  //   async created(){
  //       this.loading=true;
  //       const {data}=await this.$http.get(`${window.config.root_url}/settings/api/template`);
  //       this.template=data.data.template;
  //       this.loading=false;
  //   },
  computed: {
    isSmallerScreen() {
      return this.$store.state.windowWidth < 768;
    },
  },
  methods: {

    async onSave() {
      this.$vs.loading();
      try {
        const {
          data,
        } = await this.$http.post(
          `${window.config.root_url}/settings/api/save`,
          { settings: this.settings }
        );
        Iracode.success(this.__("Settings saved successfully"));
      } catch (e) {
        console.log(e);
      } finally {
        this.$vs.loading.close();
      }
    },
  },
  created() {
    //   this.inputs[key].files.push();
  },
};
</script>

<style lang="scss">
.settings-wrap {
  background: #fff;
  border-radius: 0.5rem;
  width: 100%;
  position: relative;
  transition: all 0.3s ease-in-out;
  padding: 1.5rem;
}
.settings-actions {
  padding-right: 150px;
}
</style>
