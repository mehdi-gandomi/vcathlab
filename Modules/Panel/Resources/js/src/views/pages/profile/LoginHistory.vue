<template>
  <vx-card no-shadow>
      <h4 class="text-center my-4">{{__("Login history")}}</h4>
      <p>به منظور حفاظت بیش‌تر از حساب خود، پیشنهاد می‌شود که به ایمیل‌های اطلاع‌رسانی ورود به سایت که برای شما ارسال می‌شود، دقت نمایید. همچنین می‌توانید تاریخچه‌ی لاگین‌های موفق و ناموفق به حساب خود را مشاهده کنید.</p>
      <grid :baseUrl="baseUrl" :columnDefs="columnDefs"></grid>
  </vx-card>
</template>

<script>
import Grid from '@/components/aggrid-table/Grid.vue'
import {dateFormatter} from "@/components/aggrid-table/Formatters";
export default {
    components:{
        Grid
    },
    data(){
        return {
            baseUrl:"/authentication_logs/api/authentication_logs",
              columnDefs: [
                {
                headerName: this.__("Ip Address"),
                field: "ip_address",
                flex:1,
                resizable: true,
                filter: "agTextColumnFilter"
                },
                {
                headerName: this.__("Browser"),
                field: "user_agent",
                flex:4,
                resizable: true,
                filter: "agTextColumnFilter"
                },
                {
                headerName: this.__("Login At"),
                field: "login_at",
                flex:1,
                valueFormatter:dateFormatter,
                resizable: true,
                filter: "agTextColumnFilter"
                },
                {
                headerName: this.__("Logout At"),
                field: "logout_at",
                flex:1,
                valueFormatter:dateFormatter,
                resizable: true,
                filter: "agTextColumnFilter"
                }
            ],
        }
    }
}
</script>
