<template>
    <vx-card title="Tickets">
        <vs-button to="/user/tickets/create" color="success">Create ticket</vs-button>
        <b-table
        :items="ip.items"
        :fields="ip.fields"
        :busy="ip.busy"
        :current-page="ip.state.currentPage"
        :per-page="ip.state.perPage"
        :filter="ip.state.filter"
        :filter-ignored-fields="ip.state.filterIgnoredFields"
        :filter-included-fields="ip.state.filterIncludedFields"
        apiUrl="/tickets/data?no_link=1"
        >
          <!-- A custom formatted column -->
            <template #cell(subject)="data">
                <vs-button @click="()=>showTicket(data.item.id)" type="line">{{data.value}}</vs-button>
            </template>
            <template #cell(status)="data">
                <div v-html="data.value"></div>
            </template>
        </b-table>
        <div
        v-if="ip.totalRows > 0"
        class="row"
        >
        <b-pagination
            v-model="ip.state.currentPage"
            :per-page="ip.state.perPage"
            :total-rows="ip.totalRows"
        />
        </div>
    </vx-card>
</template>
<script>
import axios from '@external_modules/Panel/Resources/js/src/axios'
import ItemsProvider from 'bvtnet-items-provider'

export default {

    data() {
        const fields = {
            id:{
                sortable: true, searchable: true, label: '#'
            },
            subject:{
                sortable: true, searchable: true, label: 'Subject'
            },
            status:{
                sortable: true, searchable: true, label: 'Status'
            },
            updated_at:{
                sortable: true, searchable: true, label: 'Last update'
            },
            agent:{
                sortable: true, searchable: true, label: 'Agent'
            },
        };
        const ip = new ItemsProvider({axios: axios, fields: fields})
        console.log(ip)
        return {
            ip: ip
        }
    },
    methods: {
        showTicket(id){
            this.$router.push(`/user/tickets/${id}`);
        }
    },
}
</script>
