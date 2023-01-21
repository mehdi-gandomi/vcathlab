<!-- =========================================================================================
    File Name: TheFooter.vue
    Description: Footer component
    Component Name: TheFooter
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template functional>
    <footer class="the-footer flex-wrap justify-between" :class="classes">
        <span class="md:flex hidden items-center">
            <span>{{parent.__("Designed and Developed by")}} <a href="#">{{parent.__("Iracode")}}</a></span>
            <!-- <feather-icon icon="HeartIcon" svgClasses="stroke-current text-danger w-6 h-6" class="ml-2" />-->
        </span>
        <span> &copy; {{ new Date().getFullYear() }} <a href="#" target="_blank" rel="nofollow">{{parent.__("Iracode")}}</a>, {{parent.__("All rights Reserved")}}</span>
    </footer>
</template>

<script>

export default {
    name: "the-footer",
    props: {
        classes: {
            type: String,
        }
    }
}
</script>
