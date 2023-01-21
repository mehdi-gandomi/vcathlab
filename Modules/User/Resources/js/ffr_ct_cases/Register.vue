<template>
 <vx-card class="example-full new-report" title="New FFR CT Case">
  <!-- <button type="button" class="btn btn-danger float-right btn-is-option" @click.prevent="isOption = !isOption">
    <i class="fa fa-cog" aria-hidden="true"></i>
    Options
  </button> -->
   <template slot="actions">
        <vs-button color="primary" to="/user/ct_cases" type="filled">{{
            __("Back")
        }}</vs-button>
    </template>


<div  >
          <h4 class="gray">Patient Information:</h4>
          <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("Name") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.name.type"
                v-model="form.name"
                style="width:250px;margin-left:1rem"
                :danger="hasValidationError('name')"
                :danger-text="validationError('name')"
                name="name"
                type="text"
              />
            </vs-col>

            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="6"
            >
              <div class="flex text-left">
                <span>{{ __("Age") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>

              <component
                :is="inputs.Age.type"
                v-model="form.age"
                style="width:80px;margin-left:1rem"
                :danger="hasValidationError('age')"
                :danger-text="validationError('age')"
                name="age"
                type="number"
              />
            </vs-col>
    <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="6"
            >
              <div class="flex text-left">
                <span>{{ __("Phone") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>

              <component
                :is="inputs.phone.type"
                v-model="form.phone"
                style="width:80px;margin-left:1rem"
                :danger="hasValidationError('phone')"
                :danger-text="validationError('phone')"
                name="phone"
                type="number"
              />
            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("Sex") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>

              <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem;margin-left:1.5rem">
                <vs-radio v-model="form.sex" vs-name="sex" vs-value="1"
                  >Male</vs-radio
                >
                <vs-radio
                  v-model="form.sex"
                  vs-name="sex"
                  vs-value="0"
                  class="ml-4"
                  >Female</vs-radio
                >
              </div>
            </vs-col>
          </vs-row>
          <vs-button color="success" >
            {{__("Register")}}
          </vs-button>
        </div>


 </vx-card>
</template>
<style>
.example-full .btn-group .dropdown-menu {
  display: block;
  visibility: hidden;
  transition: all .2s
}
.example-full .btn-group:hover > .dropdown-menu {
  visibility: visible;
}

.example-full label.dropdown-item {
  margin-bottom: 0;
}

.example-full .btn-group .dropdown-toggle {
  margin-right: .6rem
}
.new-report .table-responsive{
    overflow: hidden !important;
}


.example-full .filename {
  margin-bottom: .3rem
}

.example-full .btn-is-option {
  margin-top: 0.25rem;
}
.example-full .example-foorer {
  padding: .5rem 0;
  border-top: 1px solid #e9ecef;
  border-bottom: 1px solid #e9ecef;
}
.example-full .btn-group:hover > .dropdown-menu {
    visibility: visible;
}

.example-full .edit-image img {
  max-width: 100%;
}

.example-full .edit-image-tool {
  margin-top: .6rem;
}

.example-full .edit-image-tool .btn-group{
  margin-right: .6rem;
}

.example-full .footer-status {
  padding-top: .4rem;
}

.example-full .drop-active {
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  position: fixed;
  z-index: 9999;
  opacity: .6;
  text-align: center;
  background: #000;
}

.example-full .drop-active h3 {
  margin: -.5em 0 0;
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  font-size: 40px;
  color: #fff;
  padding: 0;
}
.modal-backdrop.fade{
    pointer-events: none;
}
</style>

<script>
import Cropper from 'cropperjs'
import ImageCompressor from '@xkeshi/image-compressor'
import FileUpload from 'vue-upload-component'
import HasForm from "@/mixins/HasForm";
import "../css/bootstrap.css";
export default {
  components: {
    FileUpload,
  },
  mixins:[HasForm],
  filters:{
    formatSize(size){
      if (size > 1024 * 1024 * 1024 * 1024) {
        return (size / 1024 / 1024 / 1024 / 1024).toFixed(2) + ' TB'
      } else if (size > 1024 * 1024 * 1024) {
        return (size / 1024 / 1024 / 1024).toFixed(2) + ' GB'
      } else if (size > 1024 * 1024) {
        return (size / 1024 / 1024).toFixed(2) + ' MB'
      } else if (size > 1024) {
        return (size / 1024).toFixed(2) + ' KB'
      }
      return size.toString() + ' B'
    }
  },
   computed: {
       isUploaded(){
           return this.$refs.upload && this.$refs.upload.uploaded;
       }
   },
   watch:{
    isUploaded(){
        alert("hi")
    }
   },
  data() {
    return {
      files: [],
      accept: 'image/png,image/gif,image/jpeg,image/webp',
      extensions: 'gif,jpg,jpeg,png,webp',
      patients:[],
      // extensions: ['gif', 'jpg', 'jpeg','png', 'webp'],
      // extensions: /\.(gif|jpe?g|png|webp)$/i,
      minSize: 1024,
      size: 1024 * 1024 * 10,
      multiple: false,
      directory: true,
      drop: true,
      dropDirectory: true,
      addIndex: false,
      thread: 3,
      name: 'file',
      postAction: '/user/api/ct_cases/upload',
      putAction: '/user/api/ct_cases/upload',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
      },
      data: {
        '_token': document.querySelector('meta[name="csrf-token"]').content,
        patient_id:""
      },
      form:{
        name: "",
        age: "",
        sex: 1,
        hospital:"",
        phone:""
      },

 inputs: {
          name: {
          type: "vs-input",
        },
        physician: {
          type: "vs-input",
        },
        Age: {
          type: "vs-input",
        },
        Sex: {
          type: "vs-radio",
        },
        code: {
          type: "vs-input",
        },
        phone: {
          type: "vs-input",
        },

      },
      autoCompress: 1024 * 1024,
      uploadAuto: false,
      isOption: false,

      addData: {
        show: false,
        name: '',
        type: '',
        content: '',
      },


      editFile: {
        show: false,
        name: '',
      }
    }
  },

  watch: {
    'editFile.show'(newValue, oldValue) {
      // 关闭了 自动删除 error
      if (!newValue && oldValue) {
        this.$refs.upload.update(this.editFile.id, { error: this.editFile.error || '' })
      }

      if (newValue) {
        this.$nextTick(function () {
          if (!this.$refs.editImage) {
            return
          }
          let cropper = new Cropper(this.$refs.editImage, {
            autoCrop: false,
          })
          this.editFile = {
            ...this.editFile,
            cropper
          }
        })
      }
    },

    'addData.show'(show) {
      if (show) {
        this.addData.name = ''
        this.addData.type = ''
        this.addData.content = ''
      }
    },
  },

  methods: {
    inputFilter(newFile, oldFile, prevent) {
      if (newFile && !oldFile) {
        // Before adding a file
        // 添加文件前

        // Filter system files or hide files
        // 过滤系统文件 和隐藏文件
        if (/(\/|^)(Thumbs\.db|desktop\.ini|\..+)$/.test(newFile.name)) {
          return prevent()
        }

        // Filter php html js file
        // 过滤 php html js 文件
        if (/\.(php5?|html?|jsx?)$/i.test(newFile.name)) {
          return prevent()
        }

        // Automatic compression
        // 自动压缩
        if (newFile.file && newFile.type.substr(0, 6) === 'image/' && this.autoCompress > 0 && this.autoCompress < newFile.size) {
          newFile.error = 'compressing'
          const imageCompressor = new ImageCompressor(null, {
            convertSize: Infinity,
            maxWidth: 512,
            maxHeight: 512,
          })
          imageCompressor.compress(newFile.file)
            .then((file) => {
              this.$refs.upload.update(newFile, { error: '', file, size: file.size, type: file.type })
            })
            .catch((err) => {
              this.$refs.upload.update(newFile, { error: err.message || 'compress' })
            })
        }
      }


      if (newFile && (!oldFile || newFile.file !== oldFile.file)) {

        // Create a blob field
        // 创建 blob 字段
        newFile.blob = ''
        let URL = window.URL || window.webkitURL
        if (URL && URL.createObjectURL) {
          newFile.blob = URL.createObjectURL(newFile.file)
        }

        // Thumbnails
        // 缩略图
        newFile.thumb = ''
        if (newFile.blob && newFile.type.substr(0, 6) === 'image/') {
          newFile.thumb = newFile.blob
        }
      }
    },

    // add, update, remove File Event
    inputFile(newFile, oldFile) {
      if (newFile && oldFile) {
        // update

        if (newFile.active && !oldFile.active) {
          // beforeSend

          // min size
          if (newFile.size >= 0 && this.minSize > 0 && newFile.size < this.minSize) {
            this.$refs.upload.update(newFile, { error: 'size' })
          }
        }

        if (newFile.progress !== oldFile.progress) {
          // progress
        }

        if (newFile.error && !oldFile.error) {
          // error
        }

        if (newFile.success && !oldFile.success) {
          Iracode.success(this.__("Your CT Case uploaded successfully"))
          this.data={};
          this.$router.push("/user/ct_cases")
        }
      }


      if (!newFile && oldFile) {
        // remove
        if (oldFile.success && oldFile.response.id) {
          // $.ajax({
          //   type: 'DELETE',
          //   url: '/upload/delete?id=' + oldFile.response.id,
          // })
        }
      }


      // Automatically activate upload
      if (Boolean(newFile) !== Boolean(oldFile) || oldFile.error !== newFile.error) {
        if (this.uploadAuto && !this.$refs.upload.active) {
          this.$refs.upload.active = true
        }
      }
    },


    alert(message) {
      alert(message)
    },

    getPatientName(op){
        return op.name;
    },
    onEditFileShow(file) {
      this.editFile = { ...file, show: true }
      this.$refs.upload.update(file, { error: 'edit' })
    },

    onEditorFile() {
      if (!this.$refs.upload.features.html5) {
        this.alert('Your browser does not support')
        this.editFile.show = false
        return
      }

      let data = {
        name: this.editFile.name,
      }
      if (this.editFile.cropper) {
        let binStr = atob(this.editFile.cropper.getCroppedCanvas().toDataURL(this.editFile.type).split(',')[1])
        let arr = new Uint8Array(binStr.length)
        for (let i = 0; i < binStr.length; i++) {
          arr[i] = binStr.charCodeAt(i)
        }
        data.file = new File([arr], data.name, { type: this.editFile.type })
        data.size = data.file.size
      }
      this.$refs.upload.update(this.editFile.id, data)
      this.editFile.error = ''
      this.editFile.show = false
    },

    // add folder
    onAddFolder() {
      if (!this.$refs.upload.features.directory) {
        this.alert('Your browser does not support')
        return
      }

      let input = this.$refs.upload.$el.querySelector('input')
      input.directory = true
      input.webkitdirectory = true
      this.directory = true

      input.onclick = null
      input.click()
      input.onclick = (e) => {
        this.directory = false
        input.directory = false
        input.webkitdirectory = false
      }
    },

    onAddData() {
      this.addData.show = false
      if (!this.$refs.upload.features.html5) {
        this.alert('Your browser does not support')
        return
      }

      let file = new window.File([this.addData.content], this.addData.name, {
        type: this.addData.type,
      })
      this.$refs.upload.add(file)
    }
  },
  async created() {
    const {data}=await this.$http.get("/user/api/patients");
    this.patients=data.data.items;
  },
}
</script>
