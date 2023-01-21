import Vue from 'vue';
import "./imageCellRenderer.scss"
export default Vue.extend({
  template: `
    <td class="inline-flex items-center justify-content-center">
        <div class="ag-img-wrap" >
            <a :href='fileUrl' :download="this.params.value || 'download.docx'">{{fileName}}</a>
        </div>
    </td>
    `,
    mounted() {

    },
    computed:{
        fileUrl(){
            if(!this.params.value) return "";
            const value=Iracode.getByDotNotation(this.params.data,this.params.colDef.field);
            return (value.indexOf("http://") > -1 || value.indexOf("https://") > -1) ? value:`${window.config.root_url}/${value}`;
<<<<<<< HEAD
=======
        },
        fileName(){
            return window.Iracode.basename(this.params.value);
>>>>>>> c2535bb5426bcdc59b6e4a804d921e7fabb9ade7
        }
    }
});
