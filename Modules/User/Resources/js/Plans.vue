<template>
    <div class="table-wrap">
        <vs-table stripe :data="items" :noDataText="__('No Orders found')">
            <template slot="thead">
                <vs-th>
                    {{ __("Coin Pair") }}
                </vs-th>

                <vs-th>
                    {{ __("Deal Type") }}
                </vs-th>
                <vs-th>
                    {{ __("Amount") }}
                </vs-th>
                <vs-th>
                    {{ __("Filled") }}
                </vs-th>
                <vs-th>
                    {{ __("Status") }}
                </vs-th>
                <vs-th>
                    {{ __("Created At") }}
                </vs-th>
                <vs-th>
                    {{ __("Updated At") }}
                </vs-th>
            </template>

            <template slot-scope="{ data }">
                <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                    <vs-td :data="data[indextr].coin_pair">
                        {{ data[indextr].coin_pair }}
                    </vs-td>

                    <vs-td :data="data[indextr].deal_type">
                        {{
                            selectFormatter(
                                data[indextr].deal_type,
                                data[indextr],
                                "deal_type"
                            )
                        }}
                    </vs-td>
                    <vs-td :data="data[indextr].amount">
                        {{ data[indextr].amount }}
                    </vs-td>
                    <vs-td :data="data[indextr].filled">
                        {{ data[indextr].filled }}
                    </vs-td>
                    <vs-td :data="data[indextr].status">
                        {{
                            selectFormatter(
                                data[indextr].status,
                                data[indextr],
                                "status"
                            )
                        }}
                    </vs-td>
                    <vs-td :data="data[indextr].created_at">
                        {{
                            dateFormatter(
                                data[indextr].created_at,
                                data[indextr],
                                "created_at"
                            )
                        }}
                    </vs-td>
                    <vs-td :data="data[indextr].updated_at">
                        {{
                            dateFormatter(
                                data[indextr].updated_at,
                                data[indextr],
                                "updated_at"
                            )
                        }}
                    </vs-td>
                </vs-tr>
            </template>
        </vs-table>
    </div>
</template>

<script>
export default {
    props:{
        status:{
            type:String,
            default:undefined
        }
    },
    data() {
        const obj={
            baseUrl: `/alaadin/api/orders?limit=10`,
            title: this.__("Export Orders"),
            items: [],
            fields: {},
            model: "Order",
            module: "Alaadin"
        };
        return obj;
    },
    methods: {
        dateFormatter(value, data, field) {
            const localedParam = `${field}_${Iracode.$i18n.locale}`;
            if (!data[localedParam]) return data[field];
            return data[localedParam];
        },
        relationFormatter(value, data, field) {
            return Iracode.getByDotNotation(data, field, "-");
        },
        radioFormatter(value, data, field) {
            let fieldDefinition = this.fields[field];
            value = typeof value == "boolean" ? +value : value;
            if (
                fieldDefinition &&
                fieldDefinition.options &&
                fieldDefinition.options.length
            ) {
                return fieldDefinition.options[value]
                    ? fieldDefinition.options[value]
                    : value;
            }
            return value;
        },
        selectFormatter(value, data, field) {
            let fieldDefinition = this.fields[field];
            if (!fieldDefinition) return data[field];
            value = typeof value == "boolean" ? +value : value;
            if (
                fieldDefinition &&
                fieldDefinition.options &&
                Object.keys(fieldDefinition.options).length
            ) {
                return fieldDefinition.options[value]
                    ? fieldDefinition.options[value]
                    : value;
            }
            return value;
        }
    },
    mounted() {},
    async created() {
        const { data: fields } = await this.$http.post(
            `${window.config.path_prefix}/api/get-model-fields`,
            {
                model: this.model,
                module: this.module
            }
        );
        this.fields = fields.data;
        const params={};
        if(this.status !== undefined){
            params["filter[status]"]=this.status;
        }
        const { data } = await this.$http.get(this.baseUrl, {
            params
        });
        this.items = data.data.items;
    }
};
</script>
<style lang="scss">
#crudPrint {
    padding: 5rem;
    max-width: 90%;
    margin: auto;

    .logo {
        width: 100px;
        img {
            width: 100%;
        }
    }
}
</style>
