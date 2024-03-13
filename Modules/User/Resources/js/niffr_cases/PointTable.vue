<template>
    <div>
          <vs-table noDataText="" >
            <template slot="header">
                <h3>

                </h3>
            </template>
            <template slot="thead">
                <vs-th>
                Hemodynamic Parameters
                </vs-th>
                <vs-th>
                Result
                </vs-th>
                <vs-th>
                Status
                </vs-th>
            </template>

            <template >
                <vs-tr  >
                    <vs-td >
                        <strong> Fractional Flow Reserved (FFR)</strong>
                    </vs-td>

                    <vs-td>
                        <strong> {{point.ffr}}</strong>
                    </vs-td>

                    <vs-td >
                        <strong> {{renderStatus(point,"ffr")}}</strong>
                    </vs-td>
                </vs-tr>
                <vs-tr  >
                    <vs-td >
                        <strong> Area Stenosis (% AS)</strong>
                    </vs-td>

                    <vs-td>
                        <strong> {{point.ass}}</strong>
                    </vs-td>

                    <vs-td >
                        <strong> {{renderStatus(point,"ass")}}</strong>
                    </vs-td>
                </vs-tr>
                <vs-tr  >
                    <vs-td >
                        <strong> Diameter Stenosis (% DS)</strong>
                    </vs-td>

                    <vs-td>
                        <strong> {{point.dss}}</strong>
                    </vs-td>

                    <vs-td >
                        <strong> {{renderStatus(point,"dss")}}</strong>
                    </vs-td>
                </vs-tr>
                <vs-tr  >
                    <vs-td >
                        <strong> Wall Shear Stress (WSS)</strong>
                    </vs-td>

                    <vs-td>
                        <strong> {{point.wss}}</strong>
                    </vs-td>

                    <vs-td >
                        <strong> {{renderStatus(point,"wss")}}</strong>
                    </vs-td>
                </vs-tr>
                   <vs-tr  >
                    <vs-td >
                        <strong> Microvascular Resistance (IMR)</strong>
                    </vs-td>

                    <vs-td>
                        <strong> {{point.imr}}</strong>
                    </vs-td>

                    <vs-td >
                        <strong> {{renderStatus(point,"imr")}}</strong>
                    </vs-td>
                </vs-tr>
                <vs-tr  >
                    <vs-td >
                        <strong> Gradient Of Pressure (Del.P)</strong>
                    </vs-td>

                    <vs-td>
                        <strong> {{point.gp}}</strong>
                    </vs-td>

                    <vs-td >
                        <strong> {{renderStatus(point,"gp")}}</strong>
                    </vs-td>
                </vs-tr>
                  <vs-tr  >
                    <vs-td >
                        <strong> Stenosis Condition</strong>
                    </vs-td>
                    <vs-td  colspan="2">
                        {{renderStatus(point,"steno")}}
                    </vs-td>
                </vs-tr>


            </template>
            </vs-table>
            <vs-row class="mt-3 flex justify-between">
                <vs-col vs-lg="3"  >
                    <div :class="renderFFRClass(point)" style="width:100%">
                        <span style="font-size:1.2rem">FFR:</span>
                        <strong style="font-size:1.2rem">{{point.ffr}}</strong>
                    </div>
                </vs-col>
                <vs-col vs-lg="9" >
                    <div :class="renderFFRClass(point)"  style="width:107%">
                        <span style="font-size:1.2rem">Status:</span>
                        <strong style="font-size:1.2rem">{{renderStatus(point,"ffr")}}</strong>
                    </div>
                </vs-col>
            </vs-row>
            <vs-button style="width:100%" class="mt-3" @click="()=>exportAsDocx(point.name)" color="success" type="filled">Export as Word</vs-button>
            <vs-button style="width:100%" class="mt-3" @click="()=>exportAsWord(point.name)" color="success" type="filled">Export as PDF</vs-button>

    </div>
</template>
<script>

export default {
    props:['point','ctCaseResults'],
    data() {
        return {
            scores:{
                ffr:{
                    validationFn(val){
                        if (val >= 0.8) return "Normal > 0.8";
                        if (val < 0.8) return "Critical < 0.8";
                    },
                },
               imr:{
                    validationFn(val){
                        if (val >= 30) return "Critical > 30";
                        if (val < 30) return "Normal < 30";
                    },
                },
                ass:{
                    validationFn(val){
                        if (val >= 70) return "Significant";
                        if (val < 70) return "Non-Significant";
                    },
                },
                dss:{
                    validationFn(val){
                        if (val >= 50) return "Significant";
                        if (val < 50) return "Non-Significant";
                    },
                },
                wss:{
                    validationFn(val){
                        if (val >= 8.0) return "Critical > 8.0";
                        if (val < 8.0) return "Normal < 8.0";
                    },
                },
                gp:{
                    validationFn(val){
                        if (val >= 77) return "Normal >= 77";
                        if (val < 77) return "Critical < 77";
                    },
                },
                steno:{
                    validationFn(val){
                        if (val >= 0.8) return "Non-Significant";
                        if (val < 0.8) return "Significant";
                    },
                }


            }
        }
    },
    methods: {
            async exportAsDocx(name){
                try{
                    console.log(name,this.ctCaseResults[name],this.ctCaseResults)
                    const point=this.ctCaseResults[name];
                    if(!point.result_file) return;
                    window.open(this.url(point.result_file), "_blank");
                }catch(e){

                }
            },
            async exportAsWord(name){
                try{
                    console.log(name,this.ctCaseResults[name],this.ctCaseResults)
                    const point=this.ctCaseResults[name];
                    if(!point.result_file) return;
                    window.open(`https://docs.google.com/viewerng/viewer?url=${this.url(point.result_file)}`, "_blank");
                }catch(e){

                }
            // this.$vs.loading();
            // const {data:blob}=await this.$http.get(this.url(point.result_file),{
            //     responseType: 'blob', // important
            // })

            //  // Create an object URL for the blob object
            // const url = URL.createObjectURL(blob);

            // // Create a new anchor element
            // const a = document.createElement('a');

            // // Set the href and download attributes for the anchor element
            // // You can optionally set other attributes like `title`, etc
            // // Especially, if the anchor element will be attached to the DOM
            // a.href = url;

            // a.download = Iracode.basename(point.result_file);

            // // Click handler that releases the object URL after the element has been clicked
            // // This is required for one-off downloads of the blob content
            // const clickHandler = (e) => {
            //     console.log(e)
            //     setTimeout(() => {
            //     URL.revokeObjectURL(url);
            //     // this.removeEventListener('click', clickHandler);
            //     this.$vs.loading.close()
            //     }, 150);
            // };

            // // Add the click event listener on the anchor element
            // // Comment out this line if you don't want a one-off download of the blob content
            // a.addEventListener('click', clickHandler, false);

            // // Programmatically trigger a click on the anchor element
            // // Useful if you want the download to happen automatically
            // // Without attaching the anchor element to the DOM
            // // Comment out this line if you don't want an automatic download of the blob content
            // a.click();

            // // Return the anchor element
            // // Useful if you want a reference to the element
            // // in order to attach it to the DOM or use it in some other way
            // return a;
        },
          renderStatus(point,type){
              if(!point) return;
              console.log(point,this.scores,type,"point")
            return this.scores[type] ? this.scores[type].validationFn(point[type]):null;
        },
        renderFFRClass(point){

            if(point.ffr > 0.8){
                return "green";
            }else if(point.ffr >= 0.75 && point.frr < 0.8){
                return "yellow";
            }else if(point.ffr < 0.75){
                return "red";
            }
            return "";
        }
    },
}
</script>
<style >
    .not-data-table{
        display: none;
    }
    .green{
     background: #16de92;
     color: #fff;
     padding: 1rem;
    }
      .yellow{
     background: yellow;
     padding: 1rem;
    }
      .red{
     background: red;
     color: #fff;
     padding: 1rem;
    }
</style>
