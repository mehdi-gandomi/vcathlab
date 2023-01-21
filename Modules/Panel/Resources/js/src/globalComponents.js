/*=========================================================================================
  File Name: globalComponents.js
  Description: Here you can register components globally
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


import Vue from 'vue'
import VxTooltip from './layouts/components/vx-tooltip/VxTooltip.vue'
import VxCard  from './components/vx-card/VxCard.vue'
import VxList  from './components/vx-list/VxList.vue'
import VxBreadcrumb  from './layouts/components/VxBreadcrumb.vue'
import FeatherIcon  from './components/FeatherIcon.vue'
import MenuIcon  from './components/MenuIcon.vue'
import VxInputGroup  from './components/vx-input-group/VxInputGroup.vue'
import LoadingButton from './components/vue-loading-button'
// import Datepicker from 'vuejs-datepicker';
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
import FAQRepeatable from './components/FAQ-Repeatable'
import FAQRepeatableItem from './components/FAQ-Repeatable-Item'
// Import Vue FilePond
import vueFilePond,{setOptions} from 'vue-filepond';


// Import FilePond plugins
// Import image preview plugin styles
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
// import FilePondPluginValidateSize from 'filepond-plugin-image-validate-size';

import FilepondExifOrientation from 'filepond-plugin-image-exif-orientation'
import fa_ir from './i18n/fa_ir';
import LoadingView from './components/LoadingView.vue'
import LoadingCard from './components/LoadingCard.vue'
import loader from './components/Loader.vue'
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import { quillEditor } from 'vue-quill-editor';

Vue.component("quill-editor",quillEditor);
// import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
// FilePondPluginFileValidateSize
// Create component
const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview,FilepondExifOrientation);
Vue.component('filepond', FilePond)

Vue.component("loading-button",LoadingButton)
Vue.component(VxTooltip.name, VxTooltip)
Vue.component(VxCard.name, VxCard)
Vue.component(VxList.name, VxList)
Vue.component(VxBreadcrumb.name, VxBreadcrumb)
Vue.component(FeatherIcon.name, FeatherIcon)
Vue.component(VxInputGroup.name, VxInputGroup)
Vue.component("loading-view", LoadingView)
Vue.component("loading-card", LoadingCard)
Vue.component("loader", loader)
Vue.component("menu-icon",MenuIcon)
// Vue.component("datepicker", Datepicker)

Vue.use(VuePersianDatetimePicker, {
  name: 'persian-date-picker',
  props: {
    inputFormat: 'Y-M-D H:i:s',
    displayFormat: 'jYYYY-jMM-jDD HH:mm',
    format:'Y-M-D HH:mm:ss',
    editable: false,
    inputClass: 'form-control datepicker-input',
    placeholder: "لطفا یک تاریخ انتخاب کنید",
    // altFormat: 'YYYY-MM-DD H:i:s',
    color: '#7367f0',
    autoSubmit: true,
    type:"datetime"
    //...
    //... And whatever you want to set as default
    //...
  }
});

// v-select component
import vSelect from 'vue-select'

// Set the components prop default to return our fresh components
vSelect.props.components.default = () => ({

  Deselect: {
    render: createElement => createElement('feather-icon', {
      props: {
        icon: 'XIcon',
        svgClasses: 'w-4 h-4 mt-1'
      }
    }),
  },
  OpenIndicator: {
    render: createElement => createElement('feather-icon', {
      props: {
        icon: 'ChevronDownIcon',
        svgClasses: 'w-5 h-5'
      }
    }),
  },
});

Vue.component("v-select",vSelect)
Vue.component("vue-select",vSelect)
