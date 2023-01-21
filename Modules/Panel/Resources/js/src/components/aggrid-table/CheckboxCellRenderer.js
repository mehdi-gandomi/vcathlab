import "./checkboxCellRenderer.scss"
export default Vue.extend({
    mounted() {
        console.log(this.params)
    },
  computed: {
      yesLabel(){
        return this.params.yesLabel;
      },
      noLabel(){
        return this.params.noLabel;
      }
  },
  template: `
    <td class="w-full flex justify-center items-center" style="height:100%">
        <div class="checkbox-success" v-if="params.value">
            <p v-if="yesLabel">{{yesLabel}}</p>
            <feather-icon  v-else icon='CheckCircleIcon' svgClasses='h-5 w-5' class='ml-1 text-white' />
        </div>
        <div class="checkbox-danger" v-else>
            <p v-if="noLabel">{{noLabel}}</p>
            <feather-icon v-else icon='XCircleIcon' svgClasses='h-5 w-5' class='ml-1 text-white' />
        </div>

    </td>
    `,
});
