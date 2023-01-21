<template>
    <div v-frag>
         <button
        class="Hotspot"
        :class="{'done':pointsForm['LM_OSTIAL'] && pointsForm['LM_OSTIAL'].done}"
        data-name="LM_OSTIAL"
        slot="hotspot-4"
        data-position="0.29230763221275413m 0.1632841509086988m 0.07139593915393697m"
        data-normal="0.9711708855156178m 0.1541834634979456m -0.1818091601393846m"
        data-visibility-attribute="visible"
        data-label="LM OSTIAL"
        @click="()=>$emit('pointClicked',points['LM_OSTIAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['LM_DISTAL'] && pointsForm['LM_DISTAL'].done}"
        data-name="LM_DISTAL"
        slot="hotspot-5"
        data-position="0.30792571808573277m 0.14507550974047634m 0.11883588237895723m"
        data-normal="0.9366079762833974m 0.3500385176733865m 0.01544457533690471m"
        data-visibility-attribute="visible"
        data-label="LM DISTAL"
        @click="()=>$emit('pointClicked',points['LM_DISTAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['LAD_OSTIAL'] && pointsForm['LAD_OSTIAL'].done}"
        data-name="LAD_OSTIAL"
        slot="hotspot-8"
        data-position="0.32909152865197877m 0.11633500365039724m 0.15194304425170868m"
        data-normal="0.8437969938204799m 0.5170677952555434m -0.14369247833165313m"
        data-visibility-attribute="visible"
        data-label="LAD OSTIAL"
        @click="()=>$emit('pointClicked',points['LAD_OSTIAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['LAD_PROXIMAL'] && pointsForm['LAD_PROXIMAL'].done}"
        data-name="LAD_PROXIMAL"
        slot="hotspot-9"
        data-position="0.3695550475443147m 0.06367153351988768m 0.2014584473360373m"
        data-normal="0.870695993439877m 0.40979707620729017m -0.27194639791639463m"
        data-visibility-attribute="visible"
        data-label="LAD PROXIMAL"
        @click="()=>$emit('pointClicked',points['LAD_PROXIMAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['LAD_MID_PART'] && pointsForm['LAD_MID_PART'].done}"
        data-name="LAD_MID_PART"
        slot="hotspot-10"
        data-position="0.4098292433175047m -0.016395445390416152m 0.4453843592941024m"
        data-normal="0.980783660387004m 0.18217773904102075m 0.06981892949460027m"
        data-visibility-attribute="visible"
        data-label="LAD MID PART"
        @click="()=>$emit('pointClicked',points['LAD_MID_PART'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['LAD_DISTAL'] && pointsForm['LAD_DISTAL'].done}"
        data-name="LAD_DISTAL"
        slot="hotspot-11"
        data-position="0.35698283090534394m -0.17323511690518623m 0.6998857082341631m"
        data-normal="0.8969156050795585m 0.14854908209630763m 0.41650398266176764m"
        data-visibility-attribute="visible"
        data-label="LAD DISTAL"
        @click="()=>$emit('pointClicked',points['LAD_DISTAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['DIAGONAL_2'] && pointsForm['DIAGONAL_2'].done}"
        data-name="DIAGONAL_2"
        slot="hotspot-12"
        data-position="0.4218183504015556m -0.09182736981690182m 0.5592602808437199m"
        data-normal="0.35812018093919856m 0.22452136925590319m 0.9062781530807913m"
        data-visibility-attribute="visible"
        data-label="DIAGONAL 2"
        @click="()=>$emit('pointClicked',points['DIAGONAL_2'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['Dig_OSTIAL'] && pointsForm['Dig_OSTIAL'].done}"
        data-name="Dig_OSTIAL"
        slot="hotspot-13"
        data-position="0.4220019120071351m -0.01878174528064748m 0.36158172553046986m"
        data-normal="0.8707969366931463m 0.36141126634408055m 0.3333085531536816m"
        data-visibility-attribute="visible"
        data-label="Dig OSTIAL"
        @click="()=>$emit('pointClicked',points['Dig_OSTIAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['Dig_PROXIMAL'] && pointsForm['Dig_PROXIMAL'].done}"
        data-name="Dig_PROXIMAL"
        slot="hotspot-14"
        data-position="0.43715181970072625m -0.06426058413413524m 0.40188219780230117m"
        data-normal="0.9974440033186937m 0.0528642805484142m -0.04807107327360586m"
        data-visibility-attribute="visible"
        data-label="Dig PROXIMAL"
        @click="()=>$emit('pointClicked',points['Dig_PROXIMAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['LCX_OSTIAL'] && pointsForm['LCX_OSTIAL'].done}"
        data-name="LCX_OSTIAL"
        slot="hotspot-15"
        data-position="0.3194179164698847m -0.010706087587260715m 0.02921884617190773m"
        data-normal="0.6716753567516066m -0.05386152413723659m -0.7388850731678209m"
        data-visibility-attribute="visible"
        data-label="LCX OSTIAL"
        @click="()=>$emit('pointClicked',points['LCX_OSTIAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['LCX_MID_PART'] && pointsForm['LCX_MID_PART'].done}"
        data-name="LCX_MID_PART"
        slot="hotspot-16"
        data-position="0.23382446102681775m -0.144046266474874m -0.009330213045604274m"
        data-normal="0.7661681275809329m -0.2192472551131038m -0.6040836377559793m"
        data-visibility-attribute="visible"
        data-label="LCX MID PART"
        @click="()=>$emit('pointClicked',points['LCX_MID_PART'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['OM2_OSTIAL'] && pointsForm['OM2_OSTIAL'].done}"
        data-name="OM2_OSTIAL"
        slot="hotspot-17"
        data-position="0.3406990808494615m -0.24682424944182668m 0.0565424565634135m"
        data-normal="0.7556229357725606m -0.32637154648381944m -0.5679045629154753m"
        data-visibility-attribute="visible"
        data-label="OM2 OSTIAL"
        @click="()=>$emit('pointClicked',points['OM2_OSTIAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['OM2_PROXIMAL'] && pointsForm['OM2_PROXIMAL'].done}"
        data-name="OM2_PROXIMAL"
        slot="hotspot-18"
        data-position="0.374728003292535m -0.29104066532055456m 0.10670563469491268m"
        data-normal="0.4093695393770095m -0.7420909774850769m -0.530770723915231m"
        data-visibility-attribute="visible"
        data-label="OM2 PROXIMAL"
        @click="()=>$emit('pointClicked',points['OM2_PROXIMAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['OM2_MID_PART'] && pointsForm['OM2_MID_PART'].done}"
        data-name="OM2_MID_PART"
        slot="hotspot-19"
        data-position="0.45089731943637057m -0.2953048843268309m 0.237842818263425m"
        data-normal="0.7877687068924033m -0.5579434843797414m -0.2609971890255984m"
        data-visibility-attribute="visible"
        data-label="OM2 MID PART"
        @click="()=>$emit('pointClicked',points['OM2_MID_PART'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['OM1_OSTIAL'] && pointsForm['OM1_OSTIAL'].done}"
        data-name="OM1_OSTIAL"
        slot="hotspot-20"
        data-position="0.3316397593033336m -0.05718886925269001m 0.030126200524684954m"
        data-normal="0.3720353039690471m 0.17107325749066868m -0.9123177479212987m"
        data-visibility-attribute="visible"
        data-label="OM1 OSTIAL"
        @click="()=>$emit('pointClicked',points['OM1_OSTIAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['OM1_PROXIMAL'] && pointsForm['OM1_PROXIMAL'].done}"
        data-name="OM1_PROXIMAL"
        slot="hotspot-21"
        data-position="0.41155826368160897m -0.10915732711682946m 0.0783351704184318m"
        data-normal="0.7224955373944705m -0.009330049498480803m -0.6913126272689016m"
        data-visibility-attribute="visible"
        data-label="OM1 PROXIMAL"
        @click="()=>$emit('pointClicked',points['OM1_PROXIMAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['OM1_MID_PART'] && pointsForm['OM1_MID_PART'].done}"
        data-name="OM1_MID_PART"
        slot="hotspot-22"
        data-position="0.4690607991927551m -0.16783226877006202m 0.19041940052629305m"
        data-normal="0.9588698754217713m -0.022633339168911113m -0.2829422095882865m"
        data-visibility-attribute="visible"
        data-label="OM1 MID PART"
        @click="()=>$emit('pointClicked',points['OM1_MID_PART'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['OM1_DISTAL'] && pointsForm['OM1_DISTAL'].done}"
        data-name="OM1_DISTAL"
        slot="hotspot-23"
        data-position="0.4849582870988952m -0.22344747939208476m 0.2941774067320132m"
        data-normal="0.9999659911067593m -0.008129378342525416m -0.0013891859633047637m"
        data-visibility-attribute="visible"
        data-label="OM1 DISTAL"
        @click="()=>$emit('pointClicked',points['OM1_DISTAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['RCA_OSTIAL'] && pointsForm['RCA_OSTIAL'].done}"
        data-name="RCA_OSTIAL"
        slot="hotspot-24"
        data-position="0.04413793937909383m 0.16359165762840988m 0.23831982661424134m"
        data-normal="0.4358678916554991m 0.770190443932328m 0.465645638977875m"
        data-visibility-attribute="visible"
        data-label="RCA OSTIAL"
        @click="()=>$emit('pointClicked',points['RCA_OSTIAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['RCA_PROXIMAL'] && pointsForm['RCA_PROXIMAL'].done}"
        data-name="RCA_PROXIMAL"
        slot="hotspot-25"
        data-position="-0.04976129800842244m 0.1411358322756855m 0.2844561782385679m"
        data-normal="-0.42399947374886965m 0.8313810838802999m 0.35920737691018995m"
        data-visibility-attribute="visible"
        data-label="RCA PROXIMAL"
        @click="()=>$emit('pointClicked',points['RCA_PROXIMAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['RCA_MID_PART'] && pointsForm['RCA_MID_PART'].done}"
        data-name="RCA_MID_PART"
        slot="hotspot-26"
        data-position="-0.1547995199819202m 0.0020512232162371302m 0.3504933725283198m"
        data-normal="-0.8110064411333926m 0.41888555621494666m 0.40841577250963707m"
        data-visibility-attribute="visible"
        data-label="RCA MID PART"
        @click="()=>$emit('pointClicked',points['RCA_MID_PART'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['RCA_DISTAL'] && pointsForm['RCA_DISTAL'].done}"
        data-name="RCA_DISTAL"
        slot="hotspot-27"
        data-position="-0.15536984347856264m -0.28736227920451657m 0.3082246519786328m"
        data-normal="-0.7638059220715093m -0.49536925044485086m 0.4137750827710608m"
        data-visibility-attribute="visible"
        data-label="RCA DISTAL"
        @click="()=>$emit('pointClicked',points['RCA_DISTAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['PLV_OSTIAL'] && pointsForm['PLV_OSTIAL'].done}"
        data-name="PLV_OSTIAL"
        slot="hotspot-29"
        data-position="0.011715229804953708m -0.40700728407913955m 0.20806619070206692m"
        data-normal="-0.5733246830735588m -0.7424585513079112m -0.34648824997157035m"
        data-visibility-attribute="visible"
        data-label="PLV OSTIAL"
        @click="()=>$emit('pointClicked',points['PLV_OSTIAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['PLV_PROXIMAL'] && pointsForm['PLV_PROXIMAL'].done}"
        data-name="PLV_PROXIMAL"
        slot="hotspot-30"
        data-position="0.0152815623403727m -0.42690212789326887m 0.27791128067005716m"
        data-normal="-0.6887216732454231m -0.7078177601755619m -0.15702380450771028m"
        data-visibility-attribute="visible"
        data-label="PLV PROXIMAL"
        @click="()=>$emit('pointClicked',points['PLV_PROXIMAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['PLV_MID_PART'] && pointsForm['PLV_MID_PART'].done}"
        data-name="PLV_MID_PART"
        slot="hotspot-31"
        data-position="0.08211476675911866m -0.4564478007373898m 0.3943582848364673m"
        data-normal="-0.20813872063532726m -0.9777904698087028m -0.024577838057191933m"
        data-visibility-attribute="visible"
        data-label="PLV MID PART"
        @click="()=>$emit('pointClicked',points['PLV_MID_PART'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['PLV_DISTAL'] && pointsForm['PLV_DISTAL'].done}"
        data-name="PLV_DISTAL"
        slot="hotspot-32"
        data-position="0.15637260972949515m -0.4629884751581601m 0.5061967996724931m"
        data-normal="-0.09977972425612237m -0.9934207462391016m 0.05620700640595281m"
        data-visibility-attribute="visible"
        data-label="PLV DISTAL"
        @click="()=>$emit('pointClicked',points['PLV_DISTAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['PDA_OSTIAL'] && pointsForm['PDA_OSTIAL'].done}"
        data-name="PDA_OSTIAL"
        slot="hotspot-33"
        data-position="0.11701451443713498m -0.35809466562691883m 0.07396544514151937m"
        data-normal="-0.18673750398972372m -0.9478242027751882m -0.25837644094860335m"
        data-visibility-attribute="visible"
        data-label="PDA OSTIAL"
        @click="()=>$emit('pointClicked',points['PDA_OSTIAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['PDA_PROXIMAL'] && pointsForm['PDA_PROXIMAL'].done}"
        data-name="PDA_PROXIMAL"
        slot="hotspot-34"
        data-position="0.16982531761687894m -0.42570547718014284m 0.13146993636598497m"
        data-normal="0.009913007511742306m -0.7979259672167119m -0.602673944287744m"
        data-visibility-attribute="visible"
        data-label="PDA PROXIMAL"
        @click="()=>$emit('pointClicked',points['PDA_PROXIMAL'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['PDA_MID_PART'] && pointsForm['PDA_MID_PART'].done}"
        data-name="PDA_MID_PART"
        slot="hotspot-35"
        data-position="0.17061707853687963m -0.4703796656771768m 0.2645840730153348m"
        data-normal="-0.3033565306246624m -0.9522105933667576m 0.035634270127165496m"
        data-visibility-attribute="visible"
        data-label="PDA MID PART"
        @click="()=>$emit('pointClicked',points['PDA_MID_PART'])"
      />

      <button
        class="Hotspot"
        :class="{'done':pointsForm['PD'] && pointsForm['PD'].done}"
        data-name="PD"
        slot="hotspot-36"
        data-position="0.28492069905844686m -0.4926617051703226m 0.36777019681317574m"
        data-normal="-0.09328455985256594m -0.981477449206097m 0.16733202799525984m"
        data-visibility-attribute="visible"
        data-label="PD"
        @click="()=>$emit('pointClicked',points['PD'])"
      />
    </div>
</template>
<script>
import frag from './frag'
import points from './all_points'
export default {
    props:["pointsForm"],
    directives:{frag},
    data(){
        return {
            points
        }
    },
    watch:{
        pointsForm(newVal,oldVal){
            console.log(newVal,oldVal)
            this.$forceUpdate();
        }
    }
}
</script>
<style >
    .Hotspot {
        background: #fff;
        border-radius: 32px;
        border: 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
        box-sizing: border-box;
        cursor: pointer;
        height: 12px;
        padding: 5px;
        position: relative;
        transition: opacity 0.3s;
        width: 12px;
      }
        .Hotspot.done{
            background: red;
        }
      .Hotspot:not([data-visible]) {
        background: transparent;
        border: 4px solid #fff;
        box-shadow: none;
        height: 12px;
        pointer-events: none;
        width: 12px;
         padding: 2px;
      }

      .Hotspot:focus {
        border: 4px solid rgb(0, 128, 200);
        height: 24px;
        outline: none;
        width: 24px;
      }

      .Hotspot > * {
        opacity: 1;
        transform: translateY(-50%);
      }

      .HotspotAnnotation {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
        color: rgba(0, 0, 0, 0.8);
        display: block;
        font-family: Futura, Helvetica Neue, sans-serif;
        font-size: 18px;
        font-weight: 700;
        left: calc(100% + 1em);
        max-width: 128px;
        overflow-wrap: break-word;
        padding: 0.5em 1em;
        position: absolute;
        top: 50%;width: max-content;
      }

      .Hotspot:not([data-visible]) > * {
        opacity: 0;
        pointer-events: none;
        transform: translateY(calc(-50% + 4px));
        transition: transform 0.3s, opacity 0.3s;
      }
</style>
