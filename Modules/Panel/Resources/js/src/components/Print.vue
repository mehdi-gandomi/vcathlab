<template>
    <div id="crudPrint" >
        <div class="flex justify-between">
            <div class="logo">
                <img :src="logoUrl" alt="">
            </div>
            <div class="exportTitle">
                <h4>{{title}}</h4>
            </div>
            <div class="date">
                <strong>{{__("Date")}}:</strong>
                <p>{{currentDate}}</p>
            </div>
        </div>
        <div class="flex justify-between  my-5">
            <div class="siteName">
                <h4>{{site_name}}</h4>
            </div>
            <div class="exportTitle">
                <h4>{{title}}</h4>
            </div>
            <div class="date">
                <strong>{{__("Time")}}:</strong>
                <p>{{currentTime}}</p>
            </div>
        </div>
        <div class="table-wrap">
            <vs-table stripe :data="users">
                <template slot="thead">
                    <vs-th>
                    Email
                    </vs-th>
                    <vs-th>
                    Name
                    </vs-th>
                    <vs-th>
                    Website
                    </vs-th>
                    <vs-th>
                    Nro
                    </vs-th>
                </template>

                <template slot-scope="{data}">
                    <vs-tr :key="indextr" v-for="(tr, indextr) in data" >
                    <vs-td :data="data[indextr].email">
                        {{data[indextr].email}}
                    </vs-td>

                    <vs-td :data="data[indextr].username">
                        {{data[indextr].name}}
                    </vs-td>

                    <vs-td :data="data[indextr].id">
                        {{data[indextr].website}}
                    </vs-td>

                    <vs-td :data="data[indextr].id">
                        {{data[indextr].id}}
                    </vs-td>
                    </vs-tr>
                </template>
                </vs-table>
        </div>
    </div>
</template>

<script>
    import Printable from '@/mixins/Printable'
    export default{
        mixins:[Printable],
        data() {
            return {
                title:{
                    default:"خروجی"
                }
            }
        },
    }
</script>
<style lang="scss">
    #crudPrint{
        padding: 5rem;
        max-width: 70%;
        margin: auto;

    .logo{
            width: 100px;
            img{
                width: 100%;
            }
        }
    }

</style>
