<template>
    <loading-view :loading="loading">
        <div class="vx-row">
            <div class="vx-col w-full">
                <vx-card class="mb-base">
                    <template v-slot:actions>
                        <vs-button
                            color="primary"
                            to="/user/body_compositions"
                            type="filled"
                            >Back</vs-button
                        >
                    </template>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">{{ __("Age") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Age }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">{{ __("Sex") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ radioFormat("Sex") }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Waist") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Waist }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("S M M") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.SMM }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("V F P") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.VFP }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Height") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Height }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Weight") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Weight }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">{{ __("Hip") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Hip }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("B F M P") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.BFMP }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Created At") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ dateFormat("created_at") }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Updated At") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ dateFormat("updated_at") }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("patient") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.patient.name }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">

                    </div>
                </vx-card>
            </div>
        </div>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vx-card class="mb-base">

                    <div >
                        <a  style="font-size: 30px" rel="noopener"  v-if="details.result && details.result.link" :key="downloadBtnKey" class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  href="javascript:void(0)" @click="download(details.result.link,'total_clicked')" >
                        {{__("Export PDF")}}
                    </a>
                    <a target="_blank" style="font-size: 30px" rel="noopener"  v-if="details.result && details.result.word_link" :key="downloadBtnKey" class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="details.result.word_link" >
                            {{__("Export Word")}}
                    </a>
                    </div>

                </vx-card>
            </div>
        </div>
    </loading-view>
</template>
<script>
import DetailPage from "@/mixins/DetailPage";
export default {
    components: {},
    mixins: [DetailPage],
    data() {
        return {
            details: {
                Age: "",
                Sex: "",
                Waist: "",
                SMM: "",
                VFP: "",
                Height: "",
                Weight: "",
                Hip: "",
                BFMP: "",
                created_at: "",
                updated_at: "",
                user: "",
                patient: "",
                user: {},
                patient: {},
            },
            formTypes: {
                Age: "text",
                Sex: "text",
                Waist: "text",
                SMM: "text",
                VFP: "text",
                Height: "text",
                Weight: "text",
                Hip: "text",
                BFMP: "text",
                created_at: "text",
                updated_at: "text",
                user: "text",
                patient: "text",
            },
            module: "User",
            model: "BodyComposition",
        };
    },
    props: {
        //
    },
    methods:{
        async download(link,maceType){
        setTimeout(async()=>{
            try{
                const {data}=await this.$http.put("/user/api/mace_assesments/"+this.details.id,{[maceType]:1});
                console.log(data)

            }catch(e){
                console.log(e)
            }finally{
                location.href=link;
            }
        },500)
    },
    },
    computed: {
        Iracode() {
            return window.Iracode;
        },
    },
    async created() {
        const { data: response } = await this.$http.get(
            `/user/api/body_compositions/${this.$route.params.id}`
        );
        if (response.success) {
            const { data } = response;
            this.$store.dispatch("setCurrentResource", data);
            this.populateFormFields(data);
        }
        this.loading = false;
    },
    mounted() {
        //
    },
};
</script>
