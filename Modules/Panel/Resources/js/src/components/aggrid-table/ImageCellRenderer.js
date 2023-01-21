import Vue from 'vue';
import "./imageCellRenderer.scss"
export default Vue.extend({
  template: `
    <td class="inline-flex items-center justify-content-center">
        <div class="ag-img-wrap" >
            <img v-img :src="imageUrl" />
        </div>
    </td>
    `,
    mounted() {

    },
    computed:{
        imageUrl(){
            if(!this.params.value) return "";
            const value=Iracode.getByDotNotation(this.params.data,this.params.colDef.field);
            return (value.indexOf("http://") > -1 || value.indexOf("https://") > -1) ? value:`${window.config.root_url}/${value}`;
        }
    }
});
